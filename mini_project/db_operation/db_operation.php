<?php
            require '../html/inc/conn.php';

            if(isset($_POST['mail'])){
                $json=json_decode($_POST['mail'],true);
                $email= $json['email'];
                $count = mysqli_fetch_assoc($uname = mysqli_query($con, "SELECT * FROM `user` WHERE Email='$email';"));
    
                if($count>1){
                    $error=array('error'=>'true','message'=>'This email is already exixts');
                    $json= json_encode($error);
                    echo $json;
                }
                else{
                    $error=array('error'=>'false','message'=>'');
                    $json= json_encode($error);
                    echo $json;
                }
            }
            if(isset($_GET['contact'])){
                $name=$_POST['name'];
                $email=$_POST['email'];
                $number=$_POST['number'];
                $query=$_POST['query'];

                $insert=mysqli_query($con,"INSERT INTO `customer_queries`(`customer_name`, `cutomer_email`, `customer_number`, `query`) VALUES ('$name','$email','$number','$query')");

                if($insert){
                    echo "<script>alert('Query Sent successfully');
                    window.location.href=`../html/index.php`</script>";                    
                }
                else{
                    echo "sorry";
                }
            }
            if(isset($_GET['login'])){
                $username=$_POST['username'];
                $password=$_POST['password'];

                $login=mysqli_query($con,'SELECT * from user where u_name= "'.$username.'" AND password="'.md5($password).'"');
                
                if(mysqli_num_rows($login)>0){
                while($row=mysqli_fetch_assoc($login)){                    
                    
                    $role=$row['role'];
                    if($role==1){
                        echo "Welcome Admin";
                        $_SESSION['login']=true;
                        $_SESSION['admin_id']=$row['u_id'];
                        $_SESSION['admin']=$row['u_name'];
                        
                        unset($_SESSION['u_name']);
                        header('location:../html/admin/index.php');
                    }
                    if($role==0){                    
                        $_SESSION['login']=true;
                        $_SESSION['user_id']=$row['u_id'];
                        $_SESSION['u_name']=$row['u_name'];
                        echo "login";
                        header('location:../html/index.php');
                    }
                }
            }
                else{
                    echo "<script>alert('Invalid Log in details')
                    window.location.href=`../html/index.php`</script>";
                }
            }
            if(isset($_GET['signup'])){
                $email=$_POST['email'];
                $name=$_POST['fname'];
                $username=$_POST['username'];
                $password=$_POST['password'];

                if($email=='' || $name=='' || $username=='' || $password==''){
                    echo "Please fillUp All the details";
                }
                $count = mysqli_fetch_assoc($uname = mysqli_query($con, "SELECT * FROM `user` WHERE email='$email';"));
    
                if($count>1){
                    echo "<script>alert('This Email is Already Exists')
                    window.location.href=`../html/signup.php`;
                    </script>";
                }
                $count = mysqli_fetch_assoc($uname = mysqli_query($con, "SELECT * FROM `user` WHERE u_name='$username';"));
    
                if($count>1){
                    echo "<script>alert('This username is already taken please try another')
                    window.location.href=`../html/signup.php`;
                    </script>";
                }
                else{
                    $insert=mysqli_query($con,"INSERT INTO `user` (`u_name`, `name`, `email`, `password`) VALUES ('$username', '$name', '$email', '$password');");
                    if($insert){
                        unset($_SESSION['u_name']);
                        $_SESSION['u_name']=$name;
                        $_SESSION['login']=true;
                        header('location:../html/index.php');
                    }
                }
                }
            
            if(isset($_GET['cart'])){
                $id=$_GET['id'];                
                $product=mysqli_query($con,"SELECT * from product where product_id=$id");

                $prd=mysqli_fetch_assoc($product);
                $prd_image = $prd['product_image'];
                $prd_id = $prd['product_id'];
                $prd_name = $prd['product_name'];
                $prd_price = $prd['product_price'];

                if(!empty($_SESSION['user_id'])){
                $user=$_SESSION['user_id'];
                }
                else{
                    $user=0;
                }
                    $exist=mysqli_query($con,"SELECT prd_id,prd_qty from cart where prd_id=$prd_id AND u_id=$user");
                    $qty=mysqli_fetch_assoc($exist);

                    if($qty>1){
                        $update_qty= $qty['prd_qty']+1;
                        $update=mysqli_query($con,"UPDATE `cart` SET `prd_qty`='$update_qty' WHERE prd_id=$prd_id AND u_id=$user");
                        if($update){
                            echo "QTY added";
                        }
                    }
                    else{

                $add_cart=mysqli_query($con,"INSERT INTO `cart`(`prd_image`,`prd_id`, `prd_name`,`prd_price`, `u_id`) VALUES ('$prd_image','$prd_id','$prd_name','$prd_price','$user')");

                if($add_cart){
                    echo "product add into cart";
                }
            }
            }
            if(isset($_GET['remove_cart'])){
                $prd_id=$_GET['id'];
                if(!empty($_SESSION['user_id'])){
                    $user=$_SESSION['user_id'];
                    }
                    else{
                        $user=0;
                    }
                $delete=mysqli_query($con,"DELETE from cart where prd_id=$prd_id AND u_id=$user");

                if($delete){
                    echo "Item deleted";
                }
                else{
                    echo mysqli_error($con);
                }
            }

            if(isset($_GET['add_qty'])){

                $prd_id=$_GET['id'];
                if(!empty($_SESSION['user_id'])){
                    $user=$_SESSION['user_id'];
                    }
                    else{
                        $user=0;
                    }
                $exist=mysqli_query($con,"SELECT prd_id,prd_qty from cart where prd_id=$prd_id AND u_id=$user");
                    $qty=mysqli_fetch_assoc($exist);

                        $update_qty= $qty['prd_qty']+1;
                        $update=mysqli_query($con,"UPDATE `cart` SET `prd_qty`='$update_qty' WHERE prd_id=$prd_id AND u_id=$user");
                        if($update){
                            echo "QTY added";                        
                    }
            }

            if(isset($_GET['remove_qty'])){

                $prd_id=$_GET['id'];
                if(!empty($_SESSION['user_id'])){
                    $user=$_SESSION['user_id'];
                    }
                    else{
                        $user=0;
                    }
                $exist=mysqli_query($con,"SELECT prd_id,prd_qty from cart where prd_id=$prd_id AND u_id=$user");
                    $qty=mysqli_fetch_assoc($exist);

                    
                    if($qty['prd_qty']>1){
                        $update_qty= $qty['prd_qty']-1;
                        $update=mysqli_query($con,"UPDATE `cart` SET `prd_qty`='$update_qty' WHERE prd_id=$prd_id AND u_id=$user");
                        if($update){
                            echo "QTY Removed";                        
                    }
                }else{
                    $delete=mysqli_query($con,"DELETE from cart where prd_id=$prd_id AND u_id=$user");

                    if($delete){
                        echo "Item deleted";
                    }
                    else{
                        echo mysqli_error($con);
                    }
                }
            }

            if(isset($_GET['clear_cart'])){
                $prd_id=$_GET['id'];
                if(!empty($_SESSION['user_id'])){
                    $user=$_SESSION['user_id'];
                    }
                    else{
                        $user=0;
                    }
                $delete=mysqli_query($con,"DELETE from cart where u_id=$user");

                if($delete){
                    echo "Cart Clear";
                }
                else{
                    echo mysqli_error($con);
                }
            }
            
            if(isset($_GET['checkout'])){
                $username=$_POST['username'];
                $number=$_POST['number'];
                $shipping_address=$_POST['shipping_address'];
                $billing_address=$_POST['billing_address'];
                $user_id=$_SESSION['user_id'];
                $payment_methods=$_POST['payment_method'];
                $payment_method= implode(",",$_POST['payment_method']);
                
                // $allitems="";
                $itemname=array();
                $itemqty=array();
                $prd_data=mysqli_query($con,"SELECT prd_name,prd_qty,prd_price FROM cart where u_id=".$_SESSION['user_id']."");
                    if(mysqli_num_rows($prd_data)>0){
    
                        while($fetch_data=mysqli_fetch_assoc($prd_data)){
                        $itemname[]=$fetch_data['prd_name'];
                        $itemqty[]=$fetch_data['prd_qty'];
                        $prd_price= $fetch_data['prd_price'];
                        $totals=mysqli_query($con,"select prd_id,sum((prd_qty*prd_price)) as sub_tot from cart where u_id=".$_SESSION['user_id']."");
                        $sub_tot=mysqli_fetch_assoc($totals);
                        $tax=ceil(($sub_tot['sub_tot']*18)/100);
                        $total=$sub_tot['sub_tot']+$tax;
                        }                    
                    $product_name=implode(",", $itemname);
                    $product_qty=implode(",", $itemqty);

                    // echo $product_name;
                    // echo '<br>';
                    // echo $product_qty;
                    
                    }    
                $insert=mysqli_query($con,"INSERT INTO `orders`(`u_id`, `username`, `billing_address`, `shipping_address`, `number`, `payment_mode`, `product_name`,`product_quantity`, `tot_ammount`) VALUES ('$user_id','$username','$billing_address','$shipping_address','$number','$payment_method','$product_name','$product_qty','$total')");

                if($insert){
                    echo "<script>alert('Order placed')
                    window.location.href=`../html/index.php`</script>";
                }
                else{
                    echo mysqli_error($con);
                }
            }
?>