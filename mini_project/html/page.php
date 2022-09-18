<?php
require './inc/header.php';
?>
<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    // echo $page;
    if ($_GET['page'] == "Home") {
        header('location:index.php');
    }
?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        table {
            border-collapse: collapse
        }

        td,
        th {
            padding: 13px 5px;
            border: 1px solid #000000
        }


        .cart-qty {
            margin: 10px 20px;
            padding: 7px;
            border: none;
            width: 56px;
            border-radius: 6px;
            background-color: #7e7e7e;
            font-size: 15px;
            color: white;
            cursor: pointer;
        }
    </style>


    <?php
    $page = $_GET['page'];

    $menu_type = mysqli_query($con, "SELECT * from menu WHERE menu_name LIKE '%" . $_GET['page'] . "%';");
    $type = mysqli_fetch_assoc($menu_type);


    $category = mysqli_query($con, "SELECT * from category where category_name like '%" . $_GET['page'] . "%'");
    if (mysqli_num_rows($category) > 0) {
        $name = mysqli_fetch_assoc($category);

    ?>
        <div class="detail-box" style="margin:40px 0 30px 242px;">
            <div class="ourproduct_title">
                <h2 style="width:854px; float:left;"><?php echo $_GET['page'] ?> Products</h2>
                </div>
                <div class="ourproduct_main">
                    <?php
                    $footcare = mysqli_query($con, "select * from product where product_category like '%" . $_GET['page'] . "%'");

                    while ($fetch_product = mysqli_fetch_assoc($footcare)) {
                    ?>
                        <div class="product-box" style="padding-left:0px;">
                            <div class="ourproduct_thumb"><img src="images/<?php echo $fetch_product['product_image'] ?>" /></div>
                            <div class="ourproduct-title"><a href="#"><?php echo $fetch_product['product_name'] ?></a></div>
                            <div class="ourproduct-price-main">
                                <div class="ourproduct-price"><?php echo $fetch_product['product_price'] ?></div>
                                <div class="cart-btn">
                                    <div onclick="return add_cart(<?php echo $fetch_product['product_id'] ?>);"><img src="images/cart-btn.png" border="0" onmouseout="this.src='images/cart-btn.png'" onmouseover="this.src='images/cart-btn_hover.png'" /></div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }

                ?>
                
            </div>
        </div>


        <?php if ($_GET['page'] == "Online store") {

        ?>
            <div class="detail-box" style="margin:40px 0 30px 242px;">
                <div class="ourproduct_title">
                    <h2 style="width:854px; float:left;">ALL Products</h2>

                    <div class="ourproduct_main">
                        <?php
                        $footcare = mysqli_query($con, "select * from product");
                        while ($fetch_product = mysqli_fetch_assoc($footcare)) {
                        ?>
                            <div class="product-box" style="padding-left:0px;margin: 10px 0px;">
                                <div class="ourproduct_thumb"><img src="images/<?php echo $fetch_product['product_image'] ?>" /></div>
                                <div class="ourproduct-title"><a href="#"><?php echo $fetch_product['product_name'] ?></a></div>
                                <div class="ourproduct-price-main">
                                    <div class="ourproduct-price"><?php echo $fetch_product['product_price'] ?></div>
                                    <div class="cart-btn">
                                        <div onclick="return add_cart(<?php echo $fetch_product['product_id'] ?>);"><img src="images/cart-btn.png" border="0" onmouseout="this.src='images/cart-btn.png'" onmouseover="this.src='images/cart-btn_hover.png'" /></div>
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
        <?php if ($_GET['page'] == "Testimonials") {

        ?>
            <div class="detail-box" style="margin:40px 0 30px 242px;">
                <div class="detail-box-cont">
                    <div class="testimonial_main">
                        <h2>Testimonials</h2>
                        <?php
                        $testimonial = mysqli_query($con, "SELECT * FROM `testimonial`");

                        while ($rs = mysqli_fetch_assoc($testimonial)) { ?>
                            <div class="testimonial">
                                <div class="testimonial_topbg">
                                </div>
                                <div class="testimonial_middlebg">
                                    <?php echo $rs['testimonial_content'] ?>
                                    <div class="client-name"><img src="images/line.png" align="absmiddle"> &nbsp;<?php echo $rs['testimonial_auth'] ?></div>
                                </div>
                                <div class="testimonial_bottombg"></div>
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
        <?php if ($_GET['page'] == "DeliveryReturns") {

        ?>
            <div class="detail-box" style="margin:40px 0 30px 242px;">

                <?php
                if (empty($_SESSION['user_id']) || $_SESSION['login'] == false) {
                    echo "<h2>Please Log in to check your orders</h2>";
                } else {

                ?>
                    <h2>Your Order List</h2>
                    <div class="detail-box-cont">
                        <?php
                        $orders = mysqli_query($con, "SELECT * from orders where u_id=" . $_SESSION['user_id'] . "");
                        ?>
                        <table style="width: 100%;text-align:center">
                            <th>Order_id</th>
                            <th>Product Name</th>
                            <th> Product Quantity</th>
                            <th>Shipping Address</th>
                            <th>Total Ammount</th>
                            <th>Payment Mode</th>
                            <th>Status</th>
                            <?php
                            while ($order = mysqli_fetch_assoc($orders)) {
                                $name = explode(",", $order['product_name']);
                                $qty = explode(",", $order['product_quantity']);
                            ?>
                                <tr>
                                    <td class="td"><?php echo $order['order_id'] ?></td>
                                    <br>
                                    <td class="td">
                                        <table align="center">
                                            <tr>
                                                <td style="display:block;border:none;border-bottom:1px solid;width:120px"><?php echo implode('<td style="display:block;border:none;border-bottom:1px solid;">', $name); ?></td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td class="td">
                                        <table align="center">
                                            <tr>
                                                <td style="display:block;border:none;border-bottom:1px solid;width:120px"><?php echo implode('<td style="display:block;border:none;border-bottom:1px solid;">', $qty); ?></td>
                                            </tr>
                                        </table>
                                    </td>

                                    <td class="td"><?php echo $order['shipping_address'] ?></td>
                                    <td class="td"><?php echo number_format($order['tot_ammount']) ?></td>
                                    <td class="td"><?php echo $order['payment_mode'] ?></td>
                                    <td class="td"><?php
                                                    $tsatus = $order['status'];

                                                    if ($tsatus == 0) {
                                                        echo "Order Placed";
                                                    } else if ($tsatus == 1) {
                                                        echo "Order Confirmed";
                                                    } else if ($tsatus == 2) {
                                                        echo "Reached At Your city";
                                                    } else if ($tsatus == 3) {
                                                        echo "Order Completed";
                                                    } else {
                                                        echo "Order Rejected Please contact admin";
                                                    }
                                                    ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                    </div>
                    </table>
            </div>

            </div>
    <?php
                }
            }
    ?>
    <div class="readmore"></div>
    <?php if ($_GET['page'] == "cart") {
    ?>
        <div class="detail-box" style="margin:40px 0 30px 242px;">

            <h2>Cart</h2>
            <table style="width:100%;text-align:center;" class="products">
                <th>Product Image</th>
                <th>Product Name</th>
                <th>Product Quantity</th>
                <th>Product Price</th>
                <th>Sub Total</th>
                <th>Actions</th>
                <?php
                if (!empty($_SESSION['user_id'])) {
                    $user = $_SESSION['user_id'];
                } else {
                    $user = 0;
                }
                $pages = mysqli_query($con, "SELECT * FROM `cart` where u_id=$user");

                if (mysqli_num_rows($pages) > 0) {

                    while ($page = mysqli_fetch_assoc($pages)) {

                        $_SESSION['products'] = array('name' => $page['prd_name']);
                        $sub_total = $page['prd_qty'] * $page['prd_price'];
                ?>
                        <tr>
                            <td><img src="./admin/upload/<?php echo $page['prd_image'] ?>" alt=""></td>
                            <td><?php echo $page['prd_name'] ?></td>
                            <td> <button class='cart-qty' onclick="return qty_remove(<?php echo $page['prd_id'] ?>)">-</button> <?php echo $page['prd_qty'] ?> <button class="cart-qty" onclick="return qty_add(<?php echo $page['prd_id'] ?>)">+</button></td>
                            <td><?php echo $page['prd_price'] ?></td>
                            <td><?php echo $sub_total ?></td>
                            <td><button class="btn btn-success" style="background-color: #f44336;cursor:pointer;" onclick="return remove_cart(<?php echo $page['prd_id'] ?>,this)">Delete
                                </button></td>
                        </tr>
                    <?php
                    }
                    ?>
                    <?php
                    if (!empty($_SESSION['user_id'])) {
                        $user = $_SESSION['user_id'];
                    } else {
                        $user = 0;
                    }
                    $totals = mysqli_query($con, "SELECT prd_id,sum((prd_qty*prd_price)) as sub_tot from cart where u_id=" . $user . ";");
                    $sub_tot = mysqli_fetch_assoc($totals);
                    $tax = ceil(($sub_tot['sub_tot'] * 18) / 100);
                    $total = $sub_tot['sub_tot'] + $tax;
                    ?>
                    <tr>
                        <td Colspan="5"><br><br>
                            <h5>Sub TOTAL</h3>
                        </td>
                        <td class="td1">
                            <h5><?php echo number_format($sub_tot['sub_tot'], 2); ?></h5>
                        </td>
                    </tr>
                    <tr>
                        <td Colspan="5"><br><br>
                            <h5>Tax(18%)</h3>
                        </td>
                        <td class="td1">
                            <h5><?php echo number_format($tax, 2); ?></h5>
                        </td>
                    </tr>
                    <tr>
                        <td Colspan="5"><br><br>
                            <h2>TOTAL</h2>
                        </td>
                        <td class="td1">
                            <h5><?php echo number_format($total, 2); ?></h5>
                        </td>
                    </tr>

                    <tr>
                        <td Colspan="5"><button class="btn btn-success" style="background-color: #f44336;cursor:pointer;width:auto;" onclick="return clear_cart(<?php echo $sub_tot['prd_id'] ?>)">Clear Cart</button></td>
                        <td><a href="checkout.php" class="btn btn-success" style="text-decoration: none;">Checkout</button></td>
                    </tr>
                    </tr>
                <?php } ?>
            </table>
        </div>
    <?php
    }
    ?>
    </div>
    <?php
    $navigation = mysqli_query($con, 'SELECT * from page where page_name="' . $page . '"');
    while ($nav = mysqli_fetch_assoc($navigation)) {
    ?>
        <style>
            .detail-box2 {
                width: 990px;
                float: left;
                background: #FFFFFF;
                border-radius: 3px;
                -moz-border-radius: 3px;
                -webkit-border-radius: 3px;
                box-shadow: 0px 0px 2px rgb(0 0 0 / 20%);
                -webkit-box-shadow: 0px 0px 2px rgb(0 0 0 / 20%), 0 2px 2px rgb(0 0 0 / 0%) inset;
                -moz-box-shadow: 0px 0px 2px rgba(0, 0, 0, 0.2), 0 2px 2px rgba(0, 0, 0, 0) inset;
                margin: 40px 0 30px 272px;
                padding: 30px 20px 30px 20px;
            }
        </style>
        <div class="detail-box2">

            <div class="ourproduct_title">
                <h2 style="width:854px; float:left;"><?php echo $nav['page_name'] ?></h2>
            </div>
            <div class="ourproduct_main">
        <?php echo $nav['page_content'];
    }
} ?>
            </div>
        </div>
        </div>

        <?php
        require './inc/footer.php';
        ?>