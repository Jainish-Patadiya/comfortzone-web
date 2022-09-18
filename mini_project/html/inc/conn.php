<?php
            $con=mysqli_connect('localhost','root','','project');

            if( !$con){
                echo mysqli_connect_error($con);
            }
            session_start();

            setcookie('example_cookie','blahasdash',time() + (86400 * 30),'D:\xampp\htdocs\Jainish\mini_project\html\cookie');
?>