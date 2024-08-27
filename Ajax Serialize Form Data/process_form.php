<?php
// Get form data
$name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
$email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
// Process form data (e.g., save to database, send email, etc.)
$response = "Received the following data:<br>";
$response .= "Name: " . $name . "<br>";
$response .= "Email: " . $email;
// Return the response
echo $response;
?>
