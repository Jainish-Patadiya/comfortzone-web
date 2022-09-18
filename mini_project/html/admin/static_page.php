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
    
    <title>Pages</title>
</head>
<body>
    <div class="container" style="float: right;
    width: 100%;
    margin: 100px 90px;">
        <?php
            if(isset($_GET['update'])){
                $page_id=$_GET['update'];
                $current_page=mysqli_fetch_assoc( mysqli_query($con,"SELECT * from page where page_id=$page_id"));
        ?>
        <h1>Update Page</h1>

        <?php
            }else{
        ?>
            <h1>Add Page</h1>
        <?php
            }
        ?>
        <form action="" method="POST" onsubmit="return static_page()">
        <input type="text" placeholder="Page name" id="page_name" name="page_name" class="form-control" value="<?php
            if(isset($_GET['update'])){
                echo $current_page['page_name'];
            }
        ?>"><br>
        <textarea cols="30" rows="10" id="page_content" name="content" name="page_content" required>
        <?php
            if(isset($_GET['update'])){
                echo $current_page['page_content'];
            }
        ?>

        </textarea><br>
        <button type="submit" class="btn btn-success" id="login"
        <?php
            if(isset($_GET['update'])){
                echo "name=update";
            }
            else{
                echo "name=insert";
            }
        ?>>Update</button>
        </form>
        </div>
</body>

<?php
            if(isset($_POST['insert'])){
                $page_name=$_POST['page_name'];
                $page_content=$_POST['content'];

                if($_POST['content']=="" || $_POST['content']==null){
                    echo '<script>swal("Please Fill out all feilds", "", "danger");
                    </script>';
                }
                else{

                $page_insert=mysqli_query($con,"INSERT INTO `page`(`page_name`, `page_content`) VALUES ('$page_name','$page_content')");
                if($page_insert){
                    echo '<script>swal("Page Added", "😀", "success");
                    window.location.href=`index.php?static_page`</script>';
                }
                else{
                    echo mysqli_error($con);
                }
            }
            }
            if(isset($_POST['update'])){
                $page_name=$_POST['page_name'];
                $page_content=$_POST['content'];

                if($_POST['content']=="" || $_POST['content']==null){
                    echo '<script>swal("Please Fill out all feilds", "", "error");
                    </script>';
                }
                else{

                $page_insert=mysqli_query($con,"UPDATE `page` SET `page_name`='$page_name',`page_content`='$page_content' WHERE page_id=$page_id");
                if($page_insert){
                    echo '<script>swal("Page update", "", "success");
                    window.location.href=`index.php?static_page`</script>';
                }
            }
            }

?>

<?php
            if(isset($_GET['delete'])){
                $page_id=$_GET['delete'];

                $delete = mysqli_query($con,"DELETE from page where page_id = $page_id");

                if($delete){
                    echo '<script>swal("Page deleted", "", "danger");
                    window.location.href=`index.php?Products`</script>';
                }
            }
?>
</html>