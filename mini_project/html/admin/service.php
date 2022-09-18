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
    
    <title>Services</title>
</head>
<body>
    <div class="container" style="float: right;
    width: 100%;
    margin: 100px 90px;">
        <?php
            if(isset($_GET['update'])){
                $service_id=$_GET['update'];
                $current_page=mysqli_fetch_assoc( mysqli_query($con,"SELECT * from services where service_id=$service_id"));
        ?>
        <h1>Update Service</h1>

        <?php
            }else{
        ?>
            <h1>Add Service</h1>
        <?php
            }
        ?>
        <form action="" method="POST" onsubmit="return admin_service()">
        <input type="text" placeholder="Page name" id="service_name" name="service_name" class="form-control" value="<?php
            if(isset($_GET['update'])){
                echo $current_page['service_name'];
            }
        ?>"><br>
        <textarea cols="30" rows="10" name="service_content" id="service_content">
        <?php
            if(isset($_GET['update'])){
                echo $current_page['service_content'];
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
                $service_name=$_POST['service_name'];
                $service_content=$_POST['service_content'];

                if($_POST['service_content']=="" || $_POST['service_content']==null){
                    echo '<script>swal("Please Fill out all feilds", "", "error");
                    </script>';
                }
                else{

                $page_insert=mysqli_query($con,"INSERT INTO `services`(`service_name`, `service_content`) VALUES ('$service_name','$service_content')");
                if($page_insert){
                    echo '<script>swal("Service Added", "😀", "success");
                    window.location.href=`index.php?servies`</script>';
                }
            }
            }
            if(isset($_POST['update'])){
                $service_name=$_POST['service_name'];
                $service_content=$_POST['service_content'];

                if($_POST['service_content']=="" || $_POST['service_content']==null){
                    echo '<script>swal("Please Fill out all feilds", "", "error");
                    </script>';
                }
                else{

                $page_insert=mysqli_query($con,"UPDATE `services` SET `service_name`='$service_name',`service_content`='$service_content' WHERE service_id=$service_id");
                if($page_insert){
                    echo '<script>swal("Service Updated", "😀", "success");
                    window.location.href=`index.php?servies`</script>';
                }
            }
            }

?>

<?php
            if(isset($_GET['delete'])){
                $service_id=$_GET['delete'];

                $delete = mysqli_query($con,"DELETE from services where service_id = $service_id");

                if($delete){
                    echo '<script>swal("Service deleted", "😀", "danger");
                    window.location.href=`index.php?servies`</script>';
                }
            }
?>
</html>