<?php
include('../../Config/conect.php');
include('../../root/Header.php');
?>


<style>
    body {
        background: #f8f8f8;
    }

    .header {
        background: #6f4e37;
        padding: 15px;
        color: white;
        text-align: center;
        font-size: 25px;
        font-weight: bold;
    }

    .category-btn {
        border-radius: 25px;
        padding: 8px 18px;
        background: white;
        border: 1px solid #ddd;
        margin-right: 10px;
        cursor: pointer;
        white-space: nowrap;
    }

    .category-btn.active {
        background: #6f4e37;
        color: white;
        border: none;
    }

    .item-card {
        background: white;
        border-radius: 12px;
        padding: 15px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .item-image {
        width: 100%;
        height: 120px;
        object-fit: cover;
        border-radius: 10px;
    }

    .cart-btn {
        position: fixed;
        bottom: 20px;
        right: 20px;
        background: #6f4e37;
        color: white;
        border-radius: 50px;
        padding: 12px 20px;
        box-shadow: 0px 5px 12px rgba(0, 0, 0, 0.2);
    }

    #cartDrawer {
        position: fixed;
        width: 320px;
        height: 100%;
        right: -350px;
        top: 0;
        background: white;
        box-shadow: -5px 0px 12px rgba(0, 0, 0, 0.2);
        transition: 0.3s;
        padding: 20px;
        z-index: 9999;
    }

    #cartDrawer.open {
        right: 0;
    }











    /* --- Menu Tabs Styling --- */
    .menu-tabs .nav-link {
        /* Muted button style */
        color: #8d7b73;
        border: 1px solid #ccc;
        background-color: white;
        border-radius: 20px;
        margin: 0 5px;
        padding: 8px 18px;
        transition: all 0.2s;
    }

    .menu-tabs .nav-link.active {
        /* Active button style - a light tan/brown color */
        background-color: #f7e7da;
        color: #4b3832;
        border-color: #f7e7da;
        font-weight: bold;
    }

    /* --- Menu Item Styling --- */
    .menu-item {
        border: 1px solid #eee;
        background-color: white;
        border-radius: 8px;
        transition: box-shadow 0.2s;
    }

    .menu-item:hover {
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        /* Subtle lift on hover */
    }

    .menu-item-img {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 4px;
        /* Optional: Small border to define the image area */
        border: 1px solid #f2f2f2;
    }

    .price-tag {
        /* Ensure the price is always aligned to the right */
        min-width: 60px;
        text-align: right;
    }

    .add-to-cart-btn {
        /* Style for the add button */
        border-radius: 50%;
        width: 30px;
        height: 30px;
        line-height: 1;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 1.2rem;
    }

    .fa-cart-shopping {
        color: #4e341f;
        margin-left: 10px;

    }
</style>

