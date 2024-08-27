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
// Pagination settings
$limit = 10; // Number of records per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;

// Fetch total number of records
$sql = "SELECT COUNT(*) as total FROM your_table_name";
$result = $conn->query($sql);
$total = $result->fetch_assoc()['total'];
$total_pages = ceil($total / $limit);
// Fetch records for the current page
$sql = "SELECT * FROM your_table_name LIMIT $start, $limit";
$result = $conn->query($sql);
// Display records
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div>" . htmlspecialchars($row['name']) . " - " . htmlspecialchars($row['email']) . "</div>";
    }
} else {
    echo "No records found.";
}
// Display pagination controls
if ($total_pages > 1) {
    echo "<div class='pagination'>";
    if ($page > 1) {
        echo "<a href='#' data-page='" . ($page - 1) . "'>Previous</a>";
    }
    for ($i = 1; $i <= $total_pages; $i++) {
        echo "<a href='#' data-page='$i'>$i</a>";
    }
    if ($page < $total_pages) {
        echo "<a href='#' data-page='" . ($page + 1) . "'>Next</a>";
    }
    echo "</div>";
}
// Close connections
$conn->close();
?>
