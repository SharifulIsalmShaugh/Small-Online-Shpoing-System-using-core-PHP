<?php
session_start();
?>
<html>
<head>
<title>Aak Digital</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body style="background-image:url(img/gallery_1_6_94646.jpg);">
<?php include("hea.php");?>
<div class="mainbody">
<h1 class="h1">Order List</h1>
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
<table class="table" width="980"  border="4">
  <tr>
    <td width="101">ProductID</td>
    <td width="82">ProductName</td>
    <td width="82">Price</td>
    <td width="79">Quantity</td>
    <td width="79">Total</td>
    <td width="10">Delet</td>
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
		<td><a href="delete.php?Line=<?=$i;?>">x</a></td>
	  </tr>
	  <?php
	  }
  }
  ?>
</table>
<div class="total">
Sum Total = <?php echo number_format($SumTotal,2);?></div>
<br><br><a href="product.php"><input style="width:150px; height:40px; background-color: #090; border:2px solid #030; font-weight:bold; margin-left:10px; font-size:19px;" type="button" value="Add another" /></a>
<?php
	if($SumTotal > 0)
	{
?>
	| <a href="checkout.php"> <input style=" float:right; margin-right:10px;width:150px; height:40px; background-color: #F00; border:2px solid #030; font-weight:bold; margin-left:10px; font-size:19px;" type="button" value="Order" /></a>
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
