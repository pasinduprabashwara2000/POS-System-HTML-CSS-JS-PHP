<div class="container-top">
    <h3>Manage Items</h3>
    <form id="itemForm">
        <div class="row mb-3">
            <div class="col-md-4">
                <label>Item Code</label>
                <input type="text" id="item_code" name="item_code" class="form-control">
            </div>
            <div class="col-md-4">
                <label>Item Name</label>
                <input type="text" id="item_name" name="item_name" class="form-control">
            </div>
            <div class="col-md-4">
                <label>Unit Price</label>
                <input type="text" id="unit_price" name="unit_price" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-4">
                <label>Qty</label>
                <input type="text" id="qty" name="qty" class="form-control">
            </div>
        </div>
        <div class="btn-section">
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="button" id="item_reset_btn" class="btn btn-secondary">Reset</button>
        </div>
    </form>
</div>
<div class="container-bottom">
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>Code</th>
            <th>Name</th>
            <th>Price</th>
            <th>Qty</th>
        </tr>
        </thead>
        <tbody id="item_tbody"></tbody>
    </table>
</div>