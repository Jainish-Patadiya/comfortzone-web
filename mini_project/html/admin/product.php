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
                $product_id=$_GET['update'];
                $current_page=mysqli_fetch_assoc( mysqli_query($con,"SELECT * from product where product_id=$product_id"));
        ?>
        <h1>Update Product</h1>

        <?php
            }else{
        ?>
            <h1>Add Product</h1>
        <?php
            }
        ?>
        <form action="" method="POST" enctype="multipart/form-data" onsubmit="return product_validate()">
        <input class="form-control" type="file" id="mainlogo" name="product_image" style="margin: 0px auto;" 
                    onchange="Validate_image(this)" ><br>
        <input type="text" placeholder="Product name" name="product_name" id="prd_name" class="form-control" value="<?php
            if(isset($_GET['update'])){
                echo $current_page['product_name'];
            }
        ?>" ><br>
        <textarea cols="30" rows="10" name="product_desc" id="prd_desc">
        <?php
            if(isset($_GET['update'])){
                echo $current_page['product_desc'];
            }
        ?>
        </textarea><br>
        <input type="text" placeholder="Product price" id="price" name="product_price" class="form-control" value="<?php
            if(isset($_GET['update'])){
                echo $current_page['product_price'];
            }
        ?>" ><br>
        <input type="file" name="file" id="upload" style="display: none;">
        <select name="product_category[]" id="category" class="form-control" multiple >
            <option value="" selected>--SELECT CATEGORY--</option>
            <?php
                     function MainCat($parent_id){
                        global $con;                        
                        $query=mysqli_query($con,"SELECT * from category where category_parent = $parent_id");
                        while($child=mysqli_fetch_assoc($query)){
                            echo "<option value='".$child['category_name']."'>".$child['category_parent']."--".$child['category_name']."</option>";
                            MainCat($child['category_id']);
                        }
                }           
        
            $query = mysqli_query($con,"SELECT * FROM `category` where category_parent=0;");
                
                while($row=mysqli_fetch_assoc($query)){
                    echo "<option value='".$row['category_name']."'>".$row['category_parent']."--".$row['category_name']."</option>";
                    MainCat($row['category_id']);
                }
                
            ?>
        </select><br>
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
                $main_logo = $_FILES["product_image"]["name"];
                $main_size = $_FILES['product_image']['size'];
                $location = $_FILES['product_image']['tmp_name'];
                $product_name=$_POST['product_name'];
                $product_desc=$_POST['product_desc'];
                $product_price=$_POST['product_price'];
                $product_category=$_POST['product_category'];
                $categories= implode(",",$_POST['product_category']);

                
            
                $allowed =  array('jpeg', 'jpg', "png", "gif", "JPEG", "JPG", "PNG");

                $allowedExts = array("gif", "jpeg", "jpg", "png");
                $extension1 = explode(".", $_FILES["product_image"]["name"]);
                $extension = end($extension1);

                if (in_array($extension, $allowedExts)) {
                    if (!empty($main_logo) && empty($foot_logo)) {

                $page_insert=mysqli_query($con,"INSERT INTO `product`(`product_image`, `product_name`, `product_desc`, `product_price`, `product_category`) VALUES ('$main_logo','$product_name','$product_desc','$product_price','$categories')");
                if($page_insert){
                    move_uploaded_file($location, "D:/xampp/htdocs/Jainish/mini_project/html/admin/upload/$main_logo.$extension");
                    echo '<script>swal("Product Added", "😀", "success");
                    window.location.href=`index.php?Products`</script>';
                }
            }
        }
            }
            if(isset($_POST['update'])){
                $main_logo = $_FILES["product_image"]["name"];
                $main_size = $_FILES['product_image']['size'];
                $location = $_FILES['product_image']['tmp_name'];
                $product_name=$_POST['product_name'];
                $product_desc=$_POST['product_desc'];
                $product_price=$_POST['product_price'];
                $product_category=$_POST['product_category'];
                $categories= implode(",",$_POST['product_category']);

                
            
                $allowed =  array('jpeg', 'jpg', "png", "gif", "JPEG", "JPG", "PNG");

                $allowedExts = array("gif", "jpeg", "jpg", "png");
                $extension1 = explode(".", $_FILES["product_image"]["name"]);
                $extension = end($extension1);

                if (in_array($extension, $allowedExts)) {
                    if (!empty($main_logo) && empty($foot_logo)) {
                        $update = mysqli_query($con, "UPDATE `product` SET `product_image`='$main_logo',`product_name`='$product_name',`product_desc`='$product_desc',`product_price`='$product_price',`product_category`='$categories' WHERE product_id=$product_id");

                        move_uploaded_file($location, "D:/xampp/htdocs/Jainish/mini_project/html/admin/upload/$main_logo.$extension");
                        echo '<script>swal("Product Updated", "😀", "success");
                        window.location.href=`index.php?Products`</script>';
                        
                    }
            }
        }
            

?>

<?php
            if(isset($_GET['delete'])){
                $service_id=$_GET['delete'];

                $delete = mysqli_query($con,"DELETE from services where service_id = $service_id");

                if($delete){
                    echo '<script>swal("Product Deleted", "", "danger");
                    window.location.href=`index.php?Products`</script>';
                }
            }
?>
</html>