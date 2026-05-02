<div class="container-top">
    <h3>Manage Customers</h3>
    <form id="customerForm">
        <div class="row mb-3">
            <div class="col-md-4">
                <label>Id</label>
                <input type="text" id="id" name="id" class="form-control">
            </div>
            <div class="col-md-4">
                <label>Full Name</label>
                <input type="text" id="full_name" name="full_name" class="form-control">
            </div>
            <div class="col-md-4">
                <label>Address</label>
                <input type="text" id="address" name="address" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-4">
                <label>Contact No</label>
                <input type="text" id="contact_no" name="contact_no" class="form-control">
            </div>
        </div>
        <div class="btn-section">
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-success">Update</button>
            <button type="button" class="btn btn-danger">Delete</button>
            <button type="button" id="customer_reset_btn" class="btn btn-secondary">Reset</button>
        </div>
    </form>
</div>
<div class="container-bottom">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Address</th>
                <th>Contact</th>
            </tr>
        </thead>
        <tbody id="customers_tbody"></tbody>
    </table>
</div>
