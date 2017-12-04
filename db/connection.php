<?php include 'header.php';?> 
<style type="text/css"> 
	h1{
		text-align:center;
		color:gray;
		font-family:aharoni;
	}
</style>
<?php


$link = mysql_connect("localhost", "root", "","db_e");

if (!$link) {
    dir('There was a problem when trying to connect to the host. Please contact Tech Support. Error: ' . mysql_error());    
}

$db_selected = mysql_select_db("db_e", $link);

if (!$link) {
    dir('There was a problem when trying to connect to the database. Please contact Tech Support. Error: ' . mysql_error());    
}

$id=$_POST['id'];
$name=$_POST['name'];




$sql = "INSERT INTO tb_emp (id, name) VALUES ('$id', '$name')";


if (!mysql_query($sql)) {
    die('Error: ' . mysql_error()); 
}
else{
echo "<h1> Data is Added";
echo "</h1>";
    echo "<br>";
    
}

?>
<?php include 'footer.php';?> 