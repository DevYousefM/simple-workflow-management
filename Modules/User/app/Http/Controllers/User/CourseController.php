<?php

namespace Modules\User\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Modules\Course\Models\Course;
use Modules\Workflow\Models\Step;
use Modules\Workflow\Services\FileStorageService;
use Modules\Workflow\Services\WorkflowService;

class CourseController extends Controller
{
    use AuthorizesRequests;

    protected $workflowService;
    protected $fileStorageService;

    public function __construct(WorkflowService $workflowService, FileStorageService $fileStorageService)
    {
        $this->workflowService = $workflowService;
        $this->fileStorageService = $fileStorageService;
    }

    public function index()
    {
        $user = auth()->user();

        $department_id = $user->department_id;

        $minOrders = DB::table('steps')
            ->whereIn('status', ['Pending', 'In Progress'])
            ->groupBy('workflow_id')
            ->select('workflow_id', DB::raw('MIN(`order`) as min_order'))
            ->pluck('min_order', 'workflow_id');

        $courses = Course::whereHas('workflow.steps', function ($query) use ($minOrders) {
            $query->whereIn('status', ['Pending', 'In Progress'])
                ->whereIn('workflow_id', $minOrders->keys())
                ->where(function ($subQuery) use ($minOrders) {
                    foreach ($minOrders as $workflowId => $minOrder) {
                        $subQuery->orWhere(function ($query) use ($workflowId, $minOrder) {
                            Log::info($minOrder);
                            $query->where('workflow_id', $workflowId)
                                ->where('order', '=', $minOrder)->whereHas('department', function ($query) use ($workflowId) {
                                    $query->where('id', Auth::user()->department_id);
                                });
                        });
                    }
                });
        })->paginate(10);


        return view('user::user.courses.index', compact('courses'));
    }
    public function takeAction(Request $request, $course_id, $step_id)
    {
        $step = Step::find($step_id);
        if (!$step) {
            abort(404);
        }
        $this->authorize('takeAction', $step);

        $is_first_step = $step->isFirstStep;
        $step = $step->load('workflow', 'workflow.actions', 'workflow.actions.user', 'workflow.actions.user.department');
        return view('user::user.courses.take_action', compact('course_id', 'step', 'is_first_step'));
    }
    public function storeAction(Request $request, $step_id)
    {
        $request->validate([
            'comment' => 'nullable',
            'file' => 'nullable|mimes:pdf,doc,docx,ppt,pptx,jpg,png,jpeg|max:2048',
            'action' => 'required|in:Approve,Reject',
        ]);

        $step = Step::find($step_id);
        if (!$step) {
            abort(404);
        }
        $this->authorize('takeAction', $step);

        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $this->fileStorageService->storeFile($request->file('file'));
        }

        switch ($request->action) {
            case 'Approve':
                $this->workflowService->handleApprove($step, auth()->id(), $request->comment, basename($filePath));
                break;
            case 'Reject':
                $this->workflowService->handleReject($step, auth()->id(), $request->comment, basename($filePath));
                break;
            default:
                abort(404);
        }
        return response()->json(['success' => true, 'message' => 'Action taken successfully']);
    }
}
