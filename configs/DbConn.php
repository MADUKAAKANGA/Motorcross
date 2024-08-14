<?php
$hostname = "localhost"; // Replace with your hostname
$username = "root";      // Replace with your username
$password = "";          // Replace with your password
$dbname = "motorcross";  // Replace with your database name

try {
    // Connect to the MySQL server
    $pdo = new PDO("mysql:host=$hostname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create the database if it doesn't exist
    $pdo->exec("CREATE DATABASE IF NOT EXISTS $dbname");

    // Connect to the specific database
    $pdo->exec("USE $dbname");

    // SQL statement to create the events table if it doesn't exist
    $createTableSQL = "
        CREATE TABLE IF NOT EXISTS events (
            id INT AUTO_INCREMENT PRIMARY KEY,
            event_name VARCHAR(255) NOT NULL,
            event_date DATE NOT NULL,
            location VARCHAR(255) NOT NULL,
            description TEXT,
            poster VARCHAR(255)
        )
    ";

    // Execute the SQL statement
    $pdo->exec($createTableSQL);

} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

