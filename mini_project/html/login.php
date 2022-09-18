<?php
require './inc/header.php';
?>
<style>
</style>
<div class="content_container_login">
        <div class="detail-box-login">
                <div class="login_title" style="margin:0px 25px">
                        <h2 style="width:854px; float:left;">Login</h2>
                </div>
                <form method="POST" id="loginform" onsubmit="return logIn()" action="../db_operation/db_operation.php?login">
                        <input type="text" name="username" id="user_name" placeholder="username" class="form-control"><br /><br>
                        <input type="password" name="password" id="password" placeholder="password" class="form-control">
                        <i class="fa fa-eye" onclick="passwordVisible()" id="icon" style="    position: relative;right: 55px;"></i>
                        <div class="login_btns">
                                <button type="submit" class="btn btn-success" id="login" name="login">Login</button><button type="reset" class="btn btn-success">Clear</button>
                        </div>
                </form>
        </div>
</div>

<?php
require './inc/footer.php';
?>      