<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Team Silencer</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        body { font-family: Arial, sans-serif; }
        .navbar, footer { background: #333; color: white; text-align: center; padding: 10px; }
        .navbar a, #menu a { color: white; text-decoration: none; font-weight: bold; }
        #menu { list-style: none; text-align: center; padding: 10px; background: #444; }
        #menu li { display: inline; margin: 0 15px; }
        .carousel-inner img { width: 100%; max-height: 500px; object-fit: cover; }
        footer { position: fixed; width: 100%; bottom: 0; }
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

<!-- Slideshow -->
<div id="carouselExample" class="carousel slide" data-ride="carousel" data-interval="2000">
    <div class="carousel-inner">
        <div class="item active"><img src="images/bg/unnamed.webp" alt="Slide 1"></div>
        <div class="item"><img src="images/bg/b2.jpg" alt="Slide 2"></div>
        <div class="item"><img src="images/bg/d.jpg" alt="Slide 3"></div>
    </div>
    <a class="left carousel-control" href="#carouselExample" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="right carousel-control" href="#carouselExample" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
</div>

<footer>Team Silencer Hotel Reservation &copy; 2025 DIU</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>
</html>
