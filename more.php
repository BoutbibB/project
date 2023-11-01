<?php
require_once"conn.php";
if (isset($_GET['id'])) {
    $more = $_GET['id'];
$query = "SELECT * from issue where id = $more";
$show = mysqli_query($conn,$query); 



}
?>