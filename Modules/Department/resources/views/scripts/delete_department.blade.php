<script>
    $('#modalDeleteDepartment').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var departmentId = button.data('department-id');

        $('#confirmDelete').off('click').on('click', function() {
            $.ajax({
                url: "{{ route('dashboard.departments.destroy', ':id') }}"
                    .replace(':id', departmentId),
                type: 'POST',
                data: {
                    _method: 'DELETE',
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    $(`#u_${departmentId}`).remove();
                    $('#modalDeleteDepartment').modal('hide');
                    toastr.success(response.message);
                },
                error: function(xhr) {
                    toastr.error(xhr.responseJSON.message);
                }
            });
        });
    });
</script>
