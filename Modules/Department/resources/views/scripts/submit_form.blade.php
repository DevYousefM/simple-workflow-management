<script>
    $("#addDepartmentBtn").on('click', function() {
        $("#departmentForm").trigger("reset");
        $('#departmentForm').attr('action',
            "{{ route('dashboard.departments.store') }}");
        $('#departmentForm').attr('method', 'POST');
    })
    $("#createDepartment").on('click', function() {
        let form = $("#departmentForm").serialize();

        let url = $("#departmentForm").attr('action');
        let method = $("#departmentForm").attr('method');

        $.ajax({
            url: url,
            type: method,
            data: form,
            success: function(response) {
                if (method === 'POST') {
                    $('#departmentsTableBody').prepend(response
                        .department);
                } else if (method === 'PUT') {

                    let departmentRow = $("#u_" + response.department.id);
                    departmentRow.find('.userDatatable-content').text(response.department.name);
                }
                $('#departmentFormModal').modal('hide');
                $('#departmentForm')[0].reset();
                toastr.success(response.message);
            },
            error: function(xhr) {
                toastr.error(xhr.responseJSON.message);
            }
        });
    });

    $(document).on('click', '.edit', function(e) {
        e.preventDefault();

        let departmentId = $(this).data('id');

        $.ajax({
            url: "{{ route('dashboard.departments.edit', ':id') }}".replace(':id', departmentId),
            type: 'GET',
            success: function(response) {
                $('#departmentForm').attr('action',
                    "{{ route('dashboard.departments.update', ':id') }}".replace(':id',
                        departmentId));
                $('#departmentForm').attr('method', 'PUT');
                $('#name').val(response.name);
                $('#departmentFormModal').modal('show');
            }
        });
    });
</script>
