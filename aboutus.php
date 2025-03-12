<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Team Silencer</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body { font-family: 'Arial', sans-serif; background: #f8f9fa; }
        .navbar, footer { background: #333; color: white; text-align: center; padding: 10px; }
        .navbar a, #menu a { color: white; font-weight: bold; text-decoration: none; }
        #menu { list-style: none; text-align: center; padding: 10px; background: #444; margin: 0; }
        #menu li { display: inline; margin: 0 15px; }
        .container { margin-top: 30px; padding-bottom: 100px; }
        .about-section { text-align: center; padding: 60px 20px; background: linear-gradient(135deg, #007b5e, #005a4c); color: white; border-radius: 10px; box-shadow: 0px 8px 16px rgba(0,0,0,0.2); }
        .about-section h2 { font-size: 36px; margin-bottom: 20px; }
        .about-section p { font-size: 18px; line-height: 1.8; max-width: 800px; margin: 0 auto; }
        .about-section img { max-width: 100%; border-radius: 10px; margin-top: 30px; box-shadow: 0px 4px 8px rgba(0,0,0,0.2); }
        .room { background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0px 4px 8px rgba(0,0,0,0.1); text-align: center; margin-bottom: 20px; transition: transform 0.3s, box-shadow 0.3s; }
        .room:hover { transform: translateY(-10px); box-shadow: 0px 8px 16px rgba(0,0,0,0.2); }
        .room img { width: 100%; border-radius: 10px; margin-bottom: 15px; }
        .room h4 { color: #007b5e; margin-top: 15px; font-size: 24px; }
        .room label { font-size: 18px; font-weight: bold; color: #dc3545; }
        .amenities { background: #fff; padding: 40px; border-radius: 10px; box-shadow: 0px 4px 8px rgba(0,0,0,0.1); margin-top: 40px; }
        .amenities h2 { text-align: center; margin-bottom: 30px; font-size: 36px; color: #007b5e; }
        .amenities ul { list-style: none; padding: 0; display: flex; flex-wrap: wrap; justify-content: center; }
        .amenities li { font-size: 18px; margin: 10px 20px; padding-left: 30px; position: relative; width: 45%; }
        .amenities li::before { content: "✔"; position: absolute; left: 0; color: #007b5e; font-weight: bold; font-size: 20px; }
        footer { position: fixed; width: 100%; bottom: 0; padding: 10px; background: #333; color: white; text-align: center; }
        .section-title { text-align: center; font-size: 36px; color: #007b5e; margin-bottom: 40px; }
        .icon { font-size: 40px; color: #007b5e; margin-bottom: 15px; }
    </style>
</head>
<body>

<nav class="navbar">
    <a class="navbar-brand">Team Silencer</a>
</nav>

<ul id="menu">
<li><a href="index.php">Home</a></li>
    <li><a href="aboutus.php">About Us</a></li>
    <li><a href="contactus.php">Contact</a></li>
    <li><a href="reservation.php">Reservation</a></li>
</ul>

<div class="container">
    <!-- About Section -->
    <div class="about-section">
        <h2>About Our Hotel</h2>
        <p>Discover a world of luxury, comfort, and unmatched hospitality at our hotel. Designed to offer a seamless blend of elegance and modernity, we provide our guests with an unforgettable experience. Whether you're here for business or leisure, our dedicated team ensures your stay is nothing short of perfect.</p>
        <img src="images/about.jpg" alt="Hotel Image">
    </div>

    <hr>

    <!-- Rooms and Rates -->
    <h2 class="section-title">Rooms & Rates</h2>
    <div class="row">
        <div class="col-md-4 room">
            <img src="images/1.jpg" alt="Standard Room">
            <h4>Standard Room</h4>
            <label>৳ 6,000</label>
        </div>
        <div class="col-md-4 room">
            <img src="images/2.jpg" alt="Superior Room">
            <h4>Superior Room</h4>
            <label>৳ 7,500</label>
        </div>
        <div class="col-md-4 room">
            <img src="images/3.jpg" alt="Executive Suite">
            <h4>Executive Suite</h4>
            <label>৳ 10,000</label>
        </div>
    </div>

    <hr>

    <!-- Amenities Section -->
    <div class="amenities">
        <h2>Our Amenities</h2>
        <ul>
            <li><i class="icon fas fa-concierge-bell"></i> 24-Hour Room Service</li>
            <li><i class="icon fas fa-wifi"></i> High-Speed Free Wi-Fi</li>
            <li><i class="icon fas fa-spa"></i> Luxury Spa & Wellness Center</li>
            <li><i class="icon fas fa-swimming-pool"></i> Swimming Pool & Gym</li>
            <li><i class="icon fas fa-business-time"></i> Business Conference Rooms</li>
            <li><i class="icon fas fa-utensils"></i> Multi-Cuisine Restaurant & Bar</li>
            <li><i class="icon fas fa-shuttle-van"></i> Airport Pickup & Drop-off</li>
        </ul>
    </div>
</div>

<footer>Team Silencer Hotel Reservation &copy; 2025 DIU</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>
</html>