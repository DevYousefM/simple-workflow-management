<?php

namespace Modules\Workflow\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\User\Models\User;
use Modules\Workflow\Models\Step;

class StepPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function takeAction(User $user, Step $step)
    {
        return $user->department_id == $step->department_id;
    }
}
