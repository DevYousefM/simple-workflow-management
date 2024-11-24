<tr id="u_{{ $course->id }}">
    <td>
        <div class="userDatatable-content">
            {{ $course->name }}
        </div>
    </td>
    <td>
        <div class="userDatatable-content">
            {{ $course->workflow->name }}
        </div>
    </td>
    <td>
        <ul class="orderDatatable_actions mb-0 d-flex flex-wrap justify-content-start">
            <li>
                <a href="{{ route('user.take.action', ['course_id' => $course->id, 'step_id' => $course->workflow->currentStep->id]) }}"
                    class="edit" data-id="{{ $course->id }}">
                    <i class="uil uil-check"></i>
                </a>
            </li>
        </ul>
    </td>
</tr>
