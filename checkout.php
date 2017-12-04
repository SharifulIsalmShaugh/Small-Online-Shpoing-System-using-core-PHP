<?php
session_start();
?>
<html>
<head>
<title>Printerest</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
input {
	border:1px solid #000000;
	width:83%;
}
button {
	width:20% !important;
}
</style>
</head>
<body style="background-image:url(img/gallery_1_6_94646.jpg);">
<?php include("hea.php");?>
<div class="mainbody">
  <h1 class="h1">Delivary Information</h1>
  <?php

if(!isset($_SESSION["intLine"]))
{
	echo "Cart Empty";
	exit();
}

$serverName = "localhost";
$userName = "root";
$userPassword = "";
$dbName = "mydatabase";

$objCon = mysqli_connect($serverName,$userName,$userPassword,$dbName);
if (!$objCon) {
    echo $objCon->connect_error;
    exit();
}
?>
  <table class="table" width="100%"  border="1">
    <tr>
      <td width="101">ProductID</td>
      <td width="82">ProductName</td>
      <td width="82">Price</td>
      <td width="79">Quantity</td>
      <td width="79">Total</td>
    </tr>
    <?php
  $Total = 0;
  $SumTotal = 0;

  for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
  {
	  if($_SESSION["strProductID"][$i] != "")
	  {
		$strSQL = "SELECT * FROM product WHERE ProductID = '".$_SESSION["strProductID"][$i]."' ";
		$objQuery = mysqli_query($objCon,$strSQL);
		$objResult = $objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
		$Total = $_SESSION["strQty"][$i] * $objResult["Price"];
		$SumTotal = $SumTotal + $Total;
	  ?>
    <tr>
      <td><?=$_SESSION["strProductID"][$i];?></td>
      <td><?=$objResult["ProductName"];?></td>
      <td><?=$objResult["Price"];?></td>
      <td><?=$_SESSION["strQty"][$i];?></td>
      <td><?=number_format($Total,2);?></td>
    </tr>
    <?php
	  }
  }
  ?>
  </table>
  <div style="float:right; width:177; border:4px solid #030; background-color:#FFF;">Sum Total = <?php echo number_format($SumTotal,2);?></div>
  <br>
  <br>
  <form name="form1" method="post" action="save_checkout.php">
    <div class="table1">
      <table style="margin:0 auto;" width="400" border="0">
        <tr>
          <td style="width:150px; font-size:24px; height:30px;" width="71">Name</td>
          <td style="font-size:24px;">:</td>
          <td width="217"><input style="width:250px; height:30px;" type="text" name="txtName"></td>
        </tr>
        <tr>
          <td style="width:150px; font-size:24px; height:30px;">Address</td>
          <td style="font-size:24px;">:</td>
          <td><textarea style="width:250px; height:30px;" name="txtAddress"></textarea></td>
        </tr>
        <tr>
          <td style="width:150px; font-size:24px; height:30px;">Tel</td>
          <td style="font-size:24px;">:</td>
          <td><input style="width:250px; height:30px;" type="text" name="txtTel"></td>
        </tr>
        <tr>
          <td style="width:150px; font-size:24px; height:30px;">Email</td>
          <td style="font-size:24px;">:</td>
          <td><input style="width:250px; height:30px;" type="text" name="txtEmail"></td>
        </tr>
      </table>
    </div>
   <a href="show.php"> <input style="margin-left:20px;" class="button" type="button" value="Back" /></a>
    <input style="width:20% !important;" class="button" type="submit" name="Submit" value="Submit">
  </form>
  <?php
mysqli_close($objCon);
?>
</div>
<?php include("footer.php");?>

</body>
</html>
