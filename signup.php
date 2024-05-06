<?php
include 'db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    if (mysqli_query($conn, $sql)) {
        // Display a success message
        echo "You have successfully registered. Please <a href='index.php'>login</a> to continue.";
        // Redirect to the login page after a short delay
        echo "<meta http-equiv='refresh' content='5;url=index.php'>";
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
</head>
<body>
    <h2>Sign Up</h2>
    <form method="post">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="submit" value="Sign Up">
    </form>
    <p>Already have an account? <a href="index.php">Login</a></p>
</body>
</html>
