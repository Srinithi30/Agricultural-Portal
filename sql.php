<?php
$servername = "localhost";
$username = "root";
$password = "Tyssie@0202";
$dbname = "agriculture_portal";
$sqlFile = 'C:/Users/ROOBIKA/OneDrive/Desktop/projects/agri/agriculture-portal/db/agriculture_portal.sql';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Read SQL file
$sql = file_get_contents($sqlFile);

// Execute SQL commands
if ($conn->multi_query($sql)) {
    do {
        // Store first result set
        if ($result = $conn->store_result()) {
            // Fetch the rows
            while ($row = $result->fetch_row()) {
                // Process each row if needed
            }
            $result->free();
        }
    } while ($conn->next_result());
    echo "SQL file executed successfully";
} else {
    echo "Error executing SQL file: " . $conn->error;
}

// Close connection
$conn->close();
?>
