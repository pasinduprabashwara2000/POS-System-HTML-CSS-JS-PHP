<?php

header("Content-Type: application/json");

include '../db/DBConnection.php';
include '../model/CustomerModel.php';

$action = $_POST['action'] ?? "";

//------------------------CREATE-------------------------//
if($action ===  "add"){
    $result = saveCustomer(
        $_POST['id'],
        $_POST['full_name'],
        $_POST['address'],
        $_POST['contact_no'],
        $conn
    );
    echo json_encode(["status" => $result]);
}

//--------------------UPDATE-----------------------------//
if ($action === "update"){
    $result = updateCustomer(
        $_POST['id'],
        $_POST['full_name'],
        $_POST['address'],
        $_POST['contact_no'],
        $conn
    );
    echo json_encode(["status" => $result]);
}

//--------------------DELETE-----------------------------//
if ($action === "delete"){
    $result = deleteCustomer($_POST['id'], $conn);
    echo json_encode(["status" => $result]);
}

//--------------------READ ALL---------------------------//
if ($action === "getAll"){
    $data = getAllCustomers($conn);
    echo json_encode($data);
}

?>
