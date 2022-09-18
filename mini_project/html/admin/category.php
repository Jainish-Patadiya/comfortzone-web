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
                $category_id=$_GET['update'];
                $current_page=mysqli_fetch_assoc( mysqli_query($con,"SELECT * FROM `category` where category_id=$category_id"));
        ?>
        <h1>Update Category</h1>

        <?php
            }else{
        ?>
            <h1>Add Category</h1>
        <?php
            }
        ?>
        <form action="" method="POST" onsubmit="return category_validation();">
        <input type="text" placeholder="Category name" id="category_name" name="category_name" class="form-control" value="<?php
            if(isset($_GET['update'])){
                echo $current_page['category_name'];
            }
        ?>"><br>

        <input type="text" placeholder="Category Title" name="category_title" id="category_title" class="form-control" value="<?php
            if(isset($_GET['update'])){
                echo $current_page['category_title'];
            }
        ?>" ><br>
        <select name="category_parent" id="" class="form-control">
            <option value="">PARENT</option>
            <?php
                    function MainCat($parent_id){
                        global $con;                        
                        $query=mysqli_query($con,"SELECT * from category where category_parent = $parent_id");
                        while($child=mysqli_fetch_assoc($query)){
                            echo "<option value='".$child['category_id']."'>".$child['category_parent']."--".$child['category_name']."</option>";
                            MainCat($child['category_id']);
                        }
                    }
        
            $query = mysqli_query($con,"SELECT * FROM `category` where category_parent=0;");
                
                while($row=mysqli_fetch_assoc($query)){
                    echo "<option value='".$row['category_id']."'>".$row['category_parent']."--".$row['category_name']."</option>";
                    MainCat($row['category_id']);
                }
                
            ?>
        </select><br>

        <br>
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
                $category_name=$_POST['category_name'];
                $category_title=$_POST['category_title'];
                $category_parent=$_POST['category_parent'];

                $page_insert=mysqli_query($con,"INSERT INTO `category`(`category_title`, `category_name`, `category_parent`) VALUES ('$category_title','$category_name','$category_parent')");
                if($page_insert){
                    echo "Category added";
                }
            }
            if(isset($_POST['update'])){
                $category_name=$_POST['category_name'];
                $category_title=$_POST['category_title'];
                $category_parent=$_POST['category_parent'];

                $page_insert=mysqli_query($con,"UPDATE `category` SET `category_title`='$category_title',`category_name`='$category_name',`category_parent`='$category_parent' WHERE category_id=$category_id");
                if($page_insert){
                    echo "Category updated";
                }
            }

?>

<?php
            if(isset($_GET['delete'])){
                $category_id=$_GET['delete'];

                $delete = mysqli_query($con,"DELETE FROM category WHERE `category`.`category_id` = $category_id");

                if($delete){
                    echo "<script>alert('Category Deleted')
                    window.location.href=`index.php?Categories`</script>";
                }
            }
?>
</html>