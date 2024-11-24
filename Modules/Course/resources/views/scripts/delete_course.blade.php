<script>
    $('#modalDeleteCourse').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var courseId = button.data('course-id');

        $('#confirmDelete').off('click').on('click', function() {
            $.ajax({
                url: "{{ route('dashboard.courses.destroy', ':id') }}"
                    .replace(':id', courseId),
                type: 'POST',
                data: {
                    _method: 'DELETE',
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    $(`#u_${courseId}`).remove();
                    $('#modalDeleteCourse').modal('hide');
                    toastr.success(response.message);
                },
                error: function(xhr) {
                    toastr.error(xhr.responseJSON.message);
                }
            });
        });
    });
</script>
