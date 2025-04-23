<!DOCTYPE html>
<?php
	require_once 'validate.php';
	require 'name.php';
	require_once 'connect.php'; // Ensure database connection
?>
<html lang="en">
<head>
	<title>Sugarland Hotel Online Reservation</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
</head>
<body>

<!-- Navbar -->
<nav style="background-color:rgba(0, 0, 0, 0.1);" class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand">Sugarland Hotel Online Reservation</a>
		</div>
		<ul class="nav navbar-nav pull-right">
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
					<i class="glyphicon glyphicon-user"></i> <?php echo $name; ?>
				</a>
				<ul class="dropdown-menu">
					<li><a href="logout.php"><i class="glyphicon glyphicon-off"></i> Logout</a></li>
				</ul>
			</li>
		</ul>
	</div>
</nav>

<!-- Navigation -->
<div class="container-fluid">	
	<ul class="nav nav-pills">
		<li><a href="home.php">Home</a></li>
		<li><a href="account.php">Accounts</a></li>
		<li><a href="reserve.php">Reservation</a></li>
		<li class="active"><a href="transaction.php">Transaction</a></li>			
	</ul>	
</div>

<!-- Transactions Table -->
<div class="container mt-4">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Transaction Records</h3>
		</div>
		<div class="panel-body">
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Name</th>
						<th>Room No</th>
						<th>Check-In Date</th>
						<th>Check-Out Date</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$query = $conn->query("SELECT * FROM `transaction` NATURAL JOIN `guest` WHERE `status` = 'Check In'") or die(mysqli_error($conn));

						while ($fetch = $query->fetch_array()) {
					?>
					<tr>
						<td><?php echo htmlspecialchars($fetch['firstname'] . " " . $fetch['lastname']); ?></td>
						<td><?php echo htmlspecialchars($fetch['room_no']); ?></td>
						<td><?php echo date("M d, Y", strtotime($fetch['checkin'])); ?></td>
						<td><?php echo date("M d, Y", strtotime($fetch['checkin'] . " +" . $fetch['days'] . " days")); ?></td>
						<td><?php echo htmlspecialchars($fetch['status']); ?></td>
						<td>
							<a class="btn btn-warning" href="checkout_query.php?transaction_id=<?php echo $fetch['transaction_id']; ?>" 
							   onclick="return confirm('Are you sure you want to check out this guest?');">
								<i class="glyphicon glyphicon-check"></i> Check Out
							</a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- Footer -->
<div style="text-align:right; margin-right:10px;" class="navbar navbar-default navbar-fixed-bottom">
	<label>Araneta Street, Singcang Bacolod City, 6100 Philippines</label>
	<br />
	<label>Team Silencer Hotel Reservation &copy; 2025 DIU</label>
</div>

<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.js"></script>	
</body>
</html>
