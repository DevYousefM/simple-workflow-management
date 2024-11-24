<script>
        function handleFormSubmission(url, method) {
            let workflowForm = $("#workflowForm").serializeArray();
            let stepsForm = $("#stepForm").serializeArray();

            let formData = {};

            workflowForm.concat(stepsForm).forEach((field) => {
                if (formData[field.name]) {
                    if (!Array.isArray(formData[field.name])) {
                        formData[field.name] = [formData[field.name]];
                    }
                    formData[field.name].push(field.value);
                } else {
                    formData[field.name] = field.value;
                }
            });

            $.ajax({
                url: url,
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    _method: method,
                    ...formData
                },
                success: function(response) {
                    toastr.success(response.message);
                    if (response.id) {
                        window.location.href = "{{ route('dashboard.workflows.edit', ':id') }}"
                            .replace(':id', response.id);
                    }
                },
                error: function(xhr) {
                    if (xhr.status == 422) {
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function(field, messages) {
                            toastr.error(messages[0]);
                        });
                    }
                }
            });
        }
</script>
