<?php 

header("Content-Type: application/json");

include "../db/DBConnection.php";
include "../model/DashboardModel.php";

$action = $_POST["action"] ?? "";

if($action === "getTotal") {
	$customer_count = findTotalCustomers($conn);
	echo json_encode(["status" => true, "customer_count" => $customer_count]);
}

?>
