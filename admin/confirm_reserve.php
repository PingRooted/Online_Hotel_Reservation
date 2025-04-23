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
        <li class="nav-item"><a class="nav-link" href="account.php">Accounts</a></li>
        <li class="nav-item"><a class="nav-link active" href="reserve.php">Reservation</a></li>
        <li class="nav-item"><a class="nav-link" href="room.php">Room</a></li>
    </ul>
</div>

<!-- Fetch Data -->
<?php
    $query = $conn->query("SELECT * FROM `transaction` NATURAL JOIN `guest` NATURAL JOIN `room` WHERE `transaction_id` = '$_REQUEST[transaction_id]'") or die(mysqli_error($conn));
    $fetch = $query->fetch_array();
?>

<!-- Reservation Form -->
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Reservation Form</h5>
        </div>
        <div class="card-body">
            <div class="alert alert-info">Fill in the form below</div>

            <form method="POST" enctype="multipart/form-data" action="save_form.php?transaction_id=<?php echo $fetch['transaction_id']?>">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">First Name</label>
                        <input type="text" value="<?php echo $fetch['firstname']?>" class="form-control" disabled>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Middle Name</label>
                        <input type="text" value="<?php echo $fetch['middlename']?>" class="form-control" disabled>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Last Name</label>
                        <input type="text" value="<?php echo $fetch['lastname']?>" class="form-control" disabled>
                    </div>
                </div>

                <div class="row g-3 mt-3">
                    <div class="col-md-3">
                        <label class="form-label">Room Type</label>
                        <input type="text" value="<?php echo $fetch['room_type']?>" class="form-control" disabled>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Room No</label>
                        <input type="number" min="1" max="999" name="room_no" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Days</label>
                        <input type="number" min="1" max="99" name="days" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Extra Bed</label>
                        <input type="number" min="0" max="99" name="extra_bed" class="form-control">
                        <small class="text-danger">*Extra Bed costs 800</small>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" name="add_form" class="btn btn-primary"><i class="bi bi-save"></i> Submit</button>
                </div>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>
</html>
