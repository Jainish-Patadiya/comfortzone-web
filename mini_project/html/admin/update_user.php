<?php
        require '../inc/conn.php';
        require 'header.php';

        if(isset($_GET['delete'])){
            $id=$_GET['delete'];
            
            $delete=mysqli_query($con,'delete from user where u_id='.$id.'');
            if($delete){
                echo '<script>swal("User Deleted", "", "danger");
                window.location.href=`index.php?users`</script>';
            }
        }
        if(isset($_GET['update'])){
            $id=$_GET['update'];
            $update_details=mysqli_query($con,'SELECT * from user where u_id='.$id.'');
            $row=mysqli_fetch_assoc($update_details);
        }
?>

<style>
    form{
        width: 50%;
        margin: 0px auto;
        text-align: center;
    }
</style>
<div class="main-panel">
<div class="content_container_login">
    <div class="detail-box-login">
        <div class="login_title">
        <?php
            if(isset($_GET['update'])){
                $testimonial_id=$_GET['update'];
                $current_page=mysqli_fetch_assoc( mysqli_query($con,"SELECT * FROM `testimonial` where testimonial_id=$testimonial_id"));
        ?>
        <h2 style="font-size: 2.187rem;margin: 35px auto;text-align: center;">Update Details</h2>
        <?php
            }else{
        ?>
            <h2 style="font-size: 2.187rem;margin: 35px auto;text-align: center;">Add User</h2>
        <?php
            }
        ?>
        
	    </div>
        <form method="POST" id="loginform" onsubmit="return signup()" action="">
		<input type="text" name="username" id="user_name" placeholder="username" class="form-control" value="<?php if(isset($_GET['update'])){ echo $row['u_name']; }?>" ><br/><br>
		<input type="text" name="fname" id="fname" placeholder="Full name" class="form-control" value="<?php if(isset($_GET['update'])){echo $row['name']; }?>" ><br/><br>
		<input type="text" name="email" id="email" placeholder="email" class="form-control" value="<?php if(isset($_GET['update'])){echo $row['email']; }?>" ><br/><br>
		<input type="password" name="password" id="pswd" placeholder="password" class="form-control" value="<?php if(isset($_GET['update'])){echo $row['password'];}?>" ><br><br>
        
        <select name="role[]" id="role" class="form-control">
            <option value="" selected>-- SELECT ROLE --</option>
            <option value="0">Web User</option>
            <option value="1">Admin</option>
        </select>
		<div class="login_btns"><br>
		<button type="submit" class="btn btn-success" id="login"  <?php
            if(isset($_GET['update'])){
                echo "name=update";
            }
            else{
                echo "name=insert";
            }
        ?>>Update</button>&nbsp;<button type="reset" class="btn btn-success">Clear</button></div>
		</form>
    </div>
</div>
</div>

<?php   

            if(isset($_POST['update'])){
            $uname=$_POST['username'];
            $name=$_POST['fname'];
            $email=$_POST['email'];
            $pass=$_POST['password'];
            $role=implode(",",$_POST['role']);

            if($email=='' || $name=='' || $uname=='' || $pass==''){
                echo "Please fillUp All the details";
            }else{
            $update=mysqli_query($con,"UPDATE `user` SET `u_name`='$uname',`name`='$name',`email`='$email',`password`='".md5($pass)."',`role`='$role' WHERE u_id=$id");

            if($update){
                echo '<script>swal("User detail updated", "😀", "success");
                    window.location.href=`index.php?users`</script>';
            }
            else{
                echo mysqli_error($con);
            }
        }
        }
        if(isset($_POST['insert'])){
            $uname=$_POST['username'];
            $name=$_POST['fname'];
            $email=$_POST['email'];
            $pass=$_POST['password'];
            $role=implode(",",$_POST['role']);

                if($email=='' || $name=='' || $username=='' || $password=='' || $role==""){
                    echo '<script>swal("Please Fill up all the details", "😀", "error");
                    window.location.href=`index.php?users`</script>';
                }
                $count = mysqli_fetch_assoc($uname = mysqli_query($con, "SELECT * FROM `user` WHERE email='$email';"));
    
                if($count>1){
                    echo '<script>swal("This email is already exixts please try another", "😀", "error");
                    window.location.href=`index.php?users`</script>';
                }
                $count = mysqli_fetch_assoc($uname = mysqli_query($con, "SELECT * FROM `user` WHERE u_name='$username';"));
    
                if($count>1){
                    echo '<script>swal("This User name is taken please try another", "😀", "error");
                    window.location.href=`index.php?users`</script>';
                }
                else{
                    $insert=mysqli_query($con,"INSERT INTO `user` (`u_name`, `name`, `email`, `password`,`role`) VALUES ('$username', '$name', '$email', '".md5($pass)."','$role');");
                    if($insert){
                        echo '<script>swal("Account Created", "😀", "success");
                        window.location.href=`index.php?users`</script>';
                    }
                }
        }
    

?>