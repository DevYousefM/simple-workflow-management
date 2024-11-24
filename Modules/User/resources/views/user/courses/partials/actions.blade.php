@if (count($step->workflow->actions) > 0)
    <div class="row">
        <div class="col-lg-12 col-12 col-lg-6">
            <div class="userDatatable global-shadow border-light-0 p-30 bg-white radius-xl w-100 mb-30">
                <div class="table-responsive">
                    <table class="table mb-0 table-striped ">
                        <thead>
                            <tr class="userDatatable-header">
                                <th>
                                    <span class="userDatatable-title">User</span>
                                </th>
                                <th>
                                    <span class="userDatatable-title">Department</span>
                                </th>
                                <th>
                                    <span class="userDatatable-title ">Action</span>
                                </th>
                                <th>
                                    <span class="userDatatable-title ">File</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($step->workflow->actions as $action)
                                <tr id="u_{{ $action->id }}">
                                    <td>
                                        <div class="userDatatable-content">
                                            {{ $action->user->name }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="userDatatable-content">
                                            {{ $action->user->department->name }}
                                        </div>
                                    </td>

                                    <td>
                                        <div class="userDatatable-content {{ $action->action_type == 'Approved' ? 'text-success' : 'text-danger' }}">
                                            {{ $action->action_type }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="userDatatable-content">
                                            <a href="{{ $action->file_path }}">File</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endif
