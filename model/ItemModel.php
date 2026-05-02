<?php

// ------------------------ CREATE ------------------------ //
function saveItem($item_code, $item_name, $unit_price, $qty, $conn) {
    $stmt = $conn->prepare("
        INSERT INTO items (item_code, item_name, unit_price, qty)
        VALUES (?, ?, ?, ?)
    ");
    $stmt->bind_param("ssdi", $item_code, $item_name, $unit_price, $qty);
    return $stmt->execute();
}

// ------------------------ READ ALL ------------------------ //
function getAllItems($conn) {
    $sql = "SELECT * FROM items";
    $result = $conn->query($sql);
    $items = [];
    while ($row = $result->fetch_assoc()) {
        $items[] = $row;
    }
    return $items;
}

// ------------------------ UPDATE ------------------------ //
function updateItem($item_code, $item_name, $unit_price, $qty, $conn) {
    $stmt = $conn->prepare("
        UPDATE items SET item_name = ?, unit_price = ?, qty = ? WHERE item_code = ?
    ");
    $stmt->bind_param("sdis", $item_name, $unit_price, $qty, $item_code);
    return $stmt->execute();
}

// ------------------------ DELETE ------------------------ //
function deleteItem($item_code, $conn) {
    $stmt = $conn->prepare("DELETE FROM items WHERE item_code = ?");
    $stmt->bind_param("s", $item_code);
    return $stmt->execute();
}
?>
