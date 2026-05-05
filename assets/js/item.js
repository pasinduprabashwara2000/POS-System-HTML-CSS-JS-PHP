// SAVE ITEM
$(document).on("submit", "#itemForm", function(e) {
    e.preventDefault();
    $.ajax({
        url: "controller/ItemController.php",
        type: "POST",
        dataType: "json",
        data: $("#itemForm").serialize() + "&action=add",
        success: function(res) {
            if (res.status) {
                Swal.fire("Success", "Item Saved", "success");
                $("#itemForm")[0].reset();
                loadItems();
            } else {
                Swal.fire("Error", "Failed to save item", "error");
            }
        },
        error: function() {
            Swal.fire("Error", "Failed to save item", "error");
        }
    });
});

//UPDATE ITEM
$(document).on("click", "#item_update_btn", function () {
    let item_code = $("#item_code").val();
    if(!item_code) {
        Swal.fire("Warning", "Please select a item first", "warning");
        return;
    }

    $.ajax({
        url: "controller/ItemController.php",
        type: "POST",
        dataType: "json",
        data: {
            action: "update",
            item_code: item_code,
            item_name: $("#item_name").val(),
            unit_price : $("#unit_price").val(),
            qty : $("#qty").val()
        },
        success: function (res){
            if (res.status) {
                Swal.fire("Updated", "Item Updated Successfully", "success");
                $("#itemForm")[0].reset();
                loadItems();
            } else {
                Swal.fire("Error", "Item Updated Failed", "error");
            }
        },
        error: function () {
            Swal.fire("Error", "Failed to update Item", "error");
        }
    })
})

//DELETE ITEM
$(document).on("click", "#item_delete_btn", function () {
    let item_code = $("#item_code").val();
    if(!item_code){
        Swal.fire("Warning", "Please select a item first", "warning");
        return;
    }
    Swal.fire({
        title: "Are you sure?",
        text: "This item will be deleted !",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url : "controller/ItemController.php",
                type : "POST",
                dataType : "json",
                data : { action : "delete",
                item_code: item_code
                },
                success: function (res){
                    if(res.status) {
                        Swal.fire("Deleted", "Item Deleted", "success");
                        $("#itemForm")[0].reset();
                        loadItems();
                    } else {
                        Swal.fire("Error", "Failed to Delete Item", "error");
                    }
                },
                error: function(){
                    Swal.fire("Error", "Failed to Delete Item", "error");
            }
            });
        }
    });
})

// TABLE ROW CLICK — populate form
$(document).on("click", ".item-row", function() {
    let row = $(this).children("td");
    $("#item_code").val(row.eq(0).text());
    $("#item_name").val(row.eq(1).text());
    $("#unit_price").val(row.eq(2).text());
    $("#qty").val(row.eq(3).text());
});

// LOAD ALL ITEMS
function loadItems() {
    $.ajax({
        url: "controller/ItemController.php",
        type: "POST",
        dataType: "json",
        data: { action: "getAll" },
        success: function(data) {
            let rows = "";
            data.forEach(item => {
                rows += `
                    <tr class="item-row" style="cursor:pointer;">
                        <td>${item.item_code}</td>
                        <td>${item.item_name}</td>
                        <td>${item.unit_price}</td>
                        <td>${item.qty}</td>
                    </tr>`;
            });
            $("#item_tbody").html(rows);
        },
        error: function() {
            Swal.fire("Error", "Failed to load items", "error");
        }
    });
}

// RESET ITEM FORM
$(document).on("click", "#item_reset_btn", function() {
    $("#itemForm")[0].reset();
});
