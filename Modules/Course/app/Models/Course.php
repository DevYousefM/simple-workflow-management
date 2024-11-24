<?php

namespace Modules\Course\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Workflow\Models\Workflow;
// use Modules\Course\Database\Factories\CourseFactory;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function workflow()
    {
        return $this->hasOne(Workflow::class);
    }
}
