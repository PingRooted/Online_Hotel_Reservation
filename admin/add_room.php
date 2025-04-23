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
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
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
			<div class="card-header bg-primary text-white">Add Room</div>
			<div class="card-body">
			<form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label class="form-label">Room Name</label>
        <input type="text" class="form-control" name="room_name" required placeholder="Enter room name" />
    </div>
    <div class="mb-3">
        <label class="form-label">Room Type</label>
        <select class="form-control" required name="room_type">
            <option value="">Choose an option</option>
            <option value="Standard">Standard</option>
            <option value="Superior">Superior</option>
            <option value="Super Deluxe">Super Deluxe</option>
            <option value="Jr. Suite">Jr. Suite</option>
            <option value="Executive Suite">Executive Suite</option>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Price</label>
        <input type="number" min="0" max="999999999" class="form-control" name="price" required />
    </div>
    <div class="mb-3">
        <label class="form-label">Photo</label>
        <div id="preview" class="border p-2" style="width:150px; height:150px;">
            <img src="../photo/default.png" id="image" width="100%" height="100%" />
        </div>
        <input type="file" required id="photo" name="photo" class="form-control" />
    </div>
    <div class="text-center">
        <button name="add_room" class="btn btn-success"><i class="bi bi-plus-circle"></i> Add Room</button>
    </div>
</form>
<?php require_once 'add_query_room.php'; ?>

			</div>
		</div>
	</div>
	<footer class="text-center py-3 mt-4 bg-dark text-white">
	Team Silencer Hotel Reservation &copy; 2025 DIU
	</footer>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
	<script>
		document.getElementById("photo").addEventListener("change", function(event) {
			const reader = new FileReader();
			reader.onload = function() {
				document.getElementById("image").src = reader.result;
			};
			reader.readAsDataURL(event.target.files[0]);
		});
	</script>
</body>
</html>