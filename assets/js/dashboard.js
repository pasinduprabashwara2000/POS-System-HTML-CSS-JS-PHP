//Load All Customer Count
function loadDashboard() {
	$.ajax({
		url: "controller/DashboardController.php",
		type: "POST",
		dataType: "json",
		data: {
			action: "getTotal"
		},
		success: function(res) {
			if (res.status) {
				$("#total_customers").text(res.customer_count);
			} else {
				$("#total_customers").text("0");
			}
		},
		error: function() {
			$("#total_customers").text("0");
		}
	});
}
