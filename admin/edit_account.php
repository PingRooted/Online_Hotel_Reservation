<!DOCTYPE html>
<?php
    require_once 'validate.php';
    require 'name.php';
?>
<html lang="en">
<head>
    <title>Hotel Online Reservation</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
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
                    <li><a class="dropdown-item" href="logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
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

<!-- Account Edit Panel -->
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Edit Account</h5>
        </div>
        <div class="card-body">
            <?php
                $query = $conn->query("SELECT * FROM `admin` WHERE `admin_id` = '$_REQUEST[admin_id]'") or die(mysqli_error($conn));
                $fetch = $query->fetch_array();
            ?>
            <form method="POST" action="edit_query_account.php?admin_id=<?php echo $fetch['admin_id']?>">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $fetch['name']?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" value="<?php echo $fetch['username']?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" value="<?php echo $fetch['password']?>" required>
                </div>
                <button type="submit" name="edit_account" class="btn btn-warning"><i class="bi bi-pencil-square"></i> Save Changes</button>
            </form>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="text-center mt-4 p-3 bg-light fixed-bottom">
Team Silencer Hotel Reservation &copy; 2025 DIU
</footer>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>