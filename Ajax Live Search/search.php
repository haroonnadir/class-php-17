<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "your_database_name";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Get the search query from AJAX request
$query = $_POST['query'];
// Prepare and execute the SQL statement
$sql = $conn->prepare("SELECT * FROM your_table_name WHERE name LIKE ? OR email LIKE ?");
$searchTerm = "%".$query."%";
$sql->bind_param("ss", $searchTerm, $searchTerm);
$sql->execute();
$result = $sql->get_result();
// Display the search results
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div><strong>" . htmlspecialchars($row['name']) . "</strong> - " . htmlspecialchars($row['email']) . "</div>";
    }
} else {
    echo "No results found";
}
// Close connections
$sql->close();
$conn->close();
?>
