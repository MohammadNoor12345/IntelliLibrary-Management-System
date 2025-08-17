


<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Retrieve POST data
$suggestionName = isset($_POST['suggestionName']) ? $_POST['suggestionName'] : '';
$suggestionEmail = isset($_POST['suggestionEmail']) ? $_POST['suggestionEmail'] : '';
$suggestion = isset($_POST['suggestion']) ? $_POST['suggestion'] : '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'forms');
    if ($conn->connect_error) {
        die('Connection Failed : ' . $conn->connect_error);
    } else {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO suggestion_form (suggestionName, suggestionEmail, suggestion) VALUES (?, ?, ?)");
        if ($stmt === false) {
            die('Prepare failed: ' . $conn->error);
        }
        $stmt->bind_param("sss", $suggestionName, $suggestionEmail, $suggestion);
        if ($stmt->execute()) {
            echo "Registration successfully...";
        } else {
            echo "Error executing statement: " . $stmt->error;
        }
        $stmt->close();
        $conn->close();
    }
} else {
    echo "Form not submitted correctly.";
}
?>
