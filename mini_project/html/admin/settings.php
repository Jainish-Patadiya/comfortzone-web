<?php
            require './header.php';


            if (isset($_POST['logo-update'])) {
                $main_logo = $_FILES["main-logo"]["name"];
                $main_size = $_FILES['main-logo']['size'];
                $location = $_FILES['main-logo']['tmp_name'];

                $allowed =  array('jpeg', 'jpg', "png", "gif", "JPEG", "JPG", "PNG");

                $allowedExts = array("gif", "jpeg", "jpg", "png");
                $extension1 = explode(".", $_FILES["main-logo"]["name"]);
                $extension = end($extension1);

                if (in_array($extension, $allowedExts) || in_array($foot_extension, $allowedExts)) {
                    $_SESSION['img_err'] = '';
                    if (!empty($main_logo) && empty($foot_logo)) {
                        $update = mysqli_query($con, "UPDATE `settings` SET `content`='main-logo.$extension' where name like 'logo'");

                        move_uploaded_file($location, "D:/xampp/htdocs/Jainish/mini_project/html/admin/upload/main-logo.$extension");
                        echo "<script>alert('Details updated')
                        window.location.href=`index.php?setting`</script>";
                    }
            }
        }

        if (isset($_POST['copyright-update'])) {
            $copyright=$_POST['copyright'];
            

                    $update = mysqli_query($con, "UPDATE `settings` SET `content`='$copyright' where name like 'copyright'");

                    move_uploaded_file($location, "D:/xampp/htdocs/Jainish/mini_project/html/admin/upload/main-logo.$extension");
                    echo "<script>alert('Details updated')
                    window.location.href=`index.php?setting`</script>";
                } 

            if (isset($_POST['title-update'])) {
            
            $title=$_POST['title'];

                    $update = mysqli_query($con, "UPDATE `settings` SET `content`='$title' where name like 'Title'");

                    move_uploaded_file($location, "D:/xampp/htdocs/Jainish/mini_project/html/admin/upload/main-logo.$extension");
                    echo "<script>alert('Details updated')
                    window.location.href=`index.php?setting`</script>";
                }
        ?>