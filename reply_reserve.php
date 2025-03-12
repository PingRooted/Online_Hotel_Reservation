<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanks Team Silencer</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        body { font-family: Arial, sans-serif; background: #f8f9fa; }
        nav.navbar { background-color: #333; color: white; padding: 10px; text-align: center; }
        nav a { color: white; font-weight: bold; text-decoration: none; }
        ul#menu { list-style: none; text-align: center; background: #444; padding: 10px; }
        ul#menu li { display: inline; margin: 0 15px; }
        ul#menu a { color: white; text-decoration: none; }
        .container { margin-top: 50px; padding-bottom: 50px; }
        .well {
            background: white;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0,0,0,0.1);
            padding: 20px;
            text-align: center;
        }
        .btn-success { background: #007b5e; border: none; }
        .btn-success:hover { background: #005a4c; }
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

<!-- Message Section -->
<?php
require_once 'admin/connect.php';

if (!isset($_GET['guest_id'])) {
    echo "<script>alert('Invalid Access!'); window.location.href='reservation.php';</script>";
    exit;
}

$guest_id = $_GET['guest_id'];
$query = $conn->query("SELECT * FROM `guest` WHERE `guest_id` = '$guest_id'") or die(mysqli_error($conn));
$guest = $query->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Confirmed - Team Silencer</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2 class="text-center text-success">🎉 Reservation Successful! 🎉</h2>
    <p class="text-center">Dear <strong><?php echo $guest['firstname'] . " " . $guest['lastname']; ?></strong>,</p>
    <p class="text-center">Thank you for choosing <strong>Team Silencer</strong> for your stay! 🌟</p>
    <p class="text-center">We are thrilled to confirm your reservation and look forward to welcoming you. Your comfort and satisfaction are our top priorities.</p>
    <p class="text-center">Our team will contact you shortly to ensure everything is prepared for your arrival. If you have any special requests or need further assistance, feel free to reach out to us.</p>
    <p class="text-center">Once again, thank you for trusting us. We can't wait to make your stay memorable! 😊</p>
    <a href="index.php" class="btn btn-primary btn-block">Back to Home</a>
</div>

</body>
</html>

<!-- Footer -->
<footer>Team Silencer Hotel Reservation &copy; 2025 DIU</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>
</html>