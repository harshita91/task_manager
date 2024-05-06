
<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: index.php");
    exit();
}
include 'db.php';
$user_id = $_SESSION['user_id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['id'])) {
    $task_id = $_GET['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $sql = "UPDATE tasks SET title='$title', description='$description' WHERE id=$task_id AND user_id=$user_id";
    if (mysqli_query($conn, $sql)) {
        header("Location: home.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} elseif (isset($_GET['id'])) {
    $task_id = $_GET['id'];
    $sql = "SELECT * FROM tasks WHERE id=$task_id AND user_id=$user_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: home.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
</head>
<body>
    <h2>Edit Task</h2>
    <form method="post">
        <input type="text" name="title" placeholder="Title" value="<?php echo $row['title']; ?>" required><br>
        <textarea name="description" placeholder="Description" required><?php echo $row['description']; ?></textarea><br>
        <input type="submit" value="Update Task">
    </form>
</body>
</html>
 