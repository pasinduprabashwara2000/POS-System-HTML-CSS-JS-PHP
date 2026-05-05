<?php

header("Content-Type: application/json");

include '../db/DBConnection.php';
include '../model/SupplierModel.php';

$action = $_POST['action'] ?? "";

//---------------------------CREATE------------------------------//
if ($action === "add") {
    $result = saveSupplier(
        $_POST['sup_id'],
        $_POST['supplier_name'],
        $_POST['email'],
        $_POST['contact_no'],
        $conn
    );
        echo json_encode(["status" => $result]);
}

//--------------------------UPDATE------------------------------//
if ($action === "update") {
    $result = updateSupplier(
        $_POST['sup_id'],
        $_POST['supplier_name'],
        $_POST['email'],
        $_POST['contact_no'],
        $conn    
    );
        echo json_encode(["status" => $result]);
}

//-------------------------DELETE------------------------------//
if($action === "delete") {
    $result = deleteSupplier(
        $_POST['sup_id'],
        $conn
    );

    echo json_encode(["status" => $result]);
}

//-------------------------READ ALL---------------------------//
if($action === "getAll") {
    $data = getAllSuppliers($conn);
    echo json_encode($data);
}

?>
