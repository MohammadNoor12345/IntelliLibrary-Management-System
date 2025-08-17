<?php
// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$alt_phone = $_POST['alt_phone'];
$address = $_POST['address'];
$cod = isset($_POST['cod']) ? 1 : 0; // Check if checkbox 'cod' is checked
$terms = isset($_POST['terms']) ? 1 : 0; // Check if checkbox 'terms' is checked

// Database connection
$conn = new mysqli('localhost', 'root', '', 'forms');
// Check connection
if ($conn->connect_error) {
    die('Connection Failed: ' . mysqli_connect_error());
} else {
    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO checkout_form (name, email, phone, alt_phone, address, cod, terms) VALUES (?, ?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        die('Prepare Failed: ' . $conn->error);
    }
    $stmt->bind_param("ssssiii", $name, $email, $phone, $alt_phone, $address, $cod, $terms);

    // Execute and check for success
    if ($stmt->execute()) {
        echo "Registration successfully...";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
