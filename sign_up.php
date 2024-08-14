<?php
require "header.php"; 
require "configs/DbConn.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection code here
    include 'configs/DbConn.php'; // Update the path as needed

    // Retrieve form data
    $fullname = $_POST['fullname'];
    $email_address = $_POST['email_address'];
    $phone_number = $_POST['phone_number'];
    $username = $_POST['username'];
    $dob = $_POST['dob'];
    $password = $_POST['password'];
    $conf_password = $_POST['Conf_password'];
    $userrole = $_POST['userrole'];

    // Perform any necessary validation here
    if ($password !== $conf_password) {
        die("Passwords do not match.");
    }

    // Hash the password before storing it in the database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if the users table exists and create it if it doesn't
    $stmt = $pdo->query("SHOW TABLES LIKE 'users'");
    if ($stmt->rowCount() == 0) {
        $createTableSQL = "
            CREATE TABLE users (
                id INT AUTO_INCREMENT PRIMARY KEY,
                fullname VARCHAR(100) NOT NULL,
                email_address VARCHAR(100) NOT NULL,
                phone_number VARCHAR(20) NOT NULL,
                username VARCHAR(50) NOT NULL UNIQUE,
                dob DATE NOT NULL,
                password VARCHAR(255) NOT NULL,
                userrole VARCHAR(50) NOT NULL
            )
        ";
        $pdo->exec($createTableSQL);
        echo "Table 'users' created successfully.";
    }

    // SQL query to insert data into the database
    $sql = "INSERT INTO users (fullname, email_address, phone_number, username, dob, password, userrole) VALUES (?, ?, ?, ?, ?, ?, ?)";

    // Use prepared statements to prevent SQL injection
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$fullname, $email_address, $phone_number, $username, $dob, $hashed_password, $userrole])) {
        echo "User registered successfully!";
        header("Location: signin.php");
        exit();
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
</head>
<body>
    <div class="topnav">
        <a href="./index.php">Home</a>
        <a href="about.php">About</a>
        <div class="topnav-right">
            <a href="sign_up.php">Sign Up</a>
            <a href="signin.php">Sign In</a>
        </div>
    </div>
    <div class="registration">
        <form action="sign_up.php" method="POST">
            <h3>Register Here</h3>
            <label for="fullname">Full Name:</label><br />
            <input type="text" name="fullname" id="fullname" placeholder="Enter your name" maxlength="60" required /><br /><br />
            <label for="email_address">Email Address:</label><br />
            <input type="email" name="email_address" id="email_address" placeholder="Enter your email address" maxlength="60" /><br /><br />
            <label for="phone_number">Phone Number:</label><br />
            <input type="text" name="phone_number" id="phone_number" placeholder="Enter your phone number" maxlength="13" /><br /><br />
            <label for="username">Username:</label><br />
            <input type="text" name="username" id="username" placeholder="Enter your username" maxlength="60" /><br /><br />
            <label for="dob">Date of Birth:</label><br />
            <input type="date" name="dob" id="dob" /><br /><br />
            <label for="password">Password:</label><br />
            <input type="password" name="password" id="password" placeholder="Enter your password" /><br /><br />
            <label for="Conf_password">Confirm Password:</label><br />
            <input type="password" name="Conf_password" id="Conf_password" placeholder="Re-Enter your password" /><br /><br />
            <label for="userrole">User Role:</label><br />
            <select name="userrole" id="userrole" required>
                <option value="">--Select Role--</option>
                <option value="racer">Racer</option>
                <option value="fan">Fan</option>
                <option value="admin">Admin</option>
            </select><br /><br />
            <input type="checkbox" name="tnc" id="tnc" value="1" required />
            <label for="tnc">Accept Terms & Conditions</label><br /><br />
            <input type="submit" name="sign_up" value="Sign Up" /><br /><br />
        </form>
    </div>
    <?php require "footer.php"; ?>
</body>
</html>
