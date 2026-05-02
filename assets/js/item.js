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

// SAVE ITEM
$(document).on("submit", "#itemForm", function(e) {
    e.preventDefault();
    $.ajax({
        url: "controller/ItemController.php",
        type: "POST",
        dataType: "json",
        data: $(this).serialize() + "&action=add",
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

// TABLE ROW CLICK — populate form
$(document).on("click", ".item-row", function() {
    let row = $(this).children("td");
    $("#item_code").val(row.eq(0).text());
    $("#item_name").val(row.eq(1).text());
    $("#unit_price").val(row.eq(2).text());
    $("#qty").val(row.eq(3).text());
});

// RESET ITEM FORM
$(document).on("click", "#item_reset_btn", function() {
    $("#itemForm")[0].reset();
});
