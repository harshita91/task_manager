<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: index.php");
    exit();
}
include 'db.php';

$user_id = $_SESSION['user_id'];

if (isset($_GET['id'])) {
    $task_id = $_GET['id'];
    
    // Update the status of the task to 'Completed'
    $sql = "UPDATE tasks SET status='Completed' WHERE id=$task_id AND user_id=$user_id";

    if (mysqli_query($conn, $sql)) {
        // Redirect to the task manager page
        header("Location: home.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    header("Location: home.php");
    exit();
}
?>
