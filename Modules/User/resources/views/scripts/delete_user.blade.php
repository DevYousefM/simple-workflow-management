<script>
    $('#modalDeleteUser').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var userId = button.data('user-id');

        $('#confirmDelete').off('click').on('click', function() {
            $.ajax({
                url: "{{ route('dashboard.users.destroy', ':id') }}"
                    .replace(':id', userId),
                type: 'POST',
                data: {
                    _method: 'DELETE',
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    $(`#u_${userId}`).remove();
                    $('#modalDeleteUser').modal('hide');
                    toastr.success(response.message);
                },
                error: function(xhr) {
                    toastr.error(xhr.responseJSON.message);
                }
            });
        });
    });
</script>
