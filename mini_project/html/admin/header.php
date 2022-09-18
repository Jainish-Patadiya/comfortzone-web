<!DOCTYPE html>
<html lang="en">
<?php
        require '../inc/conn.php';
        

        if(isset($_GET['logout'])){
          unset($_SESSION['admin_id']);
          unset($_SESSION['admin']);
          $_SESSION['login']=false;
          header('location:../index.php');
        }

        if(empty($_SESSION['admin']) || empty($_SESSION['admin_id'])){
          echo "<script>alert('Please Login FIRST')
          window.location.href=`./login.php`</script>";
        }
?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="./JS/main.js"></script>
<style>
  #pagination{
    display: block;
    padding-left: 0;
    list-style: none;
    border-radius: 8px;
    margin: 0px auto;
    text-align: center;
  }
  #pagination a{
    margin: 0px 12px;
    background-color: #34b449;
    padding: 10px;
    color: white;
    border-radius: 6px;
  }
  #pagination a:hover{
  background-color: #33a545;
  }
</style>
<script>
  function Validate_image(img)
{
      console.log(img)
      console.log(img.value)
      let file_ext=img.value;

      let ext = file_ext.substring(file_ext.lastIndexOf('.')+1);
      console.log(ext)

      let Image=/(jpg|png|jpeg)$/;

      if ( Image.exec(ext) ) {
        return true;
      }
      else
      {
        alert("Extension Not Allowed");
        img.value="";
        return false;
      }    
}
</script>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin</title>
  <style>
    .danger{
      font-size: 18px;
      margin: 0px 44px;
      background-color: #ff4444;
      color: white;
      width: 100px;
      padding: 4px 10px;
      text-align: center;
      border-radius: 7px;
    }
    .logout{
      color:white;
      text-decoration: none;
    }
  </style>
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <div class="container-scroller">
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index.php"><img src="../images/logo.png" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.php"><img src="images/logo-mini.svg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="fa fa-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="index.php?users" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon fa"></i>
              <span class="menu-title">Users</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="index.php?orders" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon fa"></i>
              <span class="menu-title">Order's</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="index.php?Products" aria-expanded="false" aria-controls="form-elements">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Products</span>              
            </a>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="index.php?Categories" aria-expanded="false" aria-controls="charts">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Categories</span>
              
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="index.php?menus" aria-expanded="false" aria-controls="tables">
              <i class="icon-grid-2 menu-icon"></i>
              <span class="menu-title">Menu's</span>
              
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="index.php?static_page" aria-expanded="false" aria-controls="icons">
              <i class="icon-contract menu-icon"></i>
              <span class="menu-title">Static Pages</span>
              
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="index.php?servies" aria-expanded="false" aria-controls="auth">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Services</span>
              
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="index.php?query" aria-expanded="false" aria-controls="auth">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Customer Query</span>
              
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="index.php?testimonials" aria-expanded="false" aria-controls="error">
              <i class="icon-ban menu-icon"></i>
              <span class="menu-title">TesitiMonials</span>
              
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?setting">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Settings</span>
            </a>
          </li>
         
            <a class="nav-link" href="index.php?setting">
              <i class="icon-paper menu-icon"></i>
            </a>
            
          </ul>
          <a href="index.php?logout" style="text-decoration: none;"><span class="danger">Logout</span></a>
      </nav>
  
    </div>
</div>