<script>
    $(document).ready(function() {
        $("#updateWorkflow").click(function() {
            let editUrl = "{{ route('dashboard.workflows.update', ':id') }}".replace(':id',
                "{{ $workflow->id }}");
            handleFormSubmission(editUrl, "PUT");
        });
    });
</script>
