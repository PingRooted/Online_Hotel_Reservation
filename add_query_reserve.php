<?php
require_once 'admin/connect.php';

if (isset($_POST['add_guest'])) {
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $contactno = $_POST['contactno'];
    $checkin = $_POST['date'];
    $room_id = $_REQUEST['room_id'];
    $current_date = date("Y-m-d", strtotime('+8 HOURS'));

    // Validate check-in date
    if ($checkin < $current_date) {
        echo "<script>alert('Check-in date must be today or a future date.');</script>";
        exit();
    }

    // Secure queries using prepared statements
    $stmt = $conn->prepare("INSERT INTO `guest` (firstname, middlename, lastname, address, contactno) VALUES(?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $firstname, $middlename, $lastname, $address, $contactno);
    $stmt->execute();

    // Get the newly created guest ID
    $stmt = $conn->prepare("SELECT guest_id FROM `guest` WHERE firstname = ? AND lastname = ? AND contactno = ?");
    $stmt->bind_param("sss", $firstname, $lastname, $contactno);
    $stmt->execute();
    $result = $stmt->get_result();
    $fetch = $result->fetch_assoc();

    if (!$fetch) {
        echo "<script>alert('Error retrieving guest information.');</script>";
        exit();
    }
    
    $guest_id = $fetch['guest_id'];

    // Check if room is already booked for the selected date
    $stmt = $conn->prepare("SELECT * FROM `transaction` WHERE checkin = ? AND room_id = ? AND status = 'Pending'");
    $stmt->bind_param("si", $checkin, $room_id);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        echo "<script>alert('Selected date is not available. Please choose another date.');</script>";
        exit();
    }

    // Insert transaction if room is available
    $stmt = $conn->prepare("INSERT INTO `transaction` (guest_id, room_id, status, checkin) VALUES (?, ?, 'Pending', ?)");
    $stmt->bind_param("iis", $guest_id, $room_id, $checkin);

    if ($stmt->execute()) {
        header("location: reply_reserve.php");
        exit();
    } else {
        echo "<script>alert('Error processing reservation.');</script>";
    }
}
?>
