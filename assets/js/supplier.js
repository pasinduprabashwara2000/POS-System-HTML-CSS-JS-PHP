// SAVE SUPPLIER
$(document).on("click", "#supplier_save_btn", function(e) {
    e.preventDefault();

    let sup_id = $("#sup_id").val();
    let supplier_name = $("#supplier_name").val();
    let email = $("#email").val();
    let contact_no = $("#contact_no").val();

    if (!sup_id){
        Swal.fire("Error", "Invalid ID", "error");
        return;
    }

    if(!supplier_name) {
        Swal.fire("Error", "Invalid Supplier Name", "error");
        return;
    }

    if(!email){
        Swal.fire("Error", "Invalid Email", "error");
        return;
    }

    if(!contact_no){
        Swal.fire("Error", "Invalid Contact Number", "error");
        return;
    }

    $.ajax({
        url: "controller/SupplierController.php",
        type: "POST",
        dataType: "json",
        data: $("#supplierForm").serialize() + "&action=add",
        success: function(res) {
            if (res.status) {
                Swal.fire("Success", "Supplier Saved Successfully", "success");
                $("#supplierForm")[0].reset();
                loadSuppliers();
            } else {
                Swal.fire("Error", "Supplier Saved Failed", "error");
            }
        },
        error: function() {
            Swal.fire("Error", "Supplier Saved Failed", "error");
        }
    });
});

//UPDATE SUPPLIER
$(document).on('click','#supplier_update_btn', function () {
   let sup_id = $('#sup_id').val();
   if(!sup_id){
       Swal.fire("Error", "Please Select Supplier to Update", "error");
       return;
   }
   $.ajax({
       url: "controller/SupplierController.php",
       type: "POST",
       dataType: "json",
       data: {
           action: "update",
           sup_id: sup_id,
           supplier_name: $("#supplier_name").val(),
           email: $("#email").val(),
           contact_no: $("#contact_no").val()
       },
       success: function (res) {
           if(res.status) {
               Swal.fire("Updated", "Supplier Updated Successfully", "success");
               $("#supplierForm")[0].reset();
               loadSuppliers();
           } else {
               Swal.fire("Error", "Supplier Updated Failed", "error");
           }
       },
       error: function () {
           Swal.fire("Error", "Supplier Updated Failed", "error");
       }
   });
});

//DELETE SUPPLIER
$(document).on('click','#supplier_delete_btn', function(){
    let sup_id = $('#sup_id').val();

    if(!sup_id){
        Swal.fire("Error", "Please select supplier", "error");
        return;
    }

    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url : "controller/SupplierController.php",
                type : "POST",
                dataType : "json",
                data : {
                    action : "delete",
                    sup_id : sup_id
                },

                success: function(res){
                    if(res.status){
                        Swal.fire("Success", "Supplier Delete Successfully", "success");
                        $("#supplierForm")[0].reset();
                        loadSuppliers();
                    } else {
                        Swal.fire("error", "Supplier Delete Failed", "error");    
                    }
                },

                error : function(){
                        Swal.fire("error", "Supplier Delete Failed", "error"); 
                }
            
            });
        }
    });
});

//TABLE ROW CLICK - populate form
$(document).on("click",".supplier-row", function (){
    let row = $(this).children("td");
    $("#sup_id").val(row.eq(0).text());
    $("#supplier_name").val(row.eq(1).text());
    $("#email").val(row.eq(2).text());
    $("#contact_no").val(row.eq(3).text())
});

// LOAD ALL SUPPLIERS
function loadSuppliers() {
    $.ajax({
        url: "controller/SupplierController.php",
        type: "POST",
        dataType: "json",
        data: {
            action: "getAll"
        },
        success: function (data) {
            let rows = "";

            data.forEach(s => {
                rows += `
                    <tr class="supplier-row" style="cursor:pointer;">
                        <td>${s.sup_id}</td>
                        <td>${s.supplier_name}</td>
                        <td>${s.email}</td>
                        <td>${s.contact_no}</td>
                    </tr>`;
            });

            $("#supplier_tbody").html(rows);
        },
        error: function () {
            Swal.fire("Error", "Failed to load suppliers", "error");
        }
    });
}

//RESET FORM
$(document).on("click","#supplier_reset_btn", function(){
    $("#supplierForm")[0].reset();
});

    
