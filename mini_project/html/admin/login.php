<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login</title>
    <link rel="stylesheet" href="./css/vertical-layout-light/style.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="./JS/main.js"></script>
    <?php
    require '../inc/conn.php';
    ?>
    <style>
        body {
            background-color: #7cffcb;
            background-image: linear-gradient(315deg, #7cffcb 0%, #74f2ce 74%);
        }

        .form {
            width: 30%;
            margin: 180px auto;
            border: 1px solid white;
            background: white;
            border-radius: 10px;
            padding: 50px
        }
    </style>
</head>

<body>
            <?php 
                if(!isset($_GET['password'])){
            ?>
    <form method="post" class="form" onsubmit="return login_form()">
        
            <h1 class="mb-4 display-2"><b>Log-In Here</b></h1>
        <div class="mb-3">
            <label for="email" class="form-label">User Name</label>
            <input type="text" class="form-control" name="uname"  style="margin: 0px auto;" id="uname">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control " style="margin: 0px auto;" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-dark" name="login">Login</button>&nbsp;
        <button type="reset" class="btn btn-success" name="login">Reset</button>
    </form>
    
    <?php 
                }else{
    ?>
    
    <form method="post" class="form" onsubmit="return change_pswd()">
        
            <h1 class="mb-4 display-2" style="font-size: 45px;"><b>Change Password</b></h1>

        <div class="mb-3">
            <label for="email" class="form-label">Old Password</label>
            <input type="password" class="form-control" name="password" id="pswd" style="margin: 0px auto;">
        </div>

        
            <div class="mb-3">
                <label for="email" class="form-label">New Password:</label>
                <input type="password" class="form-control" name="pass" id="new_pass" style="margin: 0px auto;">
            </div>
        
        <div class="mb-3">
            <label for="password" class="form-label">Confirm Password</label>
            <input type="password" class="form-control " style="margin: 0px auto;" name="cpassword" id="cpass" >
        </div>
        <button type="submit" class="btn btn-dark" name="pswd">Change Password</button>&nbsp;
        <button type="reset" class="btn btn-success">Reset</button>
    </form>
    <?php } ?>
</body>

</html>

<?php
if (isset($_POST['login'])) {
    $username = $_POST['uname'];
    $password = $_POST['password'];

    $login = mysqli_query($con, 'SELECT * from user where u_name= "' . $username . '" AND password="' . md5($password) . '"');

    if (mysqli_num_rows($login) > 0) {
        while ($row = mysqli_fetch_assoc($login)) {

            $role = $row['role'];
            if ($role == 1) {
                echo "Welcome Admin";
                $_SESSION['login'] = true;
                $_SESSION['admin_id'] = $row['u_id'];
                $_SESSION['admin'] = $row['u_name'];
                echo $_SESSION['user_id'];
                unset($_SESSION['user_id']);
                unset($_SESSION['u_name']);
                header('location:index.php');
            }
            if ($role == 0) {
                echo "<script>alert('Invalid Admin Log in details')</script>";
            }
        }
    } else {
        echo "<script>alert('Invalid Log in details')</script>";
    }
}

if (isset($_POST['pswd'])) {
    $current_password = mysqli_query($con, "SELECT * FROM user where u_id=" . $_SESSION['admin_id'] . "");
    $pass = mysqli_fetch_assoc($current_password);

    $old_pass = $_POST['password'];
    $new_pass = $_POST['pass'];
    $cpass = $_POST['cpassword'];

    if (md5($old_pass) != $pass['password']) {
        echo "<script>alert('Invalid Current Password')</script>";
    } else {
        if ($new_pass != $cpass) {
            echo "<script>alert('Password Not Matched')</script>";
        } else {
            $update = mysqli_query($con, "UPDATE user set `password`='" . md5($new_pass) . "' where u_id=" . $_SESSION['admin_id'] . "");
            if ($update) {
                echo "<script>alert('Password Changed successfully')
                        window.location.href=`index.php`</script>";
            }
        }
    }
}
?>