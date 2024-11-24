<script>
    $("#addUserBtn").on('click', function() {
        $("#userForm").trigger("reset");
        $('#userForm').attr('action',
            "{{ route('dashboard.users.store') }}");
        $('#userForm').attr('method', 'POST');
    })
    $("#createUser").on('click', function() {
        let form = $("#userForm").serialize();

        let url = $("#userForm").attr('action');
        let method = $("#userForm").attr('method');

        $.ajax({
            url: url,
            type: method,
            data: form,
            success: function(response) {
                if (method === 'POST') {
                    $('#usersTableBody').prepend(response
                        .user);
                } else if (method === 'PUT') {
                    let userRow = $("#u_" + response.user.id);
                    userRow.find('div[data-column-name="name"]').text(response.user.name);
                    userRow.find('div[data-column-name="email"]').text(response.user.email);
                    userRow.find('div[data-column-name="department"]').text(response.user.department
                        .name);
                }
                $('#userFormModal').modal('hide');
                $('#userForm')[0].reset();
                toastr.success(response.message);
            },
            error: function(xhr) {
                let errors = xhr.responseJSON.errors;

                $.each(errors, function(field, messages) {
                    $("#" + field).addClass('is-invalid');
                    $("#" + field).siblings('.invalid-feedback').text(messages[0]);
                });
            }
        });
    });

    $(document).on('click', '.edit', function(e) {
        e.preventDefault();

        let userId = $(this).data('id');

        $.ajax({
            url: "{{ route('dashboard.users.edit', ':id') }}".replace(':id', userId),
            type: 'GET',
            success: function(response) {
                $('#userForm').attr('action', "{{ route('dashboard.users.update', ':id') }}"
                    .replace(':id', userId));
                $('#userForm').attr('method', 'PUT');
                $('#name').val(response.name);
                $('#email').val(response.email);
                $('#department_id').val(response.department_id);
                $('#userFormModal').modal('show');
            }
        });
    });
</script>
