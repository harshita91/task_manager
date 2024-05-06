<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: index.php");
    exit();
}
include 'db.php';
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM tasks WHERE user_id=$user_id";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Task Manager</title>
</head>
<body>
    <h2>My Tasks</h2>
    <a href="add_task.php">Add Task</a><br><br>
    <table border="1">
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Action</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td><?php echo $row['created_at']; ?></td>
                <td><?php echo $row['updated_at']; ?></td>
                <td>
                    <a href="edit_task.php?id=<?php echo $row['id']; ?>">Edit</a> | 
                    <a href="complete_task.php?id=<?php echo $row['id']; ?>">Complete</a>
                    <a href="delete_task.php?id=<?php echo $row ['id'];?>">Delete</a>

                </td>
            </tr>
        <?php } ?>
    </table>
    <br>
    <a href="logout.php">Logout</a>
</body>
</html>
