<?php
$name = $_POST['name'];
$email = $_POST['email'];
$query = $_POST['query'];

//Database connection
$conn = new mysqli('localhost','root','','forms');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into contact_form(name,email,query) values(?,?,?)");
    $stmt->bind_param("sss",$name,$email,$query);
    $stmt->execute();
    echo "Registration successfully...";
    $stmt->close();
    $conn->close();
}
?>
