<?php

namespace Modules\Workflow\Services;

use Modules\Workflow\Models\Action;
use Modules\Workflow\Models\Step;
use Modules\Workflow\Models\Workflow;
use Modules\Workflow\Notifications\SendNotification;

class WorkflowService
{
    protected $notificationService;
    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }
    public function createWorkflow(array $data, array $steps)
    {
        $workflow = Workflow::create([
            'name' => $data['name'],
            'course_id' => $data['course_id']
        ]);

        $this->storeSteps($workflow, $steps);

        return $workflow;
    }
    public function storeSteps(Workflow $workflow, array $steps)
    {
        foreach ($steps as $step) {
            $workflow->steps()->create([
                'name' => $step['name'],
                'order' => $step['order'],
                'department_id' => $step['department_id']
            ]);
        }
    }
    public function updateWorkflow($id, array $data, array $steps)
    {
        $workflow = Workflow::find($id);
        $workflow->update([
            'name' => $data['name'],
            'course_id' => $data['course_id']
        ]);

        $this->updateSteps($workflow, $steps);

        return $workflow;
    }
    public function updateSteps(Workflow $workflow, array $steps)
    {
        foreach ($steps as $step) {
            if (isset($step['id'])) {
                Step::find($step['id'])->update([
                    'name' => $step['name'],
                    'order' => $step['order'],
                    'department_id' => $step['department_id']
                ]);
                continue;
            }
            $workflow->steps()->create([
                'name' => $step['name'],
                'order' => $step['order'],
                'department_id' => $step['department_id']
            ]);
        }
    }
    public function rearrangeSteps($deletedStepOrder)
    {
        $steps = Step::where('order', '>', $deletedStepOrder)->orderBy('order', 'asc')->get();
        foreach ($steps as $step) {
            $step->order = $step->order - 1;
            $step->save();
        }
    }
    public function handleApprove($step, $user_id, $comment = null, $file_path = null)
    {
        $step->update([
            'status' => 'Approved',
        ]);

        Action::create([
            'user_id' => $user_id,
            'step_id' => $step->id,
            'workflow_id' => $step->workflow_id,
            'action_type' => 'Approved',
            'comment' => $comment,
            'file_path' => $file_path
        ]);
        if ($step->isFirstStep) {
            $step->workflow()->update([
                'status' => 'In Progress',
            ]);
        }
        if ($step->isLastStep) {
            $step->workflow()->update([
                'status' => 'Completed',
            ]);
            return;
        }

        $next_step = Step::where('workflow_id', $step->workflow_id)
            ->where('order', '>', $step->order)
            ->orderBy('order')
            ->first();

        if ($next_step) {
            $next_step->update([
                'status' => 'In Progress',
            ]);
        }

        $this->notifyDepartment($this->notificationService, $next_step->department_id);
    }
    public function handleReject($step, $user_id, $comment = null, $file_path = null)
    {
        $step->update([
            'status' => 'Rejected',
        ]);

        Action::create([
            'user_id' => $user_id,
            'step_id' => $step->id,
            'workflow_id' => $step->workflow_id,
            'action_type' => 'Rejected',
            'comment' => $comment,
            'file_path' => $file_path
        ]);

        $previous_step = Step::where('workflow_id', $step->workflow_id)
            ->where('order', '<', $step->order)
            ->orderBy('order', 'desc')
            ->first();

        if ($previous_step) {
            $previous_step->update([
                'status' => 'Pending',
            ]);
        }

        $this->notifyUser($this->notificationService, $step->user);
    }
    public function notifyDepartment(NotificationService $notificationService, $department_id)
    {
        $message = 'There is a new course needs to review';
        $notification = new SendNotification($message);
        $notificationService->sendToDepartment($department_id, $notification);
    }
    public function notifyUser(NotificationService $notificationService, $user)
    {
        $message = 'There is a new course needs to review';
        $notification = new SendNotification($message);
        $notificationService->sendToUser($user, $notification);
    }
}
