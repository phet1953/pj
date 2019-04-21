<?PHP
session_start();
session_destroy();
?>
<html lang="en-Us">
<head>
  <meta charset="utf-8">
  <title>เข้าสู่ระบ</title>
<link rel="stylesheet" href="css/log.css">
  </head>
  <br><br><br><br><br>
  <form action="login2.php" method="POST" >
    <h2><span class="entypo-login"><i class="fa fa-sign-in"></i></span>Login</h2>
    <button class="submit" name="btnSend" id="btnSend"><span class="entypo-lock"><i class="fa fa-lock"></i></span></button>
    <span class="entypo-user inputUserIcon">
     <i class="fa fa-user"></i>
   </span>
    <input type="text" name="ursername"  placeholder="ursername"/>
   <span class="entypo-key inputPassIcon">
     <i class="fa fa-key"></i>
   </span>
    <input type="password" name="password"  placeholder="password"/>
 </form>
 <script type="js/login.js"></script>
</body>

<script type="text/javascript">
		$(document).ready(function() {
			$("#btnSend").click(function() {
					var id = document.getElementById("ursername").value;
					var pass = document.getElementById("password").value;
					
					var jsonObj = {"id":id,"pw":pw}

					$.ajax({
					   type: "POST",
					   url: "login2.php",
					   data: jsonObj,
					   success: function(result) {
						if(result.status == "admin"){						
							alert(result.message);
							window.location='admininfo.php';
						}else if(result.status == "vete"){
							alert(result.message);
							window.location='veteinfo.php';
                                                }else if(result.status == "staff"){
							alert(result.message);
							window.location='staffinfo.php';        
						}else{							
							alert(result.message);
						}					
					   }
					});
			});
		});
</script>

</html>