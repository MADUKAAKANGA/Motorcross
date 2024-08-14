<div class="topnav">
    <div class="topnav-right">
        <a href="sign_up.php">Sign Up</a>
        <a href="signin.php">Sign In</a>
    </div>
</div>

<?php
require("header.php");
require("configs/DbConn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $input_username = $_POST['username'];
    $input_password = $_POST['password'];
    
    // Prepare SQL query
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindParam(':username', $input_username);
    $stmt->execute();
    
    // Fetch user data
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if user exists and password is correct
    if ($user && password_verify($input_password, $user['password'])) {
        session_start();
        $_SESSION['username'] = $input_username;
        $_SESSION['role'] = $user['userrole'];

        if ($user['userrole'] == 'admin') {
            header("Location: admin.php");
        } else {
            header("Location: index.php");
        }
        exit();
    } else {
        echo "Invalid username or password.";
    }
}
?>

<div class="signin-form">
    <form action="signin.php" method="post">
        <h2>Sign In</h2>
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Sign In">
    </form>
</div>

<?php require("footer.php"); ?>
