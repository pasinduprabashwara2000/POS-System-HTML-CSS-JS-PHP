<div class="container-top">
    <h3>Manage Suppliers</h3>
    <form id="supplierForm">
        <div class="row mb-3">
            <div class="col-md-4">
                <label>Supplier ID : </label>
                <input type="text" id="sup_id" name="sup_id" class="form-control">
            </div>
            <div class="col-md-4">
                <label>Supplier Name : </label>
                <input type="text" id="supplier_name" name="supplier_name" class="form-control">
            </div>
            <div class="col-md-4">
                <label>Email : </label>
                <input type="text" id="email" name="email" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-4">
                <label>Contact No : </label>
                <input type="text" id="contact_no" name="contact_no" class="form-control">
            </div>
        </div>
        <div class="btn-section">
            <button type="button" id="supplier_save_btn"class="btn btn-primary">Save</button>
            <button type="button" id="supplier_update_btn" class="btn btn-success">Update</button>
            <button type="button" id="supplier_delete_btn" class="btn btn-danger">Delete</button>
            <button type="button" id="supplier_reset_btn" class="btn btn-secondary">Reset</button>
        </div>
    </form>
</div>
<div class="container-bottom">
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>Supplier ID</th>
            <th>Supplier Name</th>
            <th>Email</th>
            <th>Contact No</th>
        </tr>
        </thead>
        <tbody id="supplier_tbody"></tbody>
    </table>
</div>
