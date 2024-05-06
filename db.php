<?php
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "task_manager";

// Create connection
$conn = mysqli_connect('localhost', 'root', '', 'task_manager');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
