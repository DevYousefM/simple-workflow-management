    <tr id="u_{{ $course->id }}">
        <td>
            <div class="userDatatable-content">
                {{ $course->name }}
            </div>
        </td>
        <td>
            <ul class="orderDatatable_actions mb-0 d-flex flex-wrap justify-content-start">
                <li>
                    <a href="#" class="edit" data-id="{{ $course->id }}">
                        <i class="uil uil-eye"></i>
                    </a>
                </li>
                <li class="d-none">
                    <form action="{{ route('dashboard.courses.destroy', $course->id) }}" method="POST"
                        class="d-inline" id="deleteCourseForm-{{ $course->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn remove" data-bs-toggle="modal"
                            data-bs-target="#modalDeleteCourse">
                            <i class="uil uil-trash-alt"></i>
                        </button>
                    </form>
                </li>
                <li>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalDeleteCourse" class="remove"
                        data-course-id="{{ $course->id }}">
                        <i class="uil uil-trash-alt"></i>
                    </a>
                </li>
            </ul>
        </td>
    </tr>
