<!DOCTYPE html>
<?php require_once "connect.php"; ?>
<html lang="en">
<head>
    <title>Hotel Online Reservation - Admin Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="d-flex align-items-center justify-content-center vh-100">

    <div class="container text-center">
        <h3>Hotel Online Reservation</h3>
        <div class="card shadow-sm mx-auto" style="max-width: 400px;">
            <div class="card-body">
                <h4 class="mb-3">Admin Login</h4>
                <form method="POST">
                    <div class="mb-3">
                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <button name="login" class="btn btn-primary w-100">Login</button>
                </form>
                <?php require_once 'login.php'; ?>
            </div>
        </div>
        <p class="mt-3 text-muted">Team Silencer Hotel Reservation &copy; 2025 DIU</p>
    </div>

</body>
</html>
