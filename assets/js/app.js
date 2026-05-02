const pages = {
    customers: "view/customers.php",
    items: "view/items.php",
    orders: "view/orders.php"
};

$(document).on("click", ".navigation-menu a", function(e) {
    e.preventDefault();
    let page = $(this).data("page");

    $("#content-area").load(pages[page], function() {
        if (page === "customers") {
            loadCustomers();
        }
        if (page === "items") {
            loadItems();
        }
    });
});