<body>

    <!-- Header -->
    <div class="header">
        Digital Menu For Cashier or Waiter
    </div>

    <div class="container mt-3">

        <!-- Search -->
        <input type="text" id="searchInput" class="form-control mb-3" placeholder="Search items...">

        <!-- menu tab -->
        <section class="container py-5 menu-section">
            <h2 class="mb-4 text-center fw-bold">MENU TAB ALL PRODUCT</h2>

            <ul class="nav nav-pills justify-content-center mb-4 menu-tabs" id="coffeeMenuTabs" role="tablist">
                <!-- all product -->
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button"
                        role="tab" aria-controls="all" aria-selected="true">All</button>
                </li>

                <?php
                $sql = 'SELECT * from categories';
                $run = $con->query($sql);
                while ($row = $run->fetch_assoc()) {
                ?>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="<?php echo $row['Name']; ?>-tab" data-bs-toggle="tab" data-bs-target="#<?php echo $row['Name']; ?>" type="button"
                            role="tab" aria-controls="<?php echo $row['Name']; ?>" aria-selected="false"><?php echo $row['Name']; ?></button>
                    </li>

                <?php
                }
                ?>

            </ul>

            <div class="tab-content" id="coffeeMenuContent">
                <!-- alll pro -->
                <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                    <div class="container my-5">
                        <div class="row row-cols-2 row-cols-md-5 g-4 text-center">
                            <?php
                            $sql2 = "SELECT * FROM products";
                            $result2 = $con->query($sql2);
                            while ($row2 = $result2->fetch_assoc()) {
                            ?>
                                <div class="col">
                                    <div class="card product-card p-2 drink-item">
                                        <img data-bs-toggle="modal" data-bs-target="#itemModal"
                                            data-name="<?php echo $row2['Name'] ?>"
                                            data-proid="<?php echo $row2['ProductID'] ?>"
                                            data-price="<?php echo $row2['Price'] ?>"
                                            data-image="<?php echo $row2['Image'] ?>"
                                            data-quantity="<?php echo $row2['StockQty'] ?>"
                                            data-category="<?php $categoryId = $row2['CategoryID'];
                                                            $slq3 = "SELECT Name FROM categories WHERE CategoryID=$categoryId";
                                                            $result3 = $con->query($slq3);
                                                            $row3 = $result3->fetch_assoc();
                                                            echo $row3['Name'];
                                                            ?>"

                                            src="../../assets/images/<?php echo $row2['Image'] ?>"
                                            style="object-fit: contain; width: 185px; height: 200px;"
                                            class="card-img-top mx-auto product-img" alt="Coffee Special">
                                        <div class="card-body p-1">
                                            <p class="card-text mb-0 fw-bold"><?php echo $row2['Name'] ?></p>
                                            <small class="text-muted">
                                                <?php
                                                if ($row2['StockQty'] > 0) {
                                                    echo '<span  class="badge bg-info">In Stock</span>' . ' <br>';
                                                    echo '$ ' . $row2['Price'];
                                                } else {
                                                    echo '<span  class="badge bg-danger">Out Stock</span>' . '<br>';
                                                    echo '$ ' . $row2['Price'];
                                                } ?></small>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>

                        </div>
                    </div>




                </div>
                <?php
                $sql1 = 'SELECT * FROM categories';
                $result1 = $con->query($sql1);
                while ($row1 = $result1->fetch_assoc()) {
                ?>
                    <div class="tab-pane fade" id="<?php echo $row1['Name'] ?>" role="tabpanel"
                        aria-labelledby="<?php echo $row1['Name'] ?>-tab">
                        <div class="container my-5">
                            <div class="row row-cols-2 row-cols-md-5 g-4 text-center">
                                <?php
                                $catid = $row1['CategoryID'];
                                $sql2 = "SELECT * FROM products WHERE CategoryID ='$catid'";
                                $result2 = $con->query($sql2);
                                while ($row2 = $result2->fetch_assoc()) {
                                ?>
                                    <div class="col">
                                        <div class="card product-card p-2 drink-item">
                                            <img data-bs-toggle="modal" data-bs-target="#itemModal"
                                                data-name="<?php echo $row2['Name'] ?>"
                                                data-proid="<?php echo $row2['ProductID'] ?>"
                                                data-price="<?php echo $row2['Price'] ?>"
                                                data-image="<?php echo $row2['Image'] ?>"
                                                data-quantity="<?php echo $row2['StockQty'] ?>"
                                                data-category="<?php $categoryId = $row2['CategoryID'];
                                                                $slq3 = "SELECT Name FROM categories WHERE CategoryID=$categoryId";
                                                                $result3 = $con->query($slq3);
                                                                $row3 = $result3->fetch_assoc();
                                                                echo $row3['Name'];
                                                                ?>"

                                                src="../../assets/images/<?php echo $row2['Image'] ?>"
                                                style="object-fit: contain; width: 185px; height: 200px;"
                                                class="card-img-top mx-auto product-img" alt="Coffee Special">
                                            <div class="card-body p-1">
                                                <p class="card-text mb-0 fw-bold"><?php echo $row2['Name'] ?></p>
                                                <small class="text-muted">
                                                    <?php
                                                    if ($row2['StockQty'] > 0) {
                                                        echo '<span  class="badge bg-info">In Stock</span>' . ' <br>';
                                                        echo '$ ' . $row2['Price'];
                                                    } else {
                                                        echo '<span  class="badge bg-danger">Out Stock</span>' . '<br>';
                                                        echo '$ ' . $row2['Price'];
                                                    } ?></small>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>

            </div>
        </section>



    </div>


    <!-- Floating Cart Button -->
    <button class="cart-btn btn-view-cart" data-bs-toggle="modal" data-bs-target="#Cartmodal"><i style="margin-right:5px;" class="fa-solid fa-cart-arrow-down"></i> View Cart (<span
            id="cart-count">0</span>)</button>




    <!-- Modal Cart -->
    <div class="modal fade" id="Cartmodal" tabindex="-1" aria-labelledby="CartmodalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">
                        <h4>Your Cart</h4>
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!---------------- CART DRAWER ---------------->
                    <div class="show-items">
                        <table class="table" border="1">
                            <thead>
                                <tr>
                                    <th>ProductID</th>
                                    <th>Name</th>
                                    <th>Sugar</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody class="cart_item">


                            </tbody>

                        </table>
                        <button class="btn btn-success w-100 fw-bold pay-btn">
                            Pay Now <i style="margin-left: 5px; font-size: 20px;" class="fa-brands fa-amazon-pay"></i>
                        </button>

                    </div>

                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Close</button> -->
                </div>
            </div>

        </div>
    </div>




    <!-- Modal buy chooese sugar -->
    <div class="modal fade" id="itemModal" tabindex="-1" aria-labelledby="itemModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- image preview -->
                <div class="mb-3 text-center">
                    <img id="ImagePreview" src="" style="width: 200px; height: 200px; object-fit: contain;">
                </div>
                <div class="modal-body">
                    <!-- <h4>Iced Latte</h4> -->
                    <label for="proid" class="form-label">ProductID</label>
                    <input class="form-control" disabled type="text" id="proid" value=""><br>
                    <input type="hidden" id="stock" value="">

                    <label for="name" class="form-label"> Name</label>
                    <input class="form-control" disabled type="text" id="cafe_name" value="Iced Latte"><br>
                    <!-- <p>Fresh espresso shot blended with cold milk and ice.</p> -->
                    <label for="price" class="form-label">Price</label>
                    <input type="text" class="form-control" name="price" id="price" value=""><br>

                    <label for="category">Category</label>
                    <input type="text" class="form-control" name="category" id="category" value=""><br>

                    <!-- sugar -->
                    <select class="form-select" name="sugar" id="surgar">
                        <option value="Normal">Choose Sugar %</option>
                        <option value="0%">0%</option>
                        <option value="20%">20%</option>
                        <option value="50%">50%</option>
                        <option value="70%">70%</option>
                        <option value="100%">100%</option>
                    </select>

                    <button class="btn btn-primary mt-3 add_cart">Add to Cart</button>

                    <button type="button" class="btn btn-dark mt-3" data-bs-dismiss="modal">Close</button>

                </div>

            </div>
        </div>
    </div>


    <!-- payment type -->

    <div class="modal fade" id="paymentModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Complete Payment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="receiptTotal" class="fs-4 fw-bold text-center">Total Amount: $6.10</p>
                    <button class="btn btn-outline-primary w-100 mb-2" value="Cash" id="cash">Cash</button>
                    <button class="btn btn-outline-primary w-100 mb-2" value="Card" id="card">Card</button>
                    <button class="btn btn-outline-primary w-100" data-bs-toggle="modal" data-bs-target="#showqr">QR
                        Code</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary cancel_btn">Cancel</button>
                    <!-- <button data-bs-toggle="modal" data-bs-target="#receiptModal">Print Receipt</button> -->
                </div>
            </div>
        </div>
    </div>

    <!-- QR modal -->

    <div class="modal fade" id="showqr" tabindex="-1" aria-labelledby="showqrmodalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <img src="../../assets/images/qr.png" class="img-fluid" alt="QR Code">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btncloseqr">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- recive modal -->
    <div class="modal fade" id="receiptModal" tabindex="-1" aria-labelledby="receiptModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 420px;">
            <div class="modal-content">
                <div class="modal-body">

                    <style>
                        .receipt {
                            background: white;
                            padding: 20px;
                            border: 1px solid #ddd;
                            font-family: "Courier New", monospace;
                            width: 380px;
                            /* 80mm receipt */
                            margin: 0 auto;
                            background: #f6f6f6;
                        }

                        .receipt h2,
                        h3,
                        p {
                            text-align: center;
                            margin: 3px 0;
                        }

                        .receipt .line {
                            border-bottom: 1px dashed #000;
                            margin: 8px 0;
                        }

                        .receipt table {
                            width: 100%;
                            font-size: 14px;
                        }

                        .receipt table tr td {
                            padding: 4px 0;
                        }

                        .receipt .right {
                            text-align: right;
                        }

                        .receipt .center {
                            text-align: center;
                        }

                        .receipt .total {
                            font-size: 16px;
                            font-weight: bold;
                        }

                        .btn-print {
                            margin-top: 15px;
                            width: 100%;
                            padding: 10px;
                            background: #6f4e37;
                            color: white;
                            border: none;
                            font-size: 16px;
                            cursor: pointer;
                        }

                        @media print {
                            .receipt .btn-print {
                                display: none;
                            }

                            body {
                                background: white;
                            }

                            .receipt {
                                border: none;
                            }
                        }
                    </style>

                    <body>
                        <div class="receipt">
                            <!-- Inside .receipt -->
                            <h2 id="cafeName">Café House</h2>
                            <p id="cafeAddress">#12, Phnom Penh, Cambodia</p>
                            <p id="cafePhone">Tel: 012-345-678</p>

                            <div class="line"></div>

                            <!-- Receipt Info -->
                            <p>Receipt No: <strong id="receiptNumber">1025</strong></p>
                            <p>Date: <span id="receiptDate">2025-01-15</span> Cashier: <span id="cashierName">John</span></p>
                            <!-- order type or table no -->
                            <p>Order Type: <span id="orderType">Dine-in</span></p>



                            <div class="line"></div>

                            <!-- Items Table -->
                            <table id="itemTable">
                                <tr>
                                    <td class="item-name">Americano (2×)</td>
                                    <td class="item-price right">$6.00</td>
                                </tr>
                                <tr>
                                    <td class="item-name">Latte (1×)</td>
                                    <td class="item-price right">$3.50</td>
                                </tr>
                                <tr>
                                    <td class="item-name">Croissant (1×)</td>
                                    <td class="item-price right">$1.50</td>
                                </tr>
                            </table>


                            <div class="line"></div>


                            <!-- Totals Table -->
                            <table id="totalsTable">
                                <tr>
                                    <td>Subtotal</td>
                                    <td class="right" id="subtotal">$11.00</td>
                                </tr>
                                <tr>
                                    <td>Tax (10%)</td>
                                    <td class="right" id="tax">$1.10</td>
                                </tr>
                                <tr class="total">
                                    <td>Total</td>
                                    <td class="right" id="total">$12.10</td>
                                </tr>
                                <tr>
                                    <td>Cash</td>
                                    <td class="right" id="cashPaid">$20.00</td>
                                </tr>
                                <tr>
                                    <td>Change</td>
                                    <td class="right" id="change">$7.90</td>
                                </tr>
                            </table>


                            <div class="line"></div>

                            <!-- Payment Method -->
                            <p id="paymentMethod">Payment Method: Cash</p>

                            <div class="line"></div>

                            <!-- Footer -->
                            <p id="thankYou">Thank you for your order! 😊</p>
                            <p class="center" id="visitAgain">Visit Again</p>

                        </div>

                        <!-- Print Button -->
                        <button class="btn-print" onclick="window.print()">Print Receipt</button>

                    </body>
                </div>
            </div>
        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
    $(document).ready(function() {
        //add to cart 
        let cart = [];

        $('.add_cart').click(function() {
            var stock = $('#stock').val();
            var proid = $('#proid').val();
            var name = $('#cafe_name').val();
            var price = $('#price').val();
            var sugar = $('#surgar').val();

            if (stock == 0) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Product out of stock',
                    icon: 'error',
                    timer: 1500,
                    showConfirmButton: false
                })
            } else {

                // Check if item already exists (same product + sugar choice)
                let existing = cart.find(
                    item => item.proid == proid && item.sugar == sugar);

                if (existing) {
                    existing.qty += 1; // increase qty
                } else {
                    cart.push({
                        proid: proid,
                        name: name,
                        price: parseFloat(price),
                        sugar: sugar,
                        qty: 1
                    });
                }

                // update cart counter
                let countqty = 0;
                cart.forEach(function(item) {
                    countqty += item.qty
                })
                $('#cart-count').text(countqty);

                Swal.fire({
                    icon: 'success',
                    title: name + ' added to Cart',
                    showConfirmButton: false,
                    timer: 1000
                });

            }

        });




        // view cart 
        $('.btn-view-cart').click(function() {
            $('.cart_item').html("");
            if (cart.length === 0) {
                $('.cart_item').html(
                    `
                    <tr>
                        <td class="text-center" style="color:gray" colspan="5">Cart is Empty</td>
                    </tr>
                    `
                );

            } else {
                cart.forEach(function(item) {
                    $('.cart_item').append(`
                        <tr>
                            <td>${item.proid}</td>
                            <td>${item.name}</td>
                            <td>${item.sugar}</td>
                            <td>${item.qty}</td>
                            <td>$ ${(item.price * item.qty).toFixed(2)}</td>
                        </tr>
                    `);
                });

                //total price in cart
                let total = 0;
                cart.forEach(function(item) {
                    // total += parseFloat(item.price);
                    total += item.price * item.qty;

                });

                $('.cart_item').append(`
                    <tr>
                    <td colspan="2">
                       <select id="ordertype" class="form-select" style="width: 210px;">
                            <option value="">Choose Method order</option>
                            <option value="Dine-in">Dine-in</option>
                            <option value="Delivery">Delivery</option>
                            <option value="Takeaway">Takeaway</option>

                        </select>
                    
                    </td> 
               
                        <td colspan="2" class="text-end fw-bold">
                        Total:
                        </td>
                        <td>
                        <input class="form-control" disabled type="text" id="totalamount" value=" ${total.toFixed(2)}">
                        </td>
                    </tr>
                `);

            }


        })



        $('.pay-btn').click(function() {
            if (cart.length === 0) {
                Swal.fire({
                    title: 'Oops!',
                    text: 'Cart is empty',
                    icon: 'error',
                    timer: 1500,
                    showConfirmButton: false
                })
                return;
            } else {
                var totalan = $('#totalamount').val();
                $("#receiptTotal").text("Total Amount: $" + totalan);

                $('#paymentModal').modal('show');
                $('#Cartmodal').modal('hide');

            }
        })




        // ===============================================================
        // close modal qr and reload page 
        $('.btncloseqr').click(function() {
            var cash = 'QRCode';
            var totalamount = $('#totalamount').val();
            let cashier = "Manager";
            let date = new Date();
            let ordertype = $('#ordertype').val();
            $.ajax({
                url: "../../action/Order/add.php",
                type: "POST",
                data: {
                    cartData: JSON.stringify(cart),
                    cash: cash,
                    ordertype: ordertype,
                    totalamount: totalamount
                },
                success: function(response) {
                    if (response == 'Success') {
                        Swal.fire({
                            title: 'Success!',
                            text: 'Order added successfully pay by QRCode',
                            icon: 'success',
                            timer: 1500,
                            showConfirmButton: false
                        }).then(function() {
                            $('#receiptModal').modal('show');
                            $('#showqr').modal('hide');
                            $(document).click(function() {
                                location.reload();
                            });

                            $('#paymentMethod').text('Payment Method: ' + cash);
                            $('#paymentMethod').css('color', 'green');
                            $('#orderType').text(ordertype);
                            $('#receiptDate').text(date.toLocaleString());
                            $('#cashierName').text(cashier);

                            let tableitem = []; // create an empty array
                            // loop through the cart and add each item to the table
                            cart.forEach(function(item) {
                                tableitem.push(`
                                            <tr>
                                                    <td class="item-name">${item.name} (${item.sugar}) (${item.qty}×)</td>
                                                    <td class="item-price right">$ ${(item.price * item.qty).toFixed(2)}</td>
                                            </tr>
                                            `);
                            });
                            $('#itemTable').html(tableitem.join(''));



                            //sub total
                            let subtotal = 0;
                            cart.forEach(function(item) {
                                subtotal += item.price * item.qty
                            })

                            tax = subtotal * 0.1
                            $('#tax').text('$ ' + tax.toFixed(2));
                            $('#subtotal').text('$ ' + subtotal.toFixed(2));

                            let total = subtotal + tax;
                            $('#total').text('$ ' + total.toFixed(2));

                            $('#cashPaid').text(cash);
                            $('#change').text(cash);

                            $('#paymentModal').modal('hide');
                        })
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Order not added',
                            icon: 'error',
                            timer: 1500,
                            showConfirmButton: false
                        })
                    }


                }
            });
        })
        // ===============================================================





        //pay by cash ================================================================================
        $('#cash').click(function() {

            if (cart.length === 0) {
                Swal.fire({
                    title: 'Oops!',
                    text: 'Cart is empty',
                    icon: 'error',
                    timer: 1500,
                    showConfirmButton: false
                })
                return;
            }
            var cash = $('#cash').val();
            var totalamount = $('#totalamount').val();
            let cashier = "Manager";
            let date = new Date();
            let ordertype = $('#ordertype').val();


            Swal.fire({
                title: "Enter Cash Amount",
                input: "number",
                inputLabel: "Customer Cash",
                inputPlaceholder: "Enter amount customer paid...",
                showCancelButton: true,
                confirmButtonText: "Confirm",
            }).then((result) => {

                if (!result.isConfirmed) return; 

                let cashPaid = parseFloat(result.value);

                if (isNaN(cashPaid) || cashPaid <= 0) {
                    Swal.fire({
                        title: "Invalid Input",
                        text: "Please enter a valid number.",
                        icon: "error",
                        timer: 1500,
                        showConfirmButton: false
                    });
                    return;
                }

                if (cashPaid < totalamount) {
                    Swal.fire({
                        title: "Oops!",
                        text: "Cash is not enough",
                        icon: "error",
                        timer: 1500,
                        showConfirmButton: false
                    });
                    return;
                }

                $.ajax({
                    url: "../../action/Order/add.php",
                    type: "POST",
                    data: {
                        cartData: JSON.stringify(cart),
                        cash: cashPaid, 
                        ordertype: ordertype,
                        totalamount: totalamount
                    },

                    success: function(response) {
                        if (response == 'Success') {

                            Swal.fire({
                                title: 'Success!',
                                text: 'Order added successfully pay by Cash',
                                icon: 'success',
                                timer: 1500,
                                showConfirmButton: false
                            }).then(function() {

                                // Show receipt
                                $('#receiptModal').modal('show');
                                $('#paymentMethod').text('Payment Method: Cash');
                                $('#paymentMethod').css('color', 'green');
                                $('#receiptDate').text(date.toLocaleString());
                                $('#orderType').text(ordertype);
                                $('#cashierName').text(cashier);

                                $(document).click(function() {
                                    location.reload();
                                });

                                let tableitem = [];
                                cart.forEach(function(item) {
                                    tableitem.push(`
                            <tr>
                                <td class="item-name">${item.name} (${item.sugar}) (${item.qty}×)</td>
                                <td class="item-price right">$ ${(item.price * item.qty).toFixed(2)}</td>
                            </tr>
                        `);
                                });
                                $('#itemTable').html(tableitem.join(''));

                                let subtotal = 0;
                                cart.forEach(function(item) {
                                    subtotal += item.price * item.qty;
                                });

                                tax = subtotal * 0.1;

                                $('#tax').text('$ ' + tax.toFixed(2));
                                $('#subtotal').text('$ ' + subtotal.toFixed(2));

                                let total = subtotal + tax;
                                $('#total').text('$ ' + total.toFixed(2));

                                $('#cashPaid').text('$ ' + cashPaid.toFixed(2));
                                $('#change').text('$ ' + (cashPaid - total).toFixed(2));

                                $('#paymentModal').modal('hide');
                            });

                        } else {
                            Swal.fire({
                                title: "Error!",
                                text: "There was an error processing your order.",
                                icon: "error",
                                timer: 1500,
                                showConfirmButton: false
                            });
                        }
                    }
                });

            });



        });

        //pay by cash ================================================================================



        //pay by cart ============================================================================

        $('#card').click(function() {

            if (cart.length === 0) {
                Swal.fire({
                    title: 'Oops!',
                    text: 'Cart is empty',
                    icon: 'error',
                    timer: 1500,
                    showConfirmButton: false
                })
                return;
            }
            var cash = $('#card').val();
            var totalamount = $('#totalamount').val();
            let cashier = "Manager";
            let ordertype = $('#ordertype').val();
            let date = new Date();


            $.ajax({
                url: "../../action/Order/add.php",
                type: "POST",
                data: {
                    cartData: JSON.stringify(cart),
                    cash: cash,
                    ordertype: ordertype,
                    totalamount: totalamount
                },
                success: function(response) {
                    if (response == 'Success') {
                        Swal.fire({
                            title: 'Success!',
                            text: 'Order added successfully pay by Card',
                            icon: 'success',
                            timer: 1500,
                            showConfirmButton: false
                        }).then(function() {
                            $('#receiptModal').modal('show');
                            $('#paymentMethod').text('Payment Method: ' + cash);
                            $('#paymentMethod').css('color', 'green');
                            $('#receiptDate').text(date.toLocaleString());
                            $('#cashierName').text(cashier);
                            $('#orderType').text(ordertype);
                            $(document).click(function() {
                                location.reload();
                            });

                            let tableitem = []; // create an empty array
                            // loop through the cart and add each item to the table
                            cart.forEach(function(item) {
                                tableitem.push(`
                                            <tr>
                                                    <td class="item-name">${item.name} (${item.sugar}) (${item.qty}×)</td>
                                                    <td class="item-price right">$ ${(item.price * item.qty).toFixed(2)}</td>
                                            </tr>
                                            `);
                            });
                            $('#itemTable').html(tableitem.join(''));



                            //sub total
                            let subtotal = 0;
                            cart.forEach(function(item) {
                                subtotal += item.price * item.qty
                            })

                            tax = subtotal * 0.1
                            $('#tax').text('$ ' + tax.toFixed(2));
                            $('#subtotal').text('$ ' + subtotal.toFixed(2));

                            let total = subtotal + tax;
                            $('#total').text('$ ' + total.toFixed(2));

                            $('#cashPaid').text(cash);
                            $('#change').text(cash);

                            $('#paymentModal').modal('hide');
                        })
                    } else {

                        Swal.fire({
                            title: 'Error!',
                            text: 'There was an error processing your order.',
                            icon: 'error',
                            timer: 1500,
                            showConfirmButton: false
                        });
                    }


                }
            });



        });
        //pay by cart ============================================================================



        //cancel payment====================================================
        $('.cancel_btn').click(function() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You cart will be cleared! You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, cancel it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    //refresh page
                    location.reload();
                }
            })
        })






        //====================================================

        //search product 
        $('#searchInput').on('keyup', function() {
            var value = $(this).val().toLowerCase();
            $('.drink-item').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });


        //view detail
        $('.product-img').click(function() {
            var stockqty = $(this).data('quantity');
            var name = $(this).data('name');
            var proid = $(this).data('proid');
            var price = $(this).data('price');
            var image = $(this).data('image');
            var category = $(this).data('category');
            $('#stock').val(stockqty);
            $('#cafe_name').val(name);
            $('#proid').val(proid);
            $('#price').val(price);
            $('#category').val(category);
            $('#ImagePreview').attr('src', '../../assets/images/' + image);
            $('#itemModal').modal('show');

        })


        // Preview When selected image
        $('#proimageupdate').on('change', function(event) {
            var file = event.target.files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#ImagePreview').attr('src', e.target.result);
                };

                reader.readAsDataURL(file);
            }
        });

    })
</script>