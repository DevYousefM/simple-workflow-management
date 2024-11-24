    <tr id="u_{{ $user->id }}">
        <td>
            <div class="userDatatable-content" data-column-name="name">
                {{ $user->name }}
            </div>
        </td>
        <td>
            <div class="userDatatable-content" data-column-name="email">
                {{ $user->email }}
            </div>
        </td>
        <td>
            <div class="userDatatable-content" data-column-name="department">
                {{ $user->department->name }}
            </div>
        </td>
        <td>
            <ul class="orderDatatable_actions mb-0 d-flex flex-wrap justify-content-start">
                <li>
                    <a href="#" class="edit" data-id="{{ $user->id }}">
                        <i class="uil uil-eye"></i>
                    </a>
                </li>
                <li class="d-none">
                    <form action="{{ route('dashboard.users.destroy', $user->id) }}" method="POST"
                        class="d-inline" id="deleteUserForm-{{ $user->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn remove" data-bs-toggle="modal"
                            data-bs-target="#modalDeleteUser">
                            <i class="uil uil-trash-alt"></i>
                        </button>
                    </form>
                </li>
                <li>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalDeleteUser" class="remove"
                        data-user-id="{{ $user->id }}">
                        <i class="uil uil-trash-alt"></i>
                    </a>
                </li>
            </ul>
        </td>
    </tr>
