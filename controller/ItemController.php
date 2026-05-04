<?php

header("Content-Type: application/json");

include '../db/DBConnection.php';
include '../model/ItemModel.php';

$action = $_POST['action'] ?? "";

// ---------------------- CREATE ---------------------- //
if ($action === "add") {
    $result = saveItem(
        $_POST['item_code'],
        $_POST['item_name'],
        $_POST['unit_price'],
        $_POST['qty'],
        $conn
    );
    echo json_encode(["status" => $result]);
}

// ---------------------- UPDATE ---------------------- //
if ($action === "update") {
    $result = updateItem(
        $_POST['item_code'],
        $_POST['item_name'],
        $_POST['unit_price'],
        $_POST['qty'],
        $conn
    );
    echo json_encode(["status" => $result]);
}

// ---------------------- DELETE ---------------------- //
if ($action === "delete") {
    $result = deleteItem($_POST['item_code'], $conn);
    echo json_encode(["status" => $result]);
}

// ---------------------- READ ALL ---------------------- //
if ($action === "getAll") {
    $data = getAllItems($conn);
    echo json_encode($data);
}

?>
