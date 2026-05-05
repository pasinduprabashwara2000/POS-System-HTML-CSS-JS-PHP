<?php

session_start();
header("Content-Type: application/json");

require '../db/DBConnection.php';
require '../model/LoginModel.php';

function logout(){
    session_unset();
    session_destroy();
}

$action = $_POST['action'] ?? '';

if ($action === 'login') {

    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($password)) {
        echo json_encode([
            "status" => false,
            "message" => "Username and password required"
        ]);
        exit;
    }

    $user = login($username, $password, $conn);

    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        echo json_encode([
            "status" => true,
            "message" => "Login successful"
        ]);
    } else {
        echo json_encode([
            "status" => false,
            "message" => "Invalid username or password"
        ]);
    }

} elseif ($action === 'logout') {

    logout();

    echo json_encode([
        "status" => true,
        "message" => "Logged out"
    ]);

} else {

    echo json_encode([
        "status" => false,
        "message" => "Invalid action"
    ]);
}

?>
