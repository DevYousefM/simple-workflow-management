<?php

namespace Modules\Workflow\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Modules\Workflow\Rules\StepsOrder;

class WorkflowCreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'course_id' => ['required', 'exists:courses,id', 'unique:workflows,course_id'],
            'steps' => ['required', 'array', new StepsOrder()],
            'steps.*.name' => ['required', 'string', 'max:255'],
            'steps.*.department_id' => ['required', 'exists:departments,id', Rule::unique('steps', 'department_id')->where(function ($query) {
                return $query->where('workflow_id', $this->workflow_id);
            })],
            'steps.*.order' => ['required', 'integer'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function messages(): array
    {
        return [
            'course_id.required' => 'Course is required',
            'course_id.exists' => 'Course does not exist',
            'course_id.unique' => 'Workflow already exists for this course',
        ];
    }
}
