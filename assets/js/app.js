const pages = {
    dashboard: "view/dashboard.php",
    customers: "view/customers.php",
    items: "view/items.php",
    suppliers: "view/suppliers.php",
    expenses : "view/expenses.php",
    orders: "view/orders.php"
};

$(document).on("click", ".navigation-menu a", function(e) {
    e.preventDefault();
    let page = $(this).data("page");

    $("#content-area").load(pages[page], function() {
        if (page === "customers") {
            loadCustomers();
        }

        if (page === "dashboard") {
            loadDashboard();
        }

        if (page === "items") {
            loadItems();
        }

        if (page === "suppliers") {
            loadSuppliers();
        }

        if (page === "expenses") {
            
        }
    });
});
