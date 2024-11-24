<?php

namespace Modules\Workflow\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Department\Models\Department;
// use Modules\Workflow\Database\Factories\StepFactory;

class Step extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['name', 'department_id', 'workflow_id', 'order', 'status'];

    public function workflow()
    {
        return $this->belongsTo(Workflow::class);
    }
    public function getIsFirstStepAttribute()
    {
        return $this->order === $this->workflow->steps()->min('order');
    }
    public function getIsLastStepAttribute()
    {
        return $this->order === $this->workflow->steps()->max('order');
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
 
}
