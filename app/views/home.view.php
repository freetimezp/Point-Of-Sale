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
                    <input onkeyup="check_for_enter_key(event)" oninput="search_item(event)" class="border-warning js-search" type="text" name="search" placeholder="Search" style="max-width: 200px; outline: none;">
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
                    <button onclick="show_modal('amount_paid')" class="btn btn-success py-3">Checkout</button>
                </div>
                <div>
                    <button onclick="clear_all()" class="btn btn-warning">Clear all</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modals start -->
<div role="close-modal"  onclick="hide_modal(event, 'amount_paid')" class="modal-block modal-hide js-amount-paid-modal">
    <div class="modal-popup d-flex justify-content-between flex-column">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <span class="modal_title">Checkout</span>
            <span class="badge btn-danger p-2 rounded-3">
                <i role="close-modal" onclick="hide_modal(event, 'amount_paid')" class="fa fa-close"></i>
            </span>
        </div>
        <input onkeyup="if(event.keyCode == 13) {validate_amount_paid(event)}" type="text" class="js-amount-paid-input form-control mb-4" placeholder="Enter amount paid">
        <div class="d-flex justify-content-between">
            <button role="close-modal" onclick="hide_modal(event, 'amount_paid')" class="btn btn-secondary">Cancel</button>
            <button onclick="validate_amount_paid(event)" class="btn btn-primary">Next</button>
        </div>
    </div>
</div>

<div role="close-modal"  onclick="hide_modal(event, 'change_paid')" class="modal-block modal-hide-change js-change-paid-modal">
    <div class="modal-popup d-flex justify-content-between flex-column">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <span class="modal_title">Change back</span>
            <span class="badge btn-danger p-2 rounded-3">
                <i role="close-modal" onclick="hide_modal(event, 'change_paid')" class="fa fa-close"></i>
            </span>
        </div>
        <div class="js-change-paid-input mb-4 text-center">
            0.00
        </div>
        <div class="d-flex justify-content-between">
            <button role="close-modal" onclick="hide_modal(event, 'change_paid')" type="submit" class="btn btn-success js-btn-change-close">Continue</button>
        </div>
    </div>
</div>

<!-- end Modals-->


