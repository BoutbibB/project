<?php
session_start();
if ( $_SESSION['authority'] !== 2) {
  // Redirect to the login page with a message
  header("Location: login.php");
  exit();
}
require_once"conn.php"; 
$Local= $_POST["local"];
 $Adresse = $_POST["adresse"];
 $Description= $_POST["description"];
 $Phone= $_POST["phone"];

  
// $sql = "INSERT INTO issue (localisation,adresse ,descript,phonenum)
//  VALUES ('$local', '$adresse', '$description','$phone')";
// $conn->close();

   
 // $sql = "INSERT INTO issue ('photo')
  //VALUE ('$photo')";
  //$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>photo</title>
    <style>
        body{
          background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
    background-size: 400% 400%;
    animation: linear-gradient 15s ease infinite;
}
form{
  position: absolute;
  top: 50%;
  left: 50%;
  margin-top: -100px;
  margin-left: -250px;
  width: 500px;
  height: 200px;
  border: 4px dashed #fff;
}
form p{
  width: 100%;
  height: 100%;
  text-align: center;
  line-height: 170px;
  color: #ffffff;
  font-family: Arial;
}
form input{
  position: absolute;
  margin: 0;
  padding: 0;
  width: 100%;
  height: 100%;
  outline: none;
  opacity: 0;
}
form button{
  margin: 0;
  color: #fff;
  background: #16a085;
  border: none;
  width: 508px;
  height: 35px;
  margin-top: -20px;
  margin-left: -4px;
  border-radius: 4px;
  border-bottom: 4px solid #117A60;
  transition: all .2s ease;
  outline: none;
}
form button:hover{
  background: transparent;
	color: lightblue;
}
form button:active{
  border:0;
}

    </style>
</head>
<body>
<form action="recu.php" method="POST">
  <input type="file" name="photo" accept=".png, .PNG, .jpg, JPG, .jpeg, .JEPG" required>
  <p>Faites glisser vos fichiers ici ou cliquez dans cette zone.</p>
  <button type="submit">Importer</button>
</form>
</body>
<script>
    $(document).ready(function(){
  $('form input').change(function () {
    $('form p').text(this.files.length + " file(s) selected");
  });
});
</script>
<?php
 
 $Local= $_POST["local"];
 $Adresse = $_POST["adresse"];
 $Description= $_POST["description"];
 $Phone= $_POST["phone"];

  
// $sql = "INSERT INTO issue (localisation,adresse ,descript,phonenum)
//  VALUES ('$local', '$adresse', '$description','$phone')";
// $conn->close();

   
 // $sql = "INSERT INTO issue ('photo')
  //VALUE ('$photo')";
  //$conn->close();
?>
</html>