<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require 'header.php';
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src=//ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js></script>
    <script src="https://cdn.tiny.cloud/1/he3vrygi1qp5h2f5px2bl4sk65ho6db1osmox8kpdjgd7i8u/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <!-- CSS only -->
    <script src="../JS/main.js"></script>
    <title>Menu</title>
</head>

<body>
    <div class="container" style="float: right;
    width: 100%;
    margin: 100px 90px;">
        <?php
        if (isset($_GET['update'])) {
            $menu_id = $_GET['update'];
            $current_page = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `menu` where menu_id=$menu_id"));
        ?>
            <h1>Update Menu</h1>

        <?php
        } else {
        ?>
            <h1>Add menu</h1>
        <?php
        }
        ?>
        <form action="" method="POST" onsubmit="return menu()">

            <select name="menu_name[]" id="menu_name" class="form-control" multiple style="height:500px">
                <optgroup label="--Select Static Page--"></optgroup>

                <?php
                $pages = mysqli_query($con, "SELECT * from page");
                while ($page = mysqli_fetch_assoc($pages)) {
                    echo '<option value="' . $page['page_name'] . '">------' . $page['page_name'] . '</option>';
                }

                ?>
                <optgroup label="--Select Category--">--Select Category--</optgroup>

                <?php
                $pages = mysqli_query($con, "SELECT * FROM `category`");
                while ($page = mysqli_fetch_assoc($pages)) {
                    echo '<option value="' . $page['category_name'] . '">------' . $page['category_name'] . '</option>';
                }
                ?>

            </select><br>

            <select name="menu_position[]" id="position" class="form-control">
                <option value="" selected>--SELECT POSITION--</option>
                <option value="main_nav" <?php if (isset($_GET['update'])) {
                                                if ($current_page['menu_position'] == "main_nav") {
                                                    echo "selected";
                                                }
                                            } ?>>Main Navigation</option>
                <option value="sub_nav" <?php if (isset($_GET['update'])) {
                                            if ($current_page['menu_position'] == "sub_nav") {
                                                echo "selected";
                                            }
                                        } ?>>Sub Navigation</option>
                <option value="main_footer" <?php if (isset($_GET['update'])) {
                                                if ($current_page['menu_position'] == "foot_navigation") {
                                                    echo "selected";
                                                }
                                            } ?>>Foot Navigation</option>
                <option value="sub_footer" <?php if (isset($_GET['update'])) {
                                                if ($current_page['menu_position'] == "sub_foot") {
                                                    echo "selected";
                                                }
                                            } ?>>Sub Footer</option>
            </select><br>
            <button type="submit" class="btn btn-success" id="login" <?php
                                                                        if (isset($_GET['update'])) {
                                                                            echo "name=update";
                                                                        } else {
                                                                            echo "name=insert";
                                                                        }
                                                                        ?>>Update</button>
        </form>
    </div>
</body>

<?php
if (isset($_POST['insert'])) {

    $menu_position = implode(",", $_POST['menu_position']);
    $menu_name = implode(",", $_POST['menu_name']);

    $page_insert = mysqli_query($con, "INSERT INTO `menu`(`menu_name`, `menu_position`) VALUES ('$menu_name','$menu_position')");
    if ($page_insert) {
        echo '<script>swal("Menu Added", "", "Success");
                    window.location.href=`index.php?menus`</script>';
    }
}
if (isset($_POST['update'])) {
    $menu_name = implode(",", $_POST['menu_name']);
    $menu_position = implode(",", $_POST['menu_position']);

    $page_insert = mysqli_query($con, "UPDATE `menu` SET `menu_name`='$menu_name',`menu_position`='$menu_position' WHERE `menu_position`='$menu_position'");
    if ($page_insert) {
        echo '<script>swal("Menu Updated", "", "Success");
                    window.location.href=`index.php?menus`</script>';
    }
}

?>

<?php
if (isset($_GET['delete'])) {
    $menu_id = $_GET['delete'];
    $delete = mysqli_query($con, "DELETE FROM `menu` WHERE menu_id=$menu_id");

    if ($delete) {
        echo '<script>swal("Menu Deleted", "", "danger");
                    window.location.href=`index.php?menus`</script>';
    }
}
?>

</html>