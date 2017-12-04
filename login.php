<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Printerest</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/style.css">
<link type="text/css" rel="stylesheet" href="cart_style.css">
<style>
.login {
	color:#000;
}
input {
	color:#000;
	margin-bottom:10px;
	padding:10px;
}
.middle_body {
	margin-left:200px;
	margin-top:200px;
	margin-bottom:200px;
}
</style>
</head>

<body style="background-image:url(img/gallery_1_6_94646.jpg);">
<div class="container">
<?php include("hea.php");?>
<div class="mainbody">
  <div class="row middle_body">
    <div class="login"><button type="submit">Login</button>
      <form name="" action="" method="post">
        <table width="400" border="0">
          <tr>
            <td width="150"><font style="color:#000; font-family:'Courier New', Courier, monospace; font-weight:bold; font-size:20px;">Username</font></td>
            <td width="200"><input style="border-radius:5px;" type="text" name="user" placeholder="admin" required/></td>
          </tr>
          <tr>
            <td><font style="color:#000; font-family:'Courier New', Courier, monospace;font-weight:bold; font-size:20px;">Password</font></td>
            <td><input style="border-radius:5px;" type="password" name="pass" placeholder="password" required/></td>
			
          </tr>
		  
          <?php
	  error_reporting(0);
include("config.php");
if(isset($_POST['submit']))
{
	$user=$_POST['user'];
	$pass=$_POST['pass'];


$sql="SELECT * FROM users WHERE user='$user' and pass='$pass'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1){

// Register $myusername, $mypassword and redirect to file "login_success.php"

header("location:view_order.php");
}
else {
	
echo "<font style=\"font-size:20px;\" color=\"#FF0000\">Wrong Username or Password</font>";
}
	
	
}
?>
          <tr>
            <td>&nbsp;</td>
            <td><input style="float:right; margin-right:40px; width:90px; height:40px; border:2px solid #030; background:#F00; color:#FFF; font-size:15px; border-radius:10px;"type="submit" name="submit" value="login"/></td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div>
</div>
<?php include("footer.php");?>
</body>
</html>