<?php

namespace Modules\Workflow\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Course\Models\Course;
// use Modules\Workflow\Database\Factories\WorkflowFactory;

class Workflow extends Model
{
    use HasFactory;

    protected $fillable = ['course_id', 'name', 'status'];

    public function steps()
    {
        return $this->hasMany(Step::class)->orderBy('order');
    }
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function getCurrentStepAttribute()
    {
        return $this->steps()->whereIn('status', ['Pending', 'In Progress'])->orderBy('order')->first();
    }
    public function actions()
    {
        return $this->hasMany(Action::class);
    }
}
