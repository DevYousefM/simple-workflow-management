    <tr id="u_{{ $workflow->id }}">
        <td>
            <div class="userDatatable-content">
                {{ $workflow->name }}
            </div>
        </td>
        <td>
            <div class="userDatatable-content">
                {{ $workflow->course->name }}
            </div>
        </td>
        <td>
            <div class="userDatatable-content">
                {{ $workflow->current_step->name }} | {{ $workflow->current_step->department->name }}
            </div>
        </td>

        <td>
            <div class="userDatatable-content">
                {{ $workflow->status }}
            </div>
        </td>
        <td>
            <ul class="orderDatatable_actions mb-0 d-flex flex-wrap justify-content-start">
                @if ($workflow->current_step->order == 1)
                    <li>
                        <a href="{{ route('dashboard.workflows.edit', $workflow->id) }}" class="edit"
                            data-id="{{ $workflow->id }}">
                            <i class="uil uil-eye"></i>
                        </a>
                    </li>
                @endif
                <li class="d-none">
                    <form action="{{ route('dashboard.workflows.destroy', $workflow->id) }}" method="POST"
                        class="d-inline" id="deleteWorkflowForm-{{ $workflow->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn remove" data-bs-toggle="modal"
                            data-bs-target="#modalDeleteWorkflow">
                            <i class="uil uil-trash-alt"></i>
                        </button>
                    </form>
                </li>
                <li>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalDeleteWorkflow" class="remove"
                        data-workflow-id="{{ $workflow->id }}">
                        <i class="uil uil-trash-alt"></i>
                    </a>
                </li>

            </ul>
        </td>
    </tr>