<script>
    let PRODUCTS = [];
    let CART_ITEMS = [];
    let BARCODE = false;

    let main_input = document.querySelector(".js-search");

    let GTOTAL = 0;
    let CHANGE = 0;

    function add_item_to_cart(e) {
        e.preventDefault();
        if(e.target.tagName == "IMG") {
            let index = e.target.getAttribute('id');

            //check if item is already exists in cart
            add_item_from_index(index);
        }
    }

    function add_item_from_index(index) {
        for(let i = CART_ITEMS.length - 1; i >= 0; i--) {
            if(CART_ITEMS[i].id == PRODUCTS[index].id) {
                CART_ITEMS[i].qty += 1;
                refresh_items_display();
                return;
            }
        }

        let temp = PRODUCTS[index];
        temp.qty = 1;
        CART_ITEMS.push(temp);
        //console.log(CART_ITEMS);

        refresh_items_display();
    }

    function refresh_items_display() {
        let item_count = document.querySelector(".js-item-count");
        item_count.innerHTML = CART_ITEMS.length;

        let items_display_div = document.querySelector(".js-cart");
        items_display_div.innerHTML = '';

        var total_amount = 0;

        for(let i = CART_ITEMS.length - 1; i >= 0; i--) {
            items_display_div.innerHTML += cart_html(CART_ITEMS[i], i);
            total_amount += (CART_ITEMS[i].amount * CART_ITEMS[i].qty);
        }

        let total_amount_div = document.querySelector(".js-total-amount");
        total_amount = total_amount.toFixed(2);
        total_amount_div.innerHTML = total_amount;
        GTOTAL = total_amount;
    }

    function clear_all() {
        if(confirm("Are you sure you want to clear cart?")) {
            CART_ITEMS = [];
            refresh_items_display();
        }
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
                    if(ajax.responseText.trim() != "") {
                        handle_result(ajax.responseText);
                        if(BARCODE) {
                            main_input.value = "";
                            main_input.focus();
                        }
                    }else{
                        if(BARCODE) {
                            alert("That product was not found");
                            main_input.value = "";
                            main_input.focus();
                        }
                    }
                }else{
                    console.log("Error code: " + ajax.status + " Error text: " + ajax.statusText);
                }

                BARCODE = false;
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

                    if(BARCODE && PRODUCTS.length == 1) {
                        add_item_from_index(0);
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

    function cart_html(data, index) {
        return `
                <tr class="cart-table">
                     <td>
                         <img src="${data.image}" alt="food">
                     </td>
                     <td>
                         <div class="text-muted title p-1">${data.description}</div>
                         <div class="p-1 qty">
                             <span index="${index}" onclick="change_qty('down', event)" class="input-group-text bg-primary text-white"><i class="fa fa-minus"></i></span>
                             <input onblur="change_qty('blur', event)" index="${index}" class="input-group-text" name="qty" placeholder="1" value="${data.qty}">
                             <span index="${index}"  onclick="change_qty('up', event)" class="input-group-text bg-primary text-white"><i class="fa fa-plus"></i></span>
                         </div>
                     </td>
                     <td>
                         <div class="price"><b>$${data.amount}</b></div>
                     </td>
                     <td index="${index}" onclick="delete_item(event)" class="trash">
                         <i class="fa fa-trash-alt"></i>
                     </td>
                </tr>
                `;
    }

    function delete_item(e) {
        let index = e.currentTarget.getAttribute("index");
        CART_ITEMS.splice(index, 1);

        refresh_items_display();
    }

    function change_qty(direction, e) {
        let index = e.currentTarget.getAttribute("index");
        //alert(index);

        if(direction == "up") {
            CART_ITEMS[index].qty += 1;
        }else if(direction == "down"){
            CART_ITEMS[index].qty -= 1;
        }else if(direction == "blur") {
            CART_ITEMS[index].qty = parseInt(e.currentTarget.value);
        }

        //make sure qty not less than 0
        if(CART_ITEMS[index].qty < 1) {
            CART_ITEMS[index].qty = 1;
        }

        refresh_items_display();
    }

    function check_for_enter_key(e) {
        //press enter on keyboard
        if(e.keyCode == 13) {
            BARCODE = true;
            search_item(e);
        }
    }

    function show_modal(modal) {
        if(modal == "amount_paid") {
            if(CART_ITEMS.length == 0) {
                alert("Please, add product to cart!");
                return;
            }
            let mydiv = document.querySelector(".js-amount-paid-modal");
            mydiv.classList.remove("modal-hide");

            mydiv.querySelector(".js-amount-paid-input").value = "";
        }

        if(modal == "change_paid") {
            let mychangediv = document.querySelector(".js-change-paid-modal");
            mychangediv.classList.remove("modal-hide-change");

            mychangediv.querySelector(".js-change-paid-input").innerHTML = CHANGE + "$";
            mychangediv.querySelector(".js-btn-change-close").focus();
        }
    }

    function hide_modal(e, modal) {
        if(e.target.getAttribute("role") == "close-modal") {
            if(modal == "amount_paid") {
                let mydiv = document.querySelector(".js-amount-paid-modal");
                mydiv.classList.add("modal-hide");
            }
            if(modal == "change_paid") {
                let mydiv = document.querySelector(".js-change-paid-modal");
                mydiv.classList.add("modal-hide-change");
            }
        }
    }

    function validate_amount_paid(e) {
        e.preventDefault();
        let amount = document.querySelector(".js-amount-paid-input").value.trim();

        if(amount < GTOTAL || amount == 0) {
            alert("Amount be higher or equal to total amount!");
            return;
        }

        amount = parseFloat(amount);
        CHANGE = amount - GTOTAL;
        CHANGE = CHANGE.toFixed(2);

        let mydiv = document.querySelector(".js-amount-paid-modal");
        mydiv.classList.add("modal-hide");

        show_modal('change_paid');

        //remove unwanted information from products items
        let ITEMS_NEW = [];
        for(let i = 0; i < CART_ITEMS.length; i++) {
            let tmp = {};
            tmp.id = CART_ITEMS[i]['id'];
            tmp.qty = CART_ITEMS[i]['qty'];

            ITEMS_NEW.push(tmp);
        }

        //send cart data through ajax
        send_data({
            data_type: "checkout",
            text: ITEMS_NEW
        });

        //clear items in cart
        CART_ITEMS = [];
        refresh_items_display();
    }

    send_data({
        data_type: "search",
        text: ""
    });
</script>

<?php require views_path("includes/footer"); ?>


