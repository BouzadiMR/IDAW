<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
</head>
<body>

<table id="usersTable" class="display">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>

<script>
$(document).ready(function() {
    const table = $('#usersTable').DataTable({
        "ajax": {
            "url": "http://localhost/IDAW/TP4/exo5/users.php",
            "dataSrc": ""
        },
        "columns": [
            { "data": "id" },
            { "data": "name" },
            { "data": "email" },
            {
                "data": null,
                "render": function(data, type, row) {
                    return `<button onclick="editUser(${data.id})">Edit</button> <button onclick="deleteUser(${data.id})">Delete</button>`;
                }
            }
        ]
    });

    window.editUser = function(id) {
        
    };

    window.deleteUser = function(id) {
        if (confirm("Are you sure?")) {
            $.ajax({
                url: `http://localhost/IDAW/TP4/exo5/users.php/${id}`,
                type: 'DELETE',
                success: function() {
                    table.ajax.reload();
                },
                error: function() {
                    alert('Failed to delete user.');
                }
            });
        }
    };
});
</script>

</body>
</html>