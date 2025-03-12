<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Reservation Team Silencer</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        body { font-family: Arial, sans-serif; background: #f8f9fa; }
        nav.navbar { background-color: #333; color: white; padding: 10px; text-align: center; }
        nav a { color: white; font-weight: bold; text-decoration: none; }
        ul#menu { list-style: none; text-align: center; background: #444; padding: 10px; }
        ul#menu li { display: inline; margin: 0 15px; }
        ul#menu a { color: white; text-decoration: none; }
        .container { margin-top: 20px; padding-bottom: 50px; }
        .room-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0,0,0,0.1);
            overflow: hidden;
            text-align: center;
            padding-bottom: 20px;
            transition: 0.3s;
        }
        .room-card:hover { box-shadow: 0px 6px 12px rgba(0,0,0,0.15); }
        .room-card img { width: 100%; height: 250px; object-fit: cover; }
        .room-card h3 { margin-top: 15px; color: #007b5e; }
        .room-card .price { font-size: 18px; font-weight: bold; color: #dc3545; }
        .room-details { margin-top: 10px; font-size: 14px; color: #555; }
        .btn-reserve {
            display: inline-block;
            background: #007b5e;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            transition: 0.3s;
        }
        .btn-reserve:hover { background: #005a4c; }
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

<?php
require_once 'admin/connect.php';
?>

<div class="container">
    <h2 class="text-center">Make a Reservation</h2>

    <div class="row">
        <?php
            $query = $conn->query("SELECT * FROM `room` ORDER BY `price` ASC") or die(mysqli_error($conn));
            while ($fetch = $query->fetch_array()) {
        ?>
        <div class="col-md-4">
            <div class="room-card">
                <img src="photo/<?php echo $fetch['photo']; ?>" alt="Room Image">
                <h3><?php echo $fetch['room_type']; ?></h3>
                <p class="price">৳ <?php echo number_format($fetch['price'], 2); ?></p>
                
                <!-- Room details with emojis -->
                <div class="room-details">
                    <?php if($fetch['room_type'] == 'Deluxe Room') { ?>
                        🌟 Spacious Deluxe Room with a King-sized bed
                        🏙️ Beautiful city view
                        🛁 Private bath with luxury amenities
                        ☕ Complimentary coffee and tea
                    <?php } elseif($fetch['room_type'] == 'Suite') { ?>
                        🌟 Elegant Suite with a Queen-sized bed
                        🌊 Ocean view from the balcony
                        🛁 Private jacuzzi for relaxation
                        🍽️ Includes breakfast for two
                    <?php } else { ?>
                        🌟 Comfortable Standard Room with Double Bed
                        🏞️ Garden view
                        🖥️ Free Wi-Fi and workspace
                        ☕ Tea and coffee facilities
                    <?php } ?>
                </div>

                <a href="add_reserve.php?room_id=<?php echo $fetch['room_id']; ?>" class="btn-reserve">Reserve Now</a>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<!-- Footer -->
<footer>Team Silencer Hotel Reservation &copy; 2025 DIU</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>
</html>
