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

    <!-- Button to open Create Modal -->
    <button onclick="openCreate()">Add User</button>

    <!-- Table HTML -->
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

    <!-- Modal for editing users -->
    <div id="editModal" style="display:none; position:fixed; top:50%; left:50%; transform: translate(-50%, -50%); background:white; padding:20px;">
        <h2>Edit User</h2>
        <form id="editForm">
            <input type="hidden" id="userId" name="userId">
            Name: <input type="text" id="userName" name="userName"><br><br>
            Email: <input type="text" id="userEmail" name="userEmail"><br><br>
            <input type="button" value="Save" onclick="saveEdit()">
            <input type="button" value="Cancel" onclick="closeEdit()">
        </form>
    </div>

    <!-- Modal for creating users -->
    <div id="createModal" style="display:none; position:fixed; top:50%; left:50%; transform: translate(-50%, -50%); background:white; padding:20px;">
        <h2>Create User</h2>
        <form id="createForm">
            Name: <input type="text" id="createUserName" name="userName"><br><br>
            Email: <input type="text" id="createUserEmail" name="userEmail"><br><br>
            <input type="button" value="Create" onclick="createUser()">
            <input type="button" value="Cancel" onclick="closeCreate()">
        </form>
    </div>

    <script>
        $(document).ready(function () {
            const table = $('#usersTable').DataTable({
                "ajax": {
                    "url": "http://localhost/Idaw/TP4/exo5/users.php",
                    "dataSrc": "users"
                },
                "columns": [
                    { "data": "id" },
                    { "data": "name" },
                    { "data": "email" },
                    {
                        "data": null,
                        "render": function (data, type, row) {
                            return `<button onclick="editUser(${data.id})">Edit</button> <button onclick="deleteUser(${data.id})">Delete</button>`;
                        }
                    }
                ]
            });

            window.editUser = function (id, name, email) {
                document.getElementById("userId").value = id;
                document.getElementById("userName").value = name;
                document.getElementById("userEmail").value = email;
                document.getElementById("editModal").style.display = "block";
            };

            window.deleteUser = function (id) {
                if (confirm("Are you sure?")) {
                    $.ajax({
                        url: `http://localhost/Idaw/TP4/exo5/users.php?id=${id}`,
                        type: 'DELETE',
                        success: function () {
                            table.ajax.reload();
                        },
                        error: function () {
                            alert('Failed to delete user.');
                        }
                    });
                }
            };

            window.closeEdit = function () {
                document.getElementById("editModal").style.display = "none";
            };

            window.openCreate = function () {
                document.getElementById("createModal").style.display = "block";
            };

            window.closeCreate = function () {
                document.getElementById("createModal").style.display = "none";
            };

            window.createUser = function () {
                const userName = document.getElementById("createUserName").value;
                const userEmail = document.getElementById("createUserEmail").value;

                $.ajax({
                    url: "http://localhost/Idaw/TP4/exo5/users.php?id=${id}",
                    type: 'POST',
                    data: {
                        action: 'create',
                        name: userName,
                        email: userEmail
                    },
                    success: function (response) {
                        if (response && response.status === "User created successfully") {
                            table.ajax.reload();
                            document.getElementById("createModal").style.display = "none";
                            alert('User created successfully.');
                        } else {
                            alert('Failed to create user.');
                        }
                    },
                    error: function () {
                        alert('Failed to create user.');
                    }
                });
            };


window.editUser = function (id) {
    $.ajax({
        url: `http://localhost/Idaw/TP4/exo5/users.php?id=${id}`,
        type: 'GET',
        success: function (data) {
            if (data && data.user) {
                document.getElementById("userId").value = data.user.id;
                document.getElementById("userName").value = data.user.name;
                document.getElementById("userEmail").value = data.user.email;
                document.getElementById("editModal").style.display = "block";
            }
        },
        error: function () {
            alert('Failed to fetch user details.');
        }
    });
};

window.saveEdit = function () {
    const userId = document.getElementById("userId").value;
    const userName = document.getElementById("userName").value;
    const userEmail = document.getElementById("userEmail").value;

    $.ajax({
        url: "http://localhost/Idaw/TP4/exo5/users.php",
        type: 'POST',
        data: {
            action: 'edit',
            id: userId,
            name: userName,
            email: userEmail
        },
        success: function (response) {
            if (response && response.status === "User updated successfully") {
                table.ajax.reload();
                document.getElementById("editModal").style.display = "none";
                alert('User updated successfully.');
            } else {
                alert('Failed to update user.');
            }
        },
        error: function () {
            alert('Failed to update user.');
        }
    });
};





});
</script>

</body>
</html>