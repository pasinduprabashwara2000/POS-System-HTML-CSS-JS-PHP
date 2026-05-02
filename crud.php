<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "db/DBConnection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>POS System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

<!-- ================= LEFT MENU ================= -->
<div class="container-left">
    <h3 class="container-left-title">POS Manage</h3>

    <ol class="navigation-menu">
        <li><a href="#" data-page="customers">Manage Customers</a></li>
        <li><a href="#" data-page="items">Manage Items</a></li>
        <li><a href="#" data-page="orders">Order Management</a></li>
    </ol>

    <button class="log-out" onclick="logOut()">Log Out</button>
</div>

<!-- ================= RIGHT CONTENT ================= -->
<div class="container-right">
    <div id="content-area">
        <h2>Welcome to POS System</h2>
        <p>Select a menu item to get started.</p>
    </div>
</div>

<!-- ================= SCRIPTS ================= -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="assets/js/app.js"></script>
<script src="assets/js/customer.js"></script>
<script src="assets/js/item.js"></script>

<script>
    // ================= LOGOUT =================
    window.logOut = function() {
        Swal.fire({
            title: "Are you sure?",
            text: "You will be logged out!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, logout"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "index.php";
            }
        });
    };
</script>

</body>
</html>
