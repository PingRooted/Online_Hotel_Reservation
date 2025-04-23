<!DOCTYPE html>
<?php
    require_once 'validate.php';
    require 'name.php';
    require_once 'connect.php';
?>
<html lang="en">
<head>
    <title>Hotel Online Reservation</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap 5 & DataTables -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand">Hotel Online Reservation</a>
        <div class="ms-auto">
            <div class="dropdown">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    <i class="bi bi-person"></i> <?php echo $name; ?>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- Navigation Pills -->
<div class="container mt-3">
    <ul class="nav nav-pills">
        <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
        <li class="nav-item"><a class="nav-link active" href="account.php">Accounts</a></li>
        <li class="nav-item"><a class="nav-link" href="reserve.php">Reservation</a></li>
        <li class="nav-item"><a class="nav-link" href="room.php">Room</a></li>
    </ul>
</div>

<!-- Accounts Table -->
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-info text-white">Accounts</div>
        <div class="card-body">
            <a class="btn btn-success mb-3" href="add_account.php">+ Create New Account</a>
            <table id="table" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  
                        $query = $conn->query("SELECT * FROM `admin`");
                        while($fetch = $query->fetch_assoc()){
                    ?>
                    <tr>
                        <td><?php echo $fetch['name']; ?></td>
                        <td><?php echo $fetch['username']; ?></td>
                        <td><?php echo md5($fetch['password']); ?></td>
                        <td class="text-center">
                            <a class="btn btn-warning btn-sm" href="edit_account.php?admin_id=<?php echo $fetch['admin_id']; ?>">Edit</a>
                            <a class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this record?');" href="delete_account.php?admin_id=<?php echo $fetch['admin_id']; ?>">Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="text-center mt-4 p-3 bg-light fixed-bottom">
Team Silencer Hotel Reservation &copy; 2025 DIU
</footer>

<!-- Bootstrap & DataTables Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#table').DataTable();
    });
</script>

</body>
</html>
