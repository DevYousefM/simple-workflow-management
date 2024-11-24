    <tr id="u_{{ $department->id }}">
        <td>
            <div class="userDatatable-content">
                {{ $department->name }}
            </div>
        </td>
        <td>
            <ul class="orderDatatable_actions mb-0 d-flex flex-wrap justify-content-start">
                <li>
                    <a href="#" class="edit" data-id="{{ $department->id }}">
                        <i class="uil uil-eye"></i>
                    </a>
                </li>
                <li class="d-none">
                    <form action="{{ route('dashboard.departments.destroy', $department->id) }}" method="POST"
                        class="d-inline" id="deleteDepartmentForm-{{ $department->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn remove" data-bs-toggle="modal"
                            data-bs-target="#modalDeleteDepartment">
                            <i class="uil uil-trash-alt"></i>
                        </button>
                    </form>
                </li>
                <li>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalDeleteDepartment" class="remove"
                        data-department-id="{{ $department->id }}">
                        <i class="uil uil-trash-alt"></i>
                    </a>
                </li>
            </ul>
        </td>
    </tr>
