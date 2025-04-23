<?php
require_once 'connect.php';

if (isset($_GET['transaction_id'])) {
    $transaction_id = $_GET['transaction_id'];
    
    // Prevent SQL Injection
    $transaction_id = $conn->real_escape_string($transaction_id);

    // Get Current Time (Adding 8 Hours)
    $time = date("H:i:s", strtotime("+8 HOURS"));

    // Update Transaction Status
    $query = $conn->query("UPDATE `transaction` SET `checkout_time` = '$time', `status` = 'Check Out' WHERE `transaction_id` = '$transaction_id'");

    if ($query) {
        // Redirect after success
        header("location: checkout.php");
        exit();
    } else {
        die("Error: " . $conn->error);
    }
} else {
    echo "<script>alert('Invalid request!'); window.history.back();</script>";
    exit();
}
?>
