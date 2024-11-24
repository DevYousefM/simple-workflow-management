<script>
    $(document).ready(function() {
        // Approve action click event
        $("#ApproveAction").click(function() {
            let form = $("#actionForm")[0];
            let formData = new FormData(form);

            formData.append('action', 'Approve');

            for (var pair of formData.entries()) {
                console.log(pair[0] + ': ' + pair[1]);
            }

            $.ajax({
                url: "{{ route('user.store.action', ':id') }}".replace(':id', $(this).data(
                    'step-id')),
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    toastr.success(response.message);
                    window.location.href = "{{ route('user.courses.index') }}";
                },
                error: function(xhr, status, error) {
                    toastr.error(xhr.responseJSON.message);
                }
            });
        });

        // Reject action click event
        $("#RejectAction").click(function() {
            let form = $("#actionForm")[0];
            let formData = new FormData(form);

            formData.append('action', 'Reject');

            for (var pair of formData.entries()) {
                console.log(pair[0] + ': ' + pair[1]);
            }

            $.ajax({
                url: "{{ route('user.store.action', ':id') }}".replace(':id', $(this).data(
                    'step-id')),
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log('Form submitted successfully:', response);
                    window.location.href = "{{ route('user.courses.index') }}";
                },
                error: function(xhr, status, error) {
                    toastr.error(xhr.responseJSON.message);
                }
            });
        });
    });
</script>
