<?php

//-----------------------CREATE--------------------------------//
function saveSupplier($sup_id, $supplier_name, $email, $contact_no, $conn){
    $stmt = $conn->prepare("
        INSERT INTO suppliers (sup_id, supplier_name, email, contact_no)
        VALUES (?, ?, ?, ?)
    ");
    $stmt->bind_param("issi", $sup_id, $supplier_name, $email, $contact_no);
    return $stmt->execute();
}

//------------------------UPDATE---------------------------------//
function updateSupplier($sup_id, $supplier_name, $email, $contact_no, $conn){
    $stmt = $conn->prepare("
        UPDATE suppliers SET supplier_name = ?, email = ?, contact_no = ? WHERE sup_id = ?
    ");
    $stmt->bind_param("ssii", $supplier_name, $email, $contact_no, $sup_id);
    return $stmt->execute();
}

//--------------------------DELETE------------------------------//
function deleteSupplier($sup_id, $conn){
    $stmt = $conn->prepare("DELETE FROM suppliers WHERE sup_id = ?");
    $stmt->bind_param("i", $sup_id);
    return $stmt->execute();
}

//---------------------------READ ALL----------------------------//
function getAllSuppliers($conn){
    $result = $conn->query("SELECT * FROM suppliers");
    $suppliers = [];

    while ($row = $result->fetch_assoc()){
        $suppliers[] = $row;
    }

    return $suppliers;
}

?>
