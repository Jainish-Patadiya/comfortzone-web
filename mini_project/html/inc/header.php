<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?php
    require_once './inc/conn.php';
    ?>

    <title><?php $web_content = mysqli_query($con, "SELECT * from settings where name like 'title'");
            $content = mysqli_fetch_assoc($web_content);
            echo $content['content'] ?></title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="./JS/main.js"></script>

    <?php
    if (isset($_GET['logout'])) {
        $_SESSION['login'] = false;
        unset($_SESSION['user_id']);
        unset($_SESSION['u_name']);
        header('location:index.php');
    }

    if (!empty($_SESSION['u_name'])) {
        $current_user = mysqli_query($con, "SELECT * from user where u_name='" . $_SESSION['u_name'] . "'");
        while ($user = mysqli_fetch_assoc($current_user)) {
        }
    }
    ?>
</head>
<body>
    <div class="wrapper">
        <div class="header_main">
            <div class="header">
                <div class="logo"><a href="index.php"><img src="./admin/upload/<?php $web_content = mysqli_query($con, "SELECT * from settings where name like 'logo'");
                                                                                $content = mysqli_fetch_assoc($web_content);
                                                                                echo $content['content'] ?>" alt="not" border="0" height="83" width="238" /></a></div>
                <div class="nav_part">
                    <div class="search_main">
                        <?php
                        if (!empty($_SESSION['u_name'])) {
                        ?>
                            <div class="login">
                                <h5>
                                    <p id="greeting" style="display: inline; margin: 0px; padding: 0px; float:none;"></p> <?php echo $_SESSION['u_name'] ?>
                                </h5>
                                <a href="page.php?page=cart">My Cart</a> &nbsp;| &nbsp;<a href="page.php?logout">Logout</a>
                            </div>
                            <div class="search"><input name="" class="search-input-box" type="text" /><input name="" type="image" src="images/search-btn.png" /></div>

                        <?php
                        } else {
                        ?>
                            <div class="login"><a href="login.php">Login</a> &nbsp;| &nbsp;<a href="signup.php">Sign up</a></div>
                            <div class="search"><input name="" class="search-input-box" type="text" /><input name="" type="image" src="images/search-btn.png" /></div>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="toplink">
                        <ul>

                            <?php
                            $navigation = mysqli_query($con, 'SELECT * from menu where menu_position="main_nav"');

                            while ($nav = mysqli_fetch_assoc($navigation)) {
                                $menu_name = explode(",", $nav['menu_name']);
                                foreach ($menu_name as $menu_list) {
                                    echo '<li><a href="page.php?page=' . $menu_list . '">' . $menu_list . '</a></li>';
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>

                <div class="clear"></div>
            </div>
            <div class="navigation_main">
                <div class="navigation">
                    <ul>
                        <?php
                        $navigation = mysqli_query($con, 'SELECT * from menu where menu_position="sub_nav"');

                        while ($nav = mysqli_fetch_assoc($navigation)) {
                            $menu_name = explode(",", $nav['menu_name']);
                            foreach ($menu_name as $menu_list) {
                                echo '<li><a href="page.php?page=' . $menu_list . '">' . $menu_list . '</a></li>';
                            }
                        }
                        ?>
                    </ul>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="clear"></div>
        </div>