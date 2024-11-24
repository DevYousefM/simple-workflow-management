<script>
    $('#modalDeleteWorkflow').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var workflowId = button.data('workflow-id');

        $('#confirmDelete').off('click').on('click', function() {
            $.ajax({
                url: "{{ route('dashboard.workflows.destroy', ':id') }}"
                    .replace(':id', workflowId),
                type: 'POST',
                data: {
                    _method: 'DELETE',
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    $(`#u_${workflowId}`).remove();
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
