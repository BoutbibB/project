<?php
session_start();
include_once"login.php";
$cin = $_POST["cin"];
$Firstname = $_POST["firstname"];
$Lastname = $_POST["lastname"];
//    $sql = "INSERT INTO issue (Firstname, Lastname, CIN)
//    VALUES ('$name', '$lastname', '$cin')";
//    $conn->close();
$_SESSION["cin"] = $cin;
if ($_SESSION["cin"] == "J567890" ) {
    $_SESSION["authority"] = 1 ;
  }
  else {
  $_SESSION["authority"] = 2;
  }
 



if($_SESSION["authority"] == 2){
$_SESSION['user']=array("$Firstname","$Lastname");
header("location:alternativeform.php");}
else{
    header("location:admin.php ");
}


?>