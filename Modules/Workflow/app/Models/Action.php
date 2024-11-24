<?php

namespace Modules\Workflow\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\User;
// use Modules\Workflow\Database\Factories\ActionFactory;

class Action extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['step_id', 'user_id', 'workflow_id', 'action_type', 'comment', 'file_path'];

    public function getFilePathAttribute()
    {
        if ($this->attributes['file_path'] !== null) {
            return URL('storage/workflow_files') . '/' . $this->attributes['file_path'];
        }
        return null;
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function step()
    {
        return $this->belongsTo(Step::class);
    }
}
