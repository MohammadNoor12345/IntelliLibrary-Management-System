<?php
session_start();
include("connect.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
       body{background: url("logo.jpg");
       }
       </style>
</head>
<body>
    <div style="text-align:right; padding:15%;">
      <p  style="font-size:45px; font-weight:bold; color:black;">
       Welcome  <?php 
       if(isset($_SESSION['email'])){
        $email=$_SESSION['email'];
        $query=mysqli_query($conn, "SELECT users.* FROM `users` WHERE users.email='$email'");
        while($row=mysqli_fetch_array($query)){
            echo $row['firstName'].' '.$row['lastName'];
        }
       }
       ?>
      </p>
      <a href="index.html" class="btn btn-primary btn-lg mr-3">Let's Continue</a>
      <div><br>
      <a href="logout.php" class="btn btn-secondary btn-lg">Logout</a>
    </div>
</body>
</html>
