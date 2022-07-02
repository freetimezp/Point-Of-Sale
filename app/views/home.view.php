<?php require views_path("includes/header"); ?>

<div class="text-center p-2 shadow">
    <h2><?=APP_NAME;?></h2>
</div>

<div>
    <div class="row">
        <div class="col-9 p-3 main-body" style="min-height: 600px; overflow-y: scroll;">
            <div class="d-flex justify-content-between p-1">
                <div class="text-center" style="width: 100%;">
                    <h4>Items</h4>
                </div>

                <div class="d-flex flex-row">
                    <input oninput="search_item(event)" class="border-warning js-search" type="text" name="search" placeholder="Search" style="max-width: 200px; outline: none;">
                    <span class="input-group-text bg-danger text-white shadow"><i class="fa fa-search"></i></span>
                </div>
            </div>

            <div onclick="add_item_to_cart(event)" class="js-products p-4 d-flex justify-content-center">
                <?php //add content with javascript; ?>

            </div>
        </div>

        <div class="col-3 p-3">
            <h4 class="text-center">Cart <span class="js-item-count badge bg-primary rounded-circle">0</span></h4>

            <div class="table-responsive carts-block">
                <table class="table table-striped table-hover carts-table">
                    <thead>
                        <tr>
                            <th>Image</th><th>Description</th><th>Amount</th><th></th>
                        </tr>
                    </thead>

                    <tbody class="js-cart">
                        <?php //add content with javascript; ?>

                    </tbody>
                </table>
            </div>

            <div class="alert alert-danger carts-total">
                <span>Total: </span><span>$<span class="js-total-amount">0.00</span></span>
            </div>

            <div class="carts-btns">
                <div>
                    <button class="btn btn-success py-3">Checkout</button>
                </div>
                <div>
                    <button class="btn btn-warning">Clear all</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let PRODUCTS = [];
    let CART_ITEMS = [];

    function add_item_to_cart(e) {
        e.preventDefault();
        if(e.target.tagName == "IMG") {
            let id = e.target.getAttribute('id');

            //check if item is already exists in cart
            let found_item = false;
            for(let i = CART_ITEMS.length - 1; i >= 0; i--) {
                if(CART_ITEMS[i].id == PRODUCTS[id].id) {
                    CART_ITEMS[i].qty += 1;
                    refresh_items_display();
                    return;
                }
            }

            let temp = PRODUCTS[id];
            temp.qty = 1;
            CART_ITEMS.push(temp);
            //console.log(CART_ITEMS);

            refresh_items_display();
        }
    }

    function refresh_items_display() {
        let item_count = document.querySelector(".js-item-count");
        item_count.innerHTML = CART_ITEMS.length;

        let items_display_div = document.querySelector(".js-cart");
        items_display_div.innerHTML = '';

        var total_amount = 0;

        for(let i = CART_ITEMS.length - 1; i >= 0; i--) {
            items_display_div.innerHTML += cart_html(CART_ITEMS[i]);
            total_amount += (CART_ITEMS[i].amount * CART_ITEMS[i].qty);
        }

        let total_amount_div = document.querySelector(".js-total-amount");
        total_amount_div.innerHTML = total_amount;
    }

    function search_item(e) {
        let text = e.target.value.trim();
        let data = {};

        data.data_type = "search";
        data.text = text;

        send_data(data);
    }

    function send_data(data) {
        let ajax = new XMLHttpRequest();

        ajax.addEventListener("readystatechange", function (e) {
            if(ajax.readyState == 4) {
                if(ajax.status == 200) {
                    //console.log(ajax);
                    handle_result(ajax.responseText);
                }else{
                    console.log("Error code: " + ajax.status + " Error text: " + ajax.statusText);
                }
            }
        });

        ajax.open("post", "index.php?page_name=ajax",true);
        data = JSON.stringify(data);
        ajax.send(data);
    }

    function handle_result(result) {
        //console.log(result);

        var obj = JSON.parse(result);

        if(typeof obj != "undefined") {
            if(obj.data_type == "search") {
                var mydiv = document.querySelector(".js-products");
                mydiv.innerHTML = '';
                PRODUCTS = [];

                if(obj.data != "") {
                    PRODUCTS = obj.data;

                    for(var i = 0; i < obj.data.length; i++ ) {
                        mydiv.innerHTML += product_html(obj.data[i], i);
                    }
                }
            }
        }
    }

    function product_html(data, index) {
        return `
                <div class="card rounded-2">
                    <a href="">
                    <img id="${index}" src="${data.image}" alt="food" style="width: 220px; height: 220px;">
                    </a>
                    <div class="p-4 text-center">
                        <div class="text-muted mb-1 title">${data.description}</div>
                        <div class="price"><b>$${data.amount}</b></div>
                    </div>
                </div>
                `;
    }

    function cart_html(data) {
        return `
                <tr class="cart-table">
                     <td>
                         <img src="${data.image}" alt="food">
                     </td>
                     <td>
                         <div class="text-muted title p-1">${data.description}</div>
                         <div class="p-1 qty">
                             <span class="input-group-text bg-primary text-white"><i class="fa fa-minus"></i></span>
                             <input class="input-group-text" name="qty" placeholder="1" value="${data.qty}">
                             <span class="input-group-text bg-primary text-white"><i class="fa fa-plus"></i></span>
                         </div>
                     </td>
                     <td>
                         <div class="price"><b>$${data.amount}</b></div>
                     </td>
                     <td class="trash">
                         <i class="fa fa-trash-alt"></i>
                     </td>
                </tr>
                `;
    }

    send_data({
        data_type: "search",
        text: ""
    });
</script>

<?php require views_path("includes/footer"); ?>


