// SAVE CUSTOMER
$(document).on("submit", "#customer_save_btn", function(e) {
    e.preventDefault();
    $.ajax({
        url: "controller/CustomerController.php",
        type: "POST",
        dataType: "json",
        data: $(this).serialize() + "&action=add",
        success: function(res) {
            if (res.status) {
                Swal.fire("Success", "Customer Saved", "success");
                $("#customerForm")[0].reset();
                loadCustomers();
            } else {
                Swal.fire("Error", "Failed to save customer", "error");
            }
        },
        error: function() {
            Swal.fire("Error", "Failed to save customer", "error");
        }
    });
});

// UPDATE CUSTOMER
$(document).on("click", "#customer_update_btn", function() {
    let id = $("#id").val();
    if (!id) {
        Swal.fire("Warning", "Please select a customer first", "warning");
        return;
    }
    $.ajax({
        url: "controller/CustomerController.php",
        type: "POST",
        dataType: "json",
        data: {
            action: "update",
            id: id,
            full_name: $("#full_name").val(),
            address: $("#address").val(),
            contact_no: $("#contact_no").val()
        },
        success: function(res) {
            if (res.status) {
                Swal.fire("Updated", "Customer Updated", "success");
                $("#customerForm")[0].reset();
                loadCustomers();
            } else {
                Swal.fire("Error", "Failed to update customer", "error");
            }
        },
        error: function() {
            Swal.fire("Error", "Failed to update customer", "error");
        }
    });
});

// DELETE CUSTOMER
$(document).on("click", "#customer_delete_btn", function() {
    let id = $("#id").val();
    if (!id) {
        Swal.fire("Warning", "Please select a customer first", "warning");
        return;
    }
    Swal.fire({
        title: "Are you sure?",
        text: "This customer will be deleted!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "controller/CustomerController.php",
                type: "POST",
                dataType: "json",
                data: {
                    action: "delete",
                    id: id
                },
                success: function(res) {
                    if (res.status) {
                        Swal.fire("Deleted", "Customer Deleted", "success");
                        $("#customerForm")[0].reset();
                        loadCustomers();
                    } else {
                        Swal.fire("Error", "Failed to delete customer", "error");
                    }
                },
                error: function() {
                    Swal.fire("Error", "Failed to delete customer", "error");
                }
            });
        }
    });
});

// TABLE ROW CLICK — populate form
$(document).on("click", ".customer-row", function() {
    let row = $(this).children("td");
    $("#id").val(row.eq(0).text());
    $("#full_name").val(row.eq(1).text());
    $("#address").val(row.eq(2).text());
    $("#contact_no").val(row.eq(3).text());
});

// LOAD ALL CUSTOMERS
function loadCustomers() {
    $.ajax({
        url: "controller/CustomerController.php",
        type: "POST",
        dataType: "json",
        data: { action: "getAll" },
        success: function(data) {
            let rows = "";
            data.forEach(c => {
                rows += `
                    <tr class="customer-row" style="cursor:pointer;">
                        <td>${c.id}</td>
                        <td>${c.full_name}</td>
                        <td>${c.address}</td>
                        <td>${c.contact_no}</td>
                    </tr>`;
            });
            $("#customers_tbody").html(rows);
        },
        error: function() {
            Swal.fire("Error", "Failed to load customers", "error");
        }
    });
}

// RESET CUSTOMER FORM
$(document).on("click", "#customer_reset_btn", function() {
    $("#customerForm")[0].reset();
});
