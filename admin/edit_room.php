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
    <link rel="stylesheet" href="../css/style.css" />
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">Hotel Online Reservation</a>
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
    </nav>
    <div class="container mt-4">
        <ul class="nav nav-pills mb-3">
            <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="account.php">Accounts</a></li>
            <li class="nav-item"><a class="nav-link" href="reserve.php">Reservation</a></li>
            <li class="nav-item"><a class="nav-link active" href="room.php">Room</a></li>
        </ul>
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">Transaction / Room / Edit Room</div>
            <div class="card-body">
                <?php
                    $query = $conn->query("SELECT * FROM `room` WHERE `room_id` = '$_REQUEST[room_id]'") or die(mysqli_error());
                    $fetch = $query->fetch_array();
                ?>
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Room Type</label>
                        <select class="form-select" name="room_type" required>
                            <option value="" disabled>Select a Room Type</option>
                            <option value="Standard" <?php if($fetch['room_type'] == "Standard") echo "selected"; ?>>Standard</option>
                            <option value="Superior" <?php if($fetch['room_type'] == "Superior") echo "selected"; ?>>Superior</option>
                            <option value="Super Deluxe" <?php if($fetch['room_type'] == "Super Deluxe") echo "selected"; ?>>Super Deluxe</option>
                            <option value="Jr. Suite" <?php if($fetch['room_type'] == "Jr. Suite") echo "selected"; ?>>Jr. Suite</option>
                            <option value="Executive Suite" <?php if($fetch['room_type'] == "Executive Suite") echo "selected"; ?>>Executive Suite</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="number" class="form-control" name="price" value="<?php echo $fetch['price']; ?>" required min="0" max="999999999">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Photo</label>
                        <div class="border rounded d-flex justify-content-center align-items-center" id="preview" style="width: 150px; height: 150px;">
                            <img src="../photo/<?php echo $fetch['photo']; ?>" id="imagePreview" class="img-fluid" style="max-height: 100%;">
                        </div>
                        <input type="file" class="form-control mt-2" id="photo" name="photo" required>
                    </div>
                    <button type="submit" name="edit_room" class="btn btn-warning w-100">Save Changes</button>
                </form>
                <?php require_once 'edit_query_room.php'; ?>
            </div>
        </div>
    </div>
    <footer class="text-center py-3 mt-4 bg-light">
    Team Silencer Hotel Reservation &copy; 2025 DIU
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById("photo").addEventListener("change", function(event) {
            const reader = new FileReader();
            reader.onload = function() {
                document.getElementById("imagePreview").src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        });
    </script>
</body>
</html>