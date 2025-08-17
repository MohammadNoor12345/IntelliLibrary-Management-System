<?php
$suggestionName = $_POST['suggestionName'];
$suggestionEmail = $_POST['suggestionEmail'];
$suggestion = $_POST['suggestion'];

//Database connection
$conn = new mysqli('localhost','root','','forms');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into suggestion_form(suggestionName,suggestionEmail,suggestion) values(?,?,?)");
    $stmt->bind_param("sss",$suggestionName,$suggestionEmail,$suggestion);
    $stmt->execute();
    echo "Registration successfully...";
    $stmt->close();
    $conn->close();
}
?>
