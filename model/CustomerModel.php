<?php

//-----------------------CREATE-----------------------//
function saveCustomer($id, $full_name, $address, $contact_no, $conn){
    $stmt = $conn->prepare("
        INSERT INTO customers (id, full_name, address, contact_no)
        VALUES (?, ?, ?, ?)
    ");
    $stmt->bind_param("isss", $id, $full_name, $address, $contact_no);
    return $stmt->execute();
}

//-----------------------UPDATE----------------------//
function updateCustomer($id, $full_name, $address, $contact_no, $conn){
    $stmt = $conn->prepare("
        UPDATE customers SET full_name = ?, address = ?, contact_no = ? WHERE id = ?
    ");
    $stmt->bind_param("sssi", $full_name, $address, $contact_no, $id);
    return $stmt->execute();
}

//---------------------DELETE--------------------//
function deleteCustomer($id,$conn){
    $stmt = $conn->prepare("DELETE FROM customers WHERE id = ?");
    $stmt->bind_param("i",$id);
    return $stmt->execute();
}

//--------------------READ ALL------------------//
function getAllCustomers($conn) {
    $sql = "SELECT * FROM customers";
    $result = $conn->query($sql);
    $customers = [];

    while ($row = $result->fetch_assoc()) {
        $customers[] = $row;
    }

    return $customers;
}

?>
