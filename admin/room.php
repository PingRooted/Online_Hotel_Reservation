<!DOCTYPE html>
<?php
	require_once 'validate.php';
	require 'name.php';
?>
<html lang="en">
<head>
	<title>Hotel Online Reservation</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" />
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand">Hotel Online Reservation</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ms-auto">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<i class="bi bi-person-circle"></i> <?php echo $name; ?>
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container mt-4">
		<ul class="nav nav-pills mb-3">
			<li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
			<li class="nav-item"><a class="nav-link" href="account.php">Accounts</a></li>
			<li class="nav-item"><a class="nav-link" href="reserve.php">Reservation</a></li>
			<li class="nav-item"><a class="nav-link active" href="room.php">Room</a></li>
		</ul>
		<div class="card">
			<div class="card-header bg-primary text-white">Transaction / Room</div>
			<div class="card-body">
				<a class="btn btn-success mb-3" href="add_room.php"><i class="bi bi-plus-circle"></i> Add Room</a>
				<table id="roomTable" class="table table-bordered">
					<thead class="table-dark">
						<tr>
							<th>Room Type</th>
							<th>Price</th>
							<th>Photo</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$query = $conn->query("SELECT * FROM `room`") or die(mysqli_error());
						while ($fetch = $query->fetch_array()) {
						?>
							<tr>
								<td><?php echo $fetch['room_type']; ?></td>
								<td><?php echo $fetch['price']; ?></td>
								<td class="text-center"><img src="../photo/<?php echo $fetch['photo']; ?>" height="50" width="50" class="img-thumbnail" /></td>
								<td class="text-center">
									<a class="btn btn-warning" href="edit_room.php?room_id=<?php echo $fetch['room_id']; ?>">
										<i class="bi bi-pencil-square"></i> Edit
									</a>
									<a class="btn btn-danger" onclick="return confirmationDelete(this);" href="delete_room.php?room_id=<?php echo $fetch['room_id']; ?>">
										<i class="bi bi-trash"></i> Delete
									</a>
								</td>
							</tr>
						<?php
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<footer class="text-center py-3 mt-4 bg-dark text-white">
	Team Silencer Hotel Reservation &copy; 2025 DIU
	</footer>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
	<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
	<script>
		function confirmationDelete(anchor) {
			return confirm("Are you sure you want to delete this record?");
		}
		$(document).ready(function () {
			$('#roomTable').DataTable();
		});
	</script>
</body>
</html>
