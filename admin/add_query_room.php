<?php
	if (isset($_POST['add_room'])) {
		require_once 'connect.php'; // Ensure database connection is included

		$room_name = addslashes($_POST['room_name']);
		$room_type = $_POST['room_type'];
		$price = $_POST['price'];
		$total_rooms = (int)$_POST['total_rooms']; // Get total room count from the form
		$photo_name = addslashes($_FILES['photo']['name']);

		// Check current total rooms in the hotel
		$query = $conn->query("SELECT SUM(total_rooms) AS total FROM `room`");
		$row = $query->fetch_assoc();
		$current_total = (int)$row['total'];

		if (($current_total + $total_rooms) > 150) {
			echo "<script>alert('Cannot add rooms. Maximum hotel capacity (150 rooms) reached!'); window.location='room.php';</script>";
			exit();
		}

		// Upload photo
		move_uploaded_file($_FILES['photo']['tmp_name'], "../photo/" . $_FILES['photo']['name']);

		// Insert the room details into the database
		$conn->query("INSERT INTO `room` (room_name, room_type, price, total_rooms, photo) VALUES('$room_name', '$room_type', '$price', '$total_rooms', '$photo_name')") or die(mysqli_error($conn));

		header("location:room.php");
	}
?>
