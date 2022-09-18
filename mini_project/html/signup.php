<?php
        require './inc/header.php';
?>
<script src="password.js"></script>
<div class="content_container_login">
    <div class="detail-box-login">
        <div class="login_title" style="margin:0px 25px">
        <h2 style="width:854px; float:left;">Sign Up</h2>
	    </div>
       <form method="POST" id="loginform" onsubmit="return signup()" action="../db_operation/db_operation.php?signup">
		<input type="text" name="username" id="user_name" placeholder="username" class="form-control"><br/><br>
		<input type="text" name="fname" id="fname" placeholder="Full name" class="form-control"><br/><br>
		<input type="email" name="email" id="email" placeholder="email" onkeyup="return emailvalid()" class="form-control"><br/><br>
		<p id="err_email" style="margin: -6px 0px 11px 25px;font-size: 13px;color: red;"></p>
		<input type="password" name="password" id="password" placeholder="password" class="form-control pswd">
        <i class="fa fa-eye" onclick="passwordVisible()" id="icon" style="    position: relative;right: 55px;"></i>
		<div class="progress-bar">
        <div style="background: none; border: 1px solid lightgrey;" id="one"></div>
        <div style="background: none; border: 1px solid lightgrey;" id="second"></div>
        <div style="background: none; border: 1px solid lightgrey;" id="third"></div>
        <div style="background: none; border: 1px solid lightgrey;" id="fourth"></div>
        <div style="background: none; border: 1px solid lightgrey;" id="five"></div>
    	</div>
		<div class="login_btns">
		<button type="submit" class="btn btn-success" id="login" name="login">Sign-Up</button><button type="reset" class="btn btn-success">Clear</button></div>
		</form>
    </div>
</div>
<script>
	   var password = document.getElementById('password');
        var meter=document.getElementById('progress-bar')
        password.addEventListener('input', function(){
            var val = password.value;
            var result = zxcvbn(val);
            // console.log(result.score)

            let score=result.score;
            // console.log(meter.value)
            if(val !== "") {
                if(score=='0'){
                    document.getElementById('one').style.backgroundColor = "red";
                }
                else{
                    document.getElementById('one').style.backgroundColor = "white";
                    document.getElementById('second').style.backgroundColor = "white";
                    document.getElementById('third').style.backgroundColor = "white";
                    document.getElementById('fourth').style.backgroundColor = "white";
                    document.getElementById('five').style.backgroundColor = "white";
                }
                if(score=='1'){
                    document.getElementById('one').style.backgroundColor = "#FFD700";
                    document.getElementById('second').style.backgroundColor = "#FFD700";
                }
                else{
                    document.getElementById('second').style.backgroundColor = "white";
                }
                if(score=='2'){
                    document.getElementById('one').style.backgroundColor = "yellow";
                    document.getElementById('second').style.backgroundColor = "yellow";
                    document.getElementById('third').style.backgroundColor = "yellow";
					
                }
                else{
                    document.getElementById('third').style.backgroundColor = "white";
                }
                if(score=='3'){
                    document.getElementById('one').style.backgroundColor = "blue";
                    document.getElementById('second').style.backgroundColor = "blue";
                    document.getElementById('third').style.backgroundColor = "blue";
                    document.getElementById('fourth').style.backgroundColor = "blue";
                }
                else{
                    document.getElementById('fourth').style.backgroundColor = "white";                    
                }
                if(score=='4'){
                    document.getElementById('one').style.backgroundColor = "green";
                    document.getElementById('second').style.backgroundColor = "green";
                    document.getElementById('third').style.backgroundColor = "green";
                    document.getElementById('fourth').style.backgroundColor = "green";
                    document.getElementById('five').style.backgroundColor = "green";
                }
                else{
                       document.getElementById('five').style.backgroundColor = "white";
                }

            }
            else {
                    document.getElementById('one').style.backgroundColor = "white";
                    document.getElementById('second').style.backgroundColor = "white";
                    document.getElementById('third').style.backgroundColor = "white";
                    document.getElementById('fourth').style.backgroundColor = "white";
                    document.getElementById('five').style.backgroundColor = "white";
            }
        });
</script>
<?php
        require './inc/footer.php';
?>