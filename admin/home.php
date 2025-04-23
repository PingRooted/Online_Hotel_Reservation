<!DOCTYPE html>
<?php
    require_once 'validate.php';
    require 'name.php';
    require 'connect.php'; // Ensure database connection

    // Fetch Total Admin Accounts
    $adminQuery = $conn->query("SELECT COUNT(*) AS total_admins FROM admin");
    $adminData = $adminQuery->fetch_assoc();

    // Fetch Total Guests
    $guestQuery = $conn->query("SELECT COUNT(*) AS total_guests FROM guest");
    $guestData = $guestQuery->fetch_assoc();

    // Fetch Total Available Rooms
    $roomQuery = $conn->query("SELECT COUNT(*) AS total_rooms FROM room");
    $roomData = $roomQuery->fetch_assoc();

    // Fetch Total Reservations (from transactions where status is active)
    $reservationQuery = $conn->query("SELECT COUNT(*) AS total_reservations FROM transaction WHERE status='active'");
    $reservationData = $reservationQuery->fetch_assoc();

    // Fetch Total Profit (sum of all bills from transactions)
    $profitQuery = $conn->query("SELECT SUM(bill) AS total_profit FROM transaction WHERE status='completed'");
    $profitData = $profitQuery->fetch_assoc();
?>
<html lang="en">
<head>
    <title>Admin Dashboard - Hotel Reservation</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand">Hotel Admin Panel</a>
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
        <li class="nav-item"><a class="nav-link active" href="home.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="account.php">Accounts</a></li>
        <li class="nav-item"><a class="nav-link" href="reserve.php">Reservation</a></li>
        <li class="nav-item"><a class="nav-link" href="room.php">Room</a></li>
    </ul>
</div>

<!-- Dashboard Stats -->
<div class="container mt-4">
    <div class="row g-3">
        <div class="col-md-4">
            <div class="card text-white bg-primary shadow">
                <div class="card-body">
                    <h5 class="card-title">Total Admins</h5>
                    <h2><?php echo $adminData['total_admins']; ?></h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success shadow">
                <div class="card-body">
                    <h5 class="card-title">Total Guests</h5>
                    <h2><?php echo $guestData['total_guests']; ?></h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning shadow">
                <div class="card-body">
                    <h5 class="card-title">Available Rooms</h5>
                    <h2><?php echo $roomData['total_rooms']; ?></h2>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="text-center mt-4 p-3 bg-light">
    Team Silencer Hotel Reservation &copy; 2025 DIU
</footer>

<!-- Bootstrap Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
