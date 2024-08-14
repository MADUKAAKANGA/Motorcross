<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $racer_id = $_POST['racer_id'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];
    
   

    $hostname = "localhost"; // Replace with your hostname
    $username = "root";      // Replace with your username
    $password = "";          // Replace with your password
    $dbname = "motorcross";    // Replace with your database name

    try {
        // Establish the database connection
        $pdo = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare the SQL query using placeholders
        $stmt = $pdo->prepare("INSERT INTO motorcross (racer_id, fullname, email, address, dob, ) VALUES (?, ?, ?, ?, ?)");

        // Bind parameters to the prepared statement
        $stmt->bindParam(1, $racer_id);
        $stmt->bindParam(2, $fullname);
        $stmt->bindParam(3, $email);
        $stmt->bindParam(4, $address);
        $stmt->bindParam(5, $dob);
        

        // Execute the prepared statement
        if ($stmt->execute()) {
            echo "Successfully Added!";
        } else {
            echo "Error: Failed to insert data.";
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
?>