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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
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
        <li class="nav-item"><a class="nav-link" href="reserve.php">Reservation</a></li>
        <li class="nav-item"><a class="nav-link" href="room.php">Room</a></li>
		<li class="nav-item"><a class="nav-link" href="checkin.php">Check In</a></li>
        <li class="nav-item"><a class="nav-link active" href="checkout.php">Check Out</a></li>
    </ul>
</div>

<!-- Fetch Pending & Check-In Counts -->
<?php
    $q_p = $conn->query("SELECT COUNT(*) as total FROM `transaction` WHERE `status` = 'Pending'") or die(mysqli_error($conn));
    $f_p = $q_p->fetch_array();
    
    $q_ci = $conn->query("SELECT COUNT(*) as total FROM `transaction` WHERE `status` = 'Check In'") or die(mysqli_error($conn));
    $f_ci = $q_ci->fetch_array();
?>

<!-- Check-Out Panel -->
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Check-Out Details</h5>
        </div>
        <div class="card-body">
            <div class="d-flex gap-3">
                <a class="btn btn-success" href="reserve.php">
                    <span class="badge bg-light text-dark"><?php echo $f_p['total']?></span> Pendings
                </a>
                <a class="btn btn-info" href="checkin.php">
                    <span class="badge bg-light text-dark"><?php echo $f_ci['total']?></span> Check In
                </a>
                <a class="btn btn-warning disabled">
                    <i class="bi bi-eye"></i> Check Out
                </a>
            </div>

            <hr>

            <table id="table" class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Name</th>
                        <th>Room Type</th>
                        <th>Room No</th>
                        <th>Check In</th>
                        <th>Days</th>
                        <th>Check Out</th>
                        <th>Status</th>
                        <th>Extra Bed</th>
                        <th>Bill</th>
                        <th>Payment</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = $conn->query("SELECT * FROM `transaction` 
                            NATURAL JOIN `guest` 
                            NATURAL JOIN `room` 
                            WHERE `status` = 'Check Out'") or die(mysqli_error($conn));

                        while ($fetch = $query->fetch_array()) {
                    ?>
                    <tr>
                        <td><?php echo htmlspecialchars($fetch['firstname'] . " " . $fetch['lastname']); ?></td>
                        <td><?php echo htmlspecialchars($fetch['room_type']); ?></td>
                        <td><?php echo htmlspecialchars($fetch['room_no']); ?></td>
                        <td>
                            <span class="text-success">
                                <?php echo date("M d, Y", strtotime($fetch['checkin'])); ?>
                            </span> @
                            <span>
                                <?php echo date("h:i A", strtotime($fetch['checkin_time'])); ?>
                            </span>
                        </td>
                        <td><?php echo htmlspecialchars($fetch['days']); ?></td>
                        <td>
                            <span class="text-danger">
                                <?php echo date("M d, Y", strtotime($fetch['checkin']."+".$fetch['days']."DAYS")); ?>
                            </span> @
                            <span>
                                <?php echo date("h:i A", strtotime($fetch['checkout_time'])); ?>
                            </span>
                        </td>
                        <td><?php echo htmlspecialchars($fetch['status']); ?></td>
                        <td><?php echo ($fetch['extra_bed'] == "0") ? "None" : htmlspecialchars($fetch['extra_bed']); ?></td>
                        <td><?php echo "BDT " . number_format($fetch['bill'], 2); ?></td>
                        <td><span class="badge bg-success">Paid</span></td>
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

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $("#table").DataTable();
    });
</script>

</body>
</html>
