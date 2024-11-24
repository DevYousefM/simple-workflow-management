<script>
    $(document).ready(function() {
        $("#saveWorkflow").click(function() {
            let createUrl = "{{ route('dashboard.workflows.store') }}";
            handleFormSubmission(createUrl, "POST");
        });
    });
</script>
