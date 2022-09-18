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
    
    <title>Testimonials</title>
</head>
<body>
    <div class="container" style="float: right;
    width: 100%;
    margin: 100px 90px;">
        <?php
            if(isset($_GET['update'])){
                $testimonial_id=$_GET['update'];
                $current_page=mysqli_fetch_assoc( mysqli_query($con,"SELECT * FROM `testimonial` where testimonial_id=$testimonial_id"));
        ?>
        <h1>Update Testimonials</h1>

        <?php
            }else{
        ?>
            <h1>Add Testimonials</h1>
        <?php
            }
        ?>
        <form action="" method="POST" onsubmit="return testimonial()">
        <input type="text" placeholder="Testimonial name" name="testimonial_title" id="title" class="form-control" value="<?php
            if(isset($_GET['update'])){
                echo $current_page['testimonial_title'];
            }
        ?>" ><br>
        <textarea cols="30" rows="10" name="testimonial_content" id="content">
        <?php
            if(isset($_GET['update'])){
                echo $current_page['testimonial_content'];
            }
        ?>

        </textarea><br>
        <input type="text" placeholder="Testimonial author" name="testimonial_auth" id="author" class="form-control" value="<?php
            if(isset($_GET['update'])){
                echo $current_page['testimonial_auth'];
            }
        ?>" ><br>
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
                $testimonial_title=$_POST['testimonial_title'];
                $testimonial_content=$_POST['testimonial_content'];
                $testimonial_auth=$_POST['testimonial_auth'];

                if($_POST['testimonial_content']=="" || $_POST['testimonial_content']==null){
                    echo '<script>swal("Please Fill out all feilds", "", "error");
                    </script>';
                }
                else{
                $page_insert=mysqli_query($con,"INSERT INTO `testimonial`(`testimonial_title`, `testimonial_content`, `testimonial_auth`) VALUES ('$testimonial_title','$testimonial_content','$testimonial_auth')");
                if($page_insert){
                    echo "Testimonial added";
                }
            }
            }
            if(isset($_POST['update'])){
                $testimonial_title=$_POST['testimonial_title'];
                $testimonial_content=$_POST['testimonial_content'];
                $testimonial_auth=$_POST['testimonial_auth'];
                if($_POST['testimonial_content']=="" || $_POST['testimonial_content']==null){
                    echo '<script>swal("Please Fill out all feilds", "", "error");
                    </script>';
                }
                else{
                $page_insert=mysqli_query($con,"UPDATE `testimonial` SET `testimonial_title`='$testimonial_title',`testimonial_content`='$testimonial_content',`testimonial_auth`='$testimonial_auth' WHERE testimonial_id=$testimonial_id");
                if($page_insert){
                    echo '<script>swal("Testimonial Added", "😀", "success");
                    window.location.href=`index.php?testimonials`</script>';
                }
                else{
                    echo '<script>swal("Testimonial Updated", "😀", "success");
                    window.location.href=`index.php?testimonials`</script>';
                }
            }
        }

?>

<?php
            if(isset($_GET['delete'])){
                $testimonial_id=$_GET['delete'];

                $delete = mysqli_query($con,"DELETE from testimonial where testimonial_id = $testimonial_id");

                if($delete){
                    echo '<script>swal("Testimonial Deleted", "", "danger");
                    window.location.href=`index.php?testimonials`</script>';
                }
            }
?>
</html>