<?php
require_once"conn.php";
if (isset($_GET['id'])) {
    $del = $_GET['id'];
    $query = "DELETE FROM issue WHERE id = $del";
    $result = mysqli_query($conn, $query); 

    if ($result) {
        header("Location: ".$_SERVER['HTTP_REFERER']);
        exit();
    } else {
        echo 'Error deleting todo from the database';
    }
} else {
    echo 'Todo ID not provided';
}
?>