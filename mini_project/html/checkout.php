<?php
        require './inc/header.php';

        if(empty($_SESSION['user_id']) || $_SESSION['login']==false){
            echo "<script>alert('Please Login to chhekout')
            window.location.href=`login.php`</script>";
        }

        $user_details=mysqli_query($con,"SELECT * from user where u_id=".$_SESSION['user_id']."");

        $details=mysqli_fetch_assoc($user_details);

?>
        <div class="content_container_login">
    <div class="detail-box-login">
        <div class="login_title" style="margin:0px 25px">
        <h2 style="width:854px; float:left;">Checkout</h2>
	    </div>
       <form method="POST" id="loginform" action="../db_operation/db_operation.php?checkout" onsubmit="return checkout()">

		<input type="text" name="username" placeholder="username" class="form-control" value="<?php echo $details['name'] ?>" id="name"><br/><br>
		<input type="number" name="number" placeholder="Phone Number" class="form-control" id="number"><br/><br>

        <textarea name="shipping_address"  onkeyup="return main_add()" placeholder="Billing Address" class="form-control" rows="5" id="shipping_add"></textarea><br><br>
        <input type="checkbox" name="" style="margin: 10px 25px;" onchange="return billing_add()"> Same As Billing Address
        <textarea name="billing_address"  placeholder="Shipping Address" class="form-control" rows="5" id="billing_add"></textarea><br><br>
        <select name="payment_method[]" class="form-control" id="payment">
            <option value="">--SELECT PAYMENT METHOD--</option>
            <option value="COD" selected>Cash On Delivery</option>
            <option value="NB">Net Banking</option>
            <option value="UPI">UPI payment</option>
        </select>
    
		<button type="submit" class="btn btn-success" id="login" name="login" style="width: auto;">Buy Now</button><button type="reset" class="btn btn-success">Clear</button></div>
		</form>
    </div>
</div>
<script>

    function main_add(){
        var address=document.getElementById('address').value;
    }

    function billing_add(){
        var read=document.getElementById('shipping_address').readOnly;
            if (read === true) {
                var read=document.getElementById('shipping_address').readOnly= false;
            } else {
                document.getElementById('shipping_address').innerHTML=document.getElementById('address').value;
                var read=document.getElementById('shipping_address').readOnly= true;
            }
    }
</script>

<?php
        require './inc/footer.php';

?>