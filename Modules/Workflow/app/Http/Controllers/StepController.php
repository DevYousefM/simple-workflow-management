<?php

namespace Modules\Workflow\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Modules\Department\Models\Department;
use Modules\Workflow\Models\Step;
use Modules\Workflow\Services\WorkflowService;

class StepController extends Controller
{
    protected $workflowService;
    public function __construct(WorkflowService $workflowService)
    {
        $this->workflowService = $workflowService;
    }
    public function getStepRow(Request $request)
    {
        $request->validate([
            'index' => 'required|integer',
            'order' => 'required|integer',
        ]);
        $index = $request->index;
        $order = $request->order;

        $departments = Cache::remember('departments', 60, function () {
            return Department::all();
        });

        return view('workflow::steps.step_row', compact('index', 'order', 'departments'))->render();
    }
    public function destroy($step_id)
    {
        $step = Step::find($step_id);
        $this->workflowService->rearrangeSteps($step->order);
        $step->delete();
        return response()->json(['success' => true]);
    }
}
