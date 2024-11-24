<script>
    var rowIndex = {{ count($workflow->steps ?? []) }};
    $(document).ready(function() {
        function getNewRowHtml() {
            return $.ajax({
                type: "GET",
                url: "{{ route('dashboard.workflows.get_step_row') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    index: rowIndex,
                    order: rowIndex
                },
                success: function(response) {
                    return response;
                }
            });
        }

        $('#addRow').click(function() {
            rowIndex++;
            $("#addRow").prop('disabled', true);
            getNewRowHtml().done(function(newRowHtml) {
                $('#stepTableBody').append(newRowHtml);
                $("#addRow").prop('disabled', false);
            })
        });
    });

    function remove_step(e, $step_id = null) {
        e.preventDefault();
        e.target.closest('tr').remove();
        rowIndex--;

        $("#stepTableBody tr").each(function(index) {
            $(this).find('input[name$="[order]"]').val(index + 1);
        });

        if ($step_id) {
            $.ajax({
                type: "POST",
                url: "{{ route('dashboard.workflows.delete_step', ':id') }}".replace(':id', $step_id),
                data: {
                    _token: "{{ csrf_token() }}",
                    _method: 'DELETE'
                }

            });
        }
    }
</script>
