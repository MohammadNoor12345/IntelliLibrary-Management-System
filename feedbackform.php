<?php
$feedbackName = $_POST['feedbackName'];
$feedbackEmail = $_POST['feedbackEmail'];
$rating = $_POST['rating'];
$feedback = $_POST['feedback'];

//Database connection
$conn = new mysqli('localhost','root','','forms');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into feedback_form(feedbackName,feedbackEmail,rating,feedback) values(?,?,?,?)");
    $stmt->bind_param("ssss",$feedbackName,$feedbackEmail,$rating,$feedback);
    $stmt->execute();
    echo "Registration successfully...";
    $stmt->close();
    $conn->close();
}
?>
