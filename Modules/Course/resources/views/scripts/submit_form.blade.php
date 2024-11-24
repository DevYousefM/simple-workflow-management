<script>
    $("#addCourseBtn").on('click', function() {
        $("#courseForm").trigger("reset");
        $('#courseForm').attr('action',
            "{{ route('dashboard.courses.store') }}");
        $('#courseForm').attr('method', 'POST');
    })
    $("#SubmitCourseForm").on('click', function() {
        let form = $("#courseForm").serialize();

        let url = $("#courseForm").attr('action');
        let method = $("#courseForm").attr('method');

        $.ajax({
            url: url,
            type: method,
            data: form,
            success: function(response) {
                if (method === 'POST') {
                    $('#coursesTableBody').prepend(response
                        .course);
                } else if (method === 'PUT') {
                    let courseRow = $("#u_" + response.course.id);
                    courseRow.find('.userDatatable-content').text(response.course.name);
                }
                $('#courseFormModal').modal('hide');
                $('#courseForm')[0].reset();
                toastr.success(response.message);
            },
            error: function(xhr) {
                toastr.error(xhr.responseJSON.message);
            }
        });
    });

    $(document).on('click', '.edit', function(e) {
        e.preventDefault();

        let courseId = $(this).data('id');

        $.ajax({
            url: "{{ route('dashboard.courses.edit', ':id') }}".replace(':id', courseId),
            type: 'GET',
            success: function(response) {
                $('#courseForm').attr('action',
                    "{{ route('dashboard.courses.update', ':id') }}".replace(':id',
                        courseId));
                $('#courseForm').attr('method', 'PUT');
                $('#name').val(response.name);
                $('#courseFormModal').modal('show');
            }
        });
    });
</script>
