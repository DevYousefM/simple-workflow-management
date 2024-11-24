<?php

namespace Modules\Workflow\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Course\Models\Course;
use Modules\Department\Models\Department;
use Modules\Workflow\Http\Requests\WorkflowCreateRequest;
use Modules\Workflow\Http\Requests\WorkflowUpdateRequest;
use Modules\Workflow\Models\Workflow;
use Modules\Workflow\Services\WorkflowService;

class WorkflowController extends Controller
{
    protected $workflowService;

    public function __construct(WorkflowService $workflowService)
    {
        $this->workflowService = $workflowService;
    }
    public function index(Request $request)
    {
        $query = Workflow::query();
        if (request('search')) {
            $search = request("search");
            $query->where("name", "LIKE", "%{$search}%");
        }

        $workflows = $query->paginate(10);

        if ($request->ajax()) {
            return response()->json([
                'collection' => view('workflow::partials._workflows', compact("workflows"))->render(),
                'pagination' => (string) $workflows->appends(['search' => request('search')])->links(),
            ]);
        }

        return view('workflow::index', compact('workflows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // get courses where not has workflow
        $courses = Course::whereDoesntHave('workflow')->get();
        return view('workflow::create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WorkflowCreateRequest $request)
    {
        $data = $request->validated();

        $workflow = $this->workflowService->createWorkflow($data, $data['steps']);

        return response()->json([
            'message' => 'Workflow created successfully',
            'id' => $workflow->id
        ], 200);
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('workflow::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $workflow = Workflow::findOrFail($id);
        if ($workflow->current_step->order > 1) {
            return abort(403);
        }
        $courses = Course::all();
        $departments = Department::all();
        return view('workflow::edit', compact('workflow', 'courses', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WorkflowUpdateRequest $request, $id)
    {
        $workflow = Workflow::findOrFail($id);
        $data = $request->validated();

        $workflow = $this->workflowService->updateWorkflow($workflow->id, $data, $data['steps']);

        return response()->json([
            'workflow' => $workflow,
            'message' => 'Workflow updated successfully'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $workflow = Workflow::find($id);
        $workflow->delete();

        return response()->json([
            'message' => 'Workflow deleted successfully',
        ], 200);
    }
}
