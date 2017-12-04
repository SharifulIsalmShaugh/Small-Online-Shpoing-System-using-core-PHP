<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Aak Digital</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css">
</head>

<body style="background-image:url(img/gallery_1_6_94646.jpg);">
<?php include("hea.php");?>
<div class="mainbody">
  <h1 class="h1">All Product Order History</h1>
  <a href="login.php">
  <input style="float:right; width:100px; height:30px; background-color:#060; border:2px solid #F00; font-weight:bold; margin-bottom:10px; border-radius:10px;" type="button" value="Log Out" />
  </a>
  <?php


    $link = mysqli_connect("localhost", "root", "", "mydatabase");


    if($link === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }

  

    $sql = "SELECT * FROM orders;";

    if($result = mysqli_query($link, $sql)){

        if(mysqli_num_rows($result) > 0){

          echo " <table id=\"example\" class=\"display\" cellspacing=\"0\" width=\"100%\">";
		 echo"<thead>"; 
			echo"<tr>";
			 echo"<th>Order ID</th>"; 
			 echo"<th>OrderDate</th>"; 
			echo"<th>Name</th>";  
			echo"<th>Address</th>";  
			echo"<th>Telephone</th>"; 
			echo"<th>Email</th>";  
			
			 
			  
		   echo"</tr>";  
		   echo"</thead>"; 

                echo "</tr>";

            while($row = mysqli_fetch_array($result)){

               echo"<tr>";
			 echo"<th>".$row['OrderID']."</th>"; 
			 echo"<th>".$row['OrderDate']."</th>"; 
			echo"<th>".$row['Name']."</th>";  
			echo"<th>".$row['Address']."</th>";  
			echo"<th>".$row['Tel']."</th>";  
			echo"<th> ".$row['Email']."</th>";  
			
			
			  
		   echo"</tr>";  

            }

            echo "</table>";


            mysqli_free_result($result);

        } else{

            echo "No records matching your query were found.";

        }

    } else{

        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

    }


    mysqli_close($link);

    ?>
  <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
  <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
  <script>
  $(function(){
    $("#example").dataTable();
  })
  </script>
</div>
<?php include("footer.php");?>

</body>
</html>