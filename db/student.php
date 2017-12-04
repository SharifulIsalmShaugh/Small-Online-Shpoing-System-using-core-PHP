<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "class_schedule_management_system";

$conn = new mysqli($hostname,$username,$password,$dbname);

if($conn->connect_error) {
    die("Connection Fail".$conn->connect_error);
}


$id = $_POST['id'];
$name = $_POST['name'];
$dept = $_POST['department'];
$subject = $_POST['subject'];
$contact = $_POST['contact_number'];
$email = $_POST['email_address'];

$sql = "INSERT INTO tbl_student( id,name, dept, subject_code, contact_number, email_address) VALUES($id, '$name','$dept','$subject',$contact,'$email' )";
// $dept, $subject, $contact, $email
if ($conn->query($sql) === TRUE) {
    echo "Your Information Saved successfully";
} else {
    if ($id == "" || $name == "" || $dept == "" || $subject == "" || $contact == "" || $email == "") {
         echo "Please input your values! ";
    }else {
         echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>
