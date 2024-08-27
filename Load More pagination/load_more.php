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
// Get the page number from AJAX request
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 10; // Number of records per page
$start = ($page - 1) * $limit;
// Fetch records for the current page
$sql = "SELECT * FROM your_table_name LIMIT $start, $limit";
$result = $conn->query($sql);
// Display records
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div>" . htmlspecialchars($row['name']) . " - " . htmlspecialchars($row['email']) . "</div>";
    }
} else {
    echo "<p>No more records to load.</p>";
}
// Close connections
$conn->close();
?>
