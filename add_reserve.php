<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Reservation - Team Silencer</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        body { font-family: Arial, sans-serif; background: #f8f9fa; }
        nav.navbar { background-color: #333; color: white; padding: 10px; text-align: center; }
        nav a { color: white; font-weight: bold; text-decoration: none; }
        ul#menu { list-style: none; text-align: center; background: #444; padding: 10px; }
        ul#menu li { display: inline; margin: 0 15px; }
        ul#menu a { color: white; text-decoration: none; }
        .container { margin-top: 20px; padding-bottom: 50px; }
        .reservation-box {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0,0,0,0.1);
            max-width: 500px;
            margin: auto;
        }
        .btn-reserve, .btn-back {
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            transition: 0.3s;
            width: 100%;
        }
        .btn-reserve { background: #007b5e; }
        .btn-reserve:hover { background: #005a4c; }
        .btn-back { background: #6c757d; margin-top: 10px; }
        .btn-back:hover { background: #5a6268; }
        footer { text-align: center; padding: 10px; background-color: #333; color: white; position: fixed; width: 100%; bottom: 0; }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar">
    <div class="container-fluid">
        <a class="navbar-brand">Team Silencer</a>
    </div>
</nav>

<!-- Menu -->
<ul id="menu">
<li><a href="index.php">Home</a></li>
    <li><a href="aboutus.php">About Us</a></li>
    <li><a href="contactus.php">Contact</a></li>
    <li><a href="reservation.php">Reservation</a></li>
</ul>

<!-- Reservation Form -->
<?php
require_once 'admin/connect.php'; // Ensure this file is correct

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['add_guest'])) {
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $contactno = $_POST['contactno'];
    $checkin = $_POST['date'];
    $room_id = $_POST['room_id'];

    // Check if check-in date is in the past
    if ($checkin < date("Y-m-d")) {
        echo "<script>alert('Check-in date cannot be in the past.'); window.history.back();</script>";
        exit;
    }

    // Insert Guest Information
    $query = $conn->query("INSERT INTO `guest` (firstname, middlename, lastname, address, contactno) 
                  VALUES('$firstname', '$middlename', '$lastname', '$address', '$contactno')")
        or die("Error: " . $conn->error);

    $guest_id = $conn->insert_id;

    // Check if room is available
    $room_check = $conn->query("SELECT * FROM `transaction` WHERE `checkin` = '$checkin' AND `room_id` = '$room_id' AND `status` = 'Pending'")
        or die("Error: " . $conn->error);

    if ($room_check->num_rows > 0) {
        echo "<script>alert('Room not available on this date.'); window.history.back();</script>";
        exit;
    }

    // Insert reservation
    $conn->query("INSERT INTO `transaction` (guest_id, room_id, status, checkin) 
                  VALUES('$guest_id', '$room_id', 'Pending', '$checkin')")
        or die("Error: " . $conn->error);

    // Redirect to reply_reserve.php with guest_id
    header("Location: reply_reserve.php?guest_id=$guest_id");
    exit;
}
?>

<!-- Reservation Form -->
<div class="container">
    <h2 class="text-center">Confirm Reservation</h2>
    <div class="reservation-box">
        <form method="POST">
            <input type="hidden" name="room_id" value="<?php echo $_GET['room_id']; ?>">

            <div class="form-group">
                <label>First Name</label>
                <input type="text" class="form-control" name="firstname" required>
            </div>
            <div class="form-group">
                <label>Middle Name</label>
                <input type="text" class="form-control" name="middlename">
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" class="form-control" name="lastname" required>
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" name="address" required>
            </div>
            <div class="form-group">
                <label>Contact No</label>
                <input type="text" class="form-control" name="contactno" required>
            </div>
            <div class="form-group">
                <label>Check-in Date</label>
                <input type="date" class="form-control" name="date" required>
            </div>
            <button type="submit" class="btn btn-success btn-block" name="add_guest">Reserve Now</button>
        </form>
    </div>
</div>

<!-- Footer -->
<footer>Team Silencer Hotel Reservation &copy; 2025 DIU</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>
</html>