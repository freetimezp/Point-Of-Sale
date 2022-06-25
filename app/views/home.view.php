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
                    <input class="border-warning" type="text" name="search" placeholder="Search" style="max-width: 200px; outline: none;">
                    <span class="input-group-text bg-danger text-white shadow"><i class="fa fa-search"></i></span>
                </div>
            </div>

            <div class="js-products p-4 d-flex justify-content-center">
                <?php //add content with javascript; ?>

            </div>
        </div>

        <div class="col-3 p-3">
            <h4 class="text-center">Cart <span class="badge bg-primary rounded-circle">3</span></h4>

            <div class="table-responsive carts-block">
                <table class="table table-striped table-hover carts-table">
                    <thead>
                        <tr>
                            <th>Image</th><th>Description</th><th>Amount</th><th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr class="cart-table">
                            <td>
                                <img src="assets/images/item-001.jpg" alt="food">
                            </td>
                            <td>
                                <div class="text-muted title p-1">Food</div>
                                <div class="p-1 qty">
                                    <span class="input-group-text bg-primary text-white"><i class="fa fa-minus"></i></span>
                                    <input class="input-group-text" name="qty" placeholder="3" value="3">
                                    <span class="input-group-text bg-primary text-white"><i class="fa fa-plus"></i></span>
                                </div>
                            </td>
                            <td>
                                <div class="price"><b>$5.00</b></div>
                            </td>
                            <td class="trash">
                                <i class="fa fa-trash-alt"></i>
                            </td>
                        </tr>

                        <tr class="cart-table">
                            <td>
                                <img src="assets/images/item-001.jpg" alt="food">
                            </td>
                            <td>
                                <div class="text-muted title p-1">Food</div>
                                <div class="p-1 qty">
                                    <span class="input-group-text bg-primary text-white"><i class="fa fa-minus"></i></span>
                                    <input class="input-group-text" name="qty" placeholder="3" value="3">
                                    <span class="input-group-text bg-primary text-white"><i class="fa fa-plus"></i></span>
                                </div>
                            </td>
                            <td>
                                <div class="price"><b>$5.00</b></div>
                            </td>
                            <td class="trash">
                                <i class="fa fa-trash-alt"></i>
                            </td>
                        </tr>

                        <tr class="cart-table">
                            <td>
                                <img src="assets/images/item-001.jpg" alt="food">
                            </td>
                            <td>
                                <div class="text-muted title p-1">Food</div>
                                <div class="p-1 qty">
                                    <span class="input-group-text bg-primary text-white"><i class="fa fa-minus"></i></span>
                                    <input class="input-group-text" name="qty" placeholder="3" value="3">
                                    <span class="input-group-text bg-primary text-white"><i class="fa fa-plus"></i></span>
                                </div>
                            </td>
                            <td>
                                <div class="price"><b>$5.00</b></div>
                            </td>
                            <td class="trash">
                                <i class="fa fa-trash-alt"></i>
                            </td>
                        </tr>

                        <tr class="cart-table">
                            <td>
                                <img src="assets/images/item-001.jpg" alt="food">
                            </td>
                            <td>
                                <div class="text-muted title p-1">Food</div>
                                <div class="p-1 qty">
                                    <span class="input-group-text bg-primary text-white"><i class="fa fa-minus"></i></span>
                                    <input class="input-group-text" name="qty" placeholder="3" value="3">
                                    <span class="input-group-text bg-primary text-white"><i class="fa fa-plus"></i></span>
                                </div>
                            </td>
                            <td>
                                <div class="price"><b>$5.00</b></div>
                            </td>
                            <td class="trash">
                                <i class="fa fa-trash-alt"></i>
                            </td>
                        </tr>

                        <tr class="cart-table">
                            <td>
                                <img src="assets/images/item-001.jpg" alt="food">
                            </td>
                            <td>
                                <div class="text-muted title p-1">Food</div>
                                <div class="p-1 qty">
                                    <span class="input-group-text bg-primary text-white"><i class="fa fa-minus"></i></span>
                                    <input class="input-group-text" name="qty" placeholder="3" value="3">
                                    <span class="input-group-text bg-primary text-white"><i class="fa fa-plus"></i></span>
                                </div>
                            </td>
                            <td>
                                <div class="price"><b>$5.00</b></div>
                            </td>
                            <td class="trash">
                                <i class="fa fa-trash-alt"></i>
                            </td>
                        </tr>

                        <tr class="cart-table">
                            <td>
                                <img src="assets/images/item-001.jpg" alt="food">
                            </td>
                            <td>
                                <div class="text-muted title p-1">Food</div>
                                <div class="p-1 qty">
                                    <span class="input-group-text bg-primary text-white"><i class="fa fa-minus"></i></span>
                                    <input class="input-group-text" name="qty" placeholder="3" value="3">
                                    <span class="input-group-text bg-primary text-white"><i class="fa fa-plus"></i></span>
                                </div>
                            </td>
                            <td>
                                <div class="price"><b>$5.00</b></div>
                            </td>
                            <td class="trash">
                                <i class="fa fa-trash-alt"></i>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="alert alert-danger carts-total">
                <span>Total: </span><span>$30.00</span>
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
        ajax.send();
    }

    function handle_result(result) {
        console.log(result);

        var obj = JSON.parse(result);

        if(typeof obj != "undefined") {
            var mydiv = document.querySelector(".js-products");
            mydiv.innerHTML = '';

            //console.log('here 2');
            for(var i = 0; i < obj.length; i++ ) {
                mydiv.innerHTML += product_html(obj[i]);
            }
        }
    }

    function product_html(data) {
        return `
                <div class="card rounded-2">
                    <a href="">
                    <img src="${data.image}" alt="food" style="width: 220px; height: 220px;">
                    </a>
                    <div class="p-4 text-center">
                        <div class="text-muted mb-1 title">${data.description}</div>
                        <div class="price"><b>$${data.amount}</b></div>
                    </div>
                </div>
                `;
    }

    send_data();
</script>

<?php require views_path("includes/footer"); ?>


