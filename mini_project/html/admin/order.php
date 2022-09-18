<?php
require 'header.php';
if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $order_details = mysqli_query($con, "SELECT * FROM `orders` where order_id=$id");
        $order = mysqli_fetch_assoc($order_details);
?>
        <div class="container" style="float: right;width: 100%;margin: 100px 90px;">


                <div class="detail-box-cont">
                        <div class="ourproduct_title">
                                <h2 style="width:854px; float:left;">Order Details</h2>
                        </div>
                        <form action="" method="POST">
                                <br><br><br>
                                <label>Customer Name</label><br>
                                <label><?php echo $order['username'] ?></label><br><br>
                                <label>Products Name</label><br>
                                <label><?php echo $order['product_name'] ?></label><br><br>
                                <label>billing Address</label><br>
                                <label><?php echo $order['billing_address'] ?></label><br><br>
                                <label>Delivery Address</label><br>
                                <label><?php echo $order['shipping_address'] ?></label><br><br>
                                <label>Contact Number</label><br>
                                <label><?php echo $order['number'] ?></label><br><br>
                                <label>Payment Type</label><br>
                                <label><?php echo $order['payment_mode'] ?></label><br><br>
                                <label>Amount</label><br>
                                <label><?php echo $order['tot_ammount'] ?></label><br><br>
                                <select class="form-control" name="status[]">
                                        <option value="0">Order Placed</option>
                                        <option value="1">Order Confirmed</option>
                                        <option value="2">Reached at Your City</option>
                                        <option value="3">Order Completed</option>
                                </select><br>
                                <button class="btn btn-success" type="submit" name="update">Update</button>&nbsp;<button type="button" class="btn btn-danger">Cancel</button>
                        </form>
                </div>

        <?php
        if (isset($_POST['update'])) {
                $status = implode(",", $_POST['status']);
                $update = mysqli_query($con, "UPDATE `orders` SET `status`='$status' WHERE order_id=$id");
                if ($update) {
                        echo '<script>swal("Status Updated", "", "success");
                                         window.location.href=`index.php?orders`</script>';
                }
        }
}
        ?>