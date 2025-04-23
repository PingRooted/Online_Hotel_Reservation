<?php
require_once 'connect.php';

$room_id = $_REQUEST['room_id'];

// Prevent SQL injection
$room_id = mysqli_real_escape_string($conn, $room_id);

// Perform delete query
mysqli_query($conn, "DELETE FROM `room` WHERE `room_id` = '$room_id'") or die(mysqli_error($conn));

// Redirect
header("location:room.php");
?>
