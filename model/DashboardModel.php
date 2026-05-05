<?php 

function findTotalCustomers($conn){

	$result = $conn->query("SELECT COUNT(id) AS customer_count FROM customers");

	if($result){
		$row = $result->fetch_assoc();
		if ($row) {
			return $row['customer_count'];
		} else {
			return 0;
		}
	}

	return 0;
}

function findTotalItems($conn){

	$result = $conn->query("SELECT COUNT(item_code) AS total_items FROM items");

	if($result){
		$row = $result->fetch_assoc(){
			if ($row) {
				return $row['total_items'];
			} else {
				return 0;
			}
		}

		return 0;
	}

}

?>
