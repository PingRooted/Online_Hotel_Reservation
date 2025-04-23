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
    $q_p = $conn->query("SELECT COUNT(*) as total FROM `transaction` WHERE `status` = 'Pending'") or die(mysqli_error($conn));
    $f_p = $q_p->fetch_array();
    $q_ci = $conn->query("SELECT COUNT(*) as total FROM `transaction` WHERE `status` = 'Check In'") or die(mysqli_error($conn));
    $f_ci = $q_ci->fetch_array();
?>

<!-- Reservation Table -->
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Reservations</h5>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <button class="btn btn-success disabled"><span class="badge bg-light text-dark"><?php echo $f_p['total']?></span> Pending</button>
                <a class="btn btn-info" href="checkin.php"><span class="badge bg-light text-dark"><?php echo $f_ci['total']?></span> Check In</a>
                <a class="btn btn-warning" href="checkout.php"><i class="bi bi-eye"></i> Check Out</a>
            </div>
            
            <table id="reservationTable" class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Contact No</th>
                        <th>Room Type</th>
                        <th>Reserved Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = $conn->query("SELECT * FROM `transaction` NATURAL JOIN `guest` NATURAL JOIN `room` WHERE `status` = 'Pending'") or die(mysqli_error($conn));
                        while($fetch = $query->fetch_array()):
                    ?>
                    <tr>
                        <td><?php echo $fetch['firstname']." ".$fetch['lastname']?></td>
                        <td><?php echo $fetch['contactno']?></td>
                        <td><?php echo $fetch['room_type']?></td>
                        <td>
                            <strong>
                                <?php 
                                    $checkin_date = strtotime($fetch['checkin']);
                                    if ($checkin_date <= strtotime("+8 HOURS")) {
                                        echo "<span class='text-danger'>" . date("M d, Y", $checkin_date) . "</span>";
                                    } else {
                                        echo "<span class='text-success'>" . date("M d, Y", $checkin_date) . "</span>";
                                    }
                                ?>
                            </strong>
                        </td>
                        <td><?php echo $fetch['status']?></td>
                        <td>
                            <div class="d-flex gap-2">
                                <a class="btn btn-success btn-sm" href="confirm_reserve.php?transaction_id=<?php echo $fetch['transaction_id']?>"><i class="bi bi-check-circle"></i> Check In</a>
                                <a class="btn btn-danger btn-sm" onclick="return confirmationDelete();" href="delete_pending.php?transaction_id=<?php echo $fetch['transaction_id']?>"><i class="bi bi-trash"></i> Discard</a>
                            </div>
                        </td>
                    </tr>
                    <?php endwhile; ?>
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
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function(){
        $("#reservationTable").DataTable();
    });

    function confirmationDelete() {
        return confirm("Are you sure you want to delete this record?");
    }
</script>

</body>
</html>
