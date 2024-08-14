<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "motorcross";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the database exists
$db_selected = mysqli_select_db($conn, $database);

if (!$db_selected) {
    // If database does not exist, create it
    $sql = "CREATE DATABASE $database";
    if ($conn->query($sql) === TRUE) {
        echo "Database created successfully!";
    } else {
        die("Error creating database: " . $conn->error);
    }
}

// Connect to the newly created or existing database
$conn->select_db($database);
echo "Connected successfully to the database!";
// Check if the form is submitted



?>
