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
    $sql = "DELETE FROM tasks WHERE id=$task_id AND user_id=$user_id";
    if (mysqli_query($conn, $sql)) {
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