<div class="row">
    <div class="col-lg-12">
        <div class="userDatatable global-shadow border-light-0 p-30 bg-white radius-xl w-100 mb-30">
            <form id="stepForm" class="table-responsive">
                <table class="table mb-0 table-borderless">
                    <thead>
                        <tr class="userDatatable-header">
                            <th>
                                <span class="userDatatable-title">Step Name</span>
                            </th>
                            <th>
                                <span class="userDatatable-title">Step Order</span>
                            </th>
                            <th>
                                <span class="userDatatable-title">Department</span>
                            </th>
                            <th style="width:5%">
                                <span class="userDatatable-title">Action</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="stepTableBody" style="width: 100%">
                        @if (isset($workflow) && $workflow->steps->count() > 0)
                            @foreach ($workflow->steps as $index => $step)
                                @include('workflow::steps.step_row', [
                                    'index' => $index,
                                    'name' => $step->name,
                                    'order' => $step->order,
                                    'step_id' => $step->id,
                                    'department_id' => $step->department_id
                                ])
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </form>
            <div class="d-flex justify-content-end pt-30" style="gap: 10px">
                <button id="addRow" type="button" class="btn btn-primary">Add Step</button>
            </div>
        </div>
    </div>
</div>
