<html>
<head>
<title>Aak digital</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body style="background-image:url(img/gallery_1_6_94646.jpg);">
<?php include("hea.php");?>
<div class="mainbody">
<h1 class="h1">Our Printing Items</h1>

<?php
ini_set('display_errors', 1);
error_reporting(~0);

$serverName = "localhost";
$userName = "root";
$userPassword = "";
$dbName = "mydatabase";

$objCon = mysqli_connect($serverName,$userName,$userPassword,$dbName);
if (!$objCon) {
    echo $objCon->connect_error;
    exit();
}

$strSQL = "SELECT * FROM product";
$objQuery = mysqli_query($objCon,$strSQL);
if(!$objQuery)
{
	echo $objCon->error;
	exit();
}
?>
  <?php
  while($objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC))
  {

  ?>
  <div class="product">
  <div style="width:271px; float:left;">
<img style="width:270px; height:190px; border-radius:10px;" src="img/<?php echo $objResult["Picture"];?>"></div>
<div style="width:200px; height:35px;float:left; margin-left:5px;"><h1 style="font-size:25px;"><?php echo $objResult["ProductName"];?></h1></div><br/><br/><br/>
<p style="float:left; font-family:'Times New Roman', Times, serif; font-weight:bold; margin-left:5px;">Product ID :</p>
<div style="width:100px; height:20px;float:right; padding-top:15px; margin-right:30px;"><?php echo  $objResult["ProductID"];?></div><br/><br/><br/>
<p style="float:left; font-family:'Times New Roman', Times, serif; font-weight:bold; margin-left:5px;">Price :</p>

<div style="width:100px; height:20px;float:left;margin-left:5px; padding-top:15px;"><?php echo $objResult["Price"];?></div><br/><br/>
<div style="width:100px; height:40px;float:right;"><a href="order.php?ProductID=<?php echo $objResult["ProductID"];?>"><input style="width:90px; height:30px; font-weight: bolder; font-size:18px; font-family:'Times New Roman', Times, serif; background-color:#F00; border-radius:10px; margin-top:15px; border:1px solid #030;" type="button" value="Add" /></a></div>
  </div>
  <?php
  }
  ?>

<?php
mysqli_close($objCon);
?>
</div>
<?php include("footer.php");?>

</body>
</html>

