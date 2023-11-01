<?php
session_start();

// Check if the user is not logged in or is not an admin
if ( $_SESSION['authority'] !== 1) {
    // Redirect to the login page with a message
    header("Location: login.php?message=Please login");
    exit();
}

// Rest of your admin.php code goes here

include_once"conn.php";
$query = "SELECT Firstname,Lastname,localisation,phonenum from issue";
$show = mysqli_query($conn,$query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gradient Table</title>
    <style>
        body {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            background: linear-gradient(#23a6d5,#23d5ab) ;
            background-size: 400% 400%;
            height: 100vh;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .table-container {
            border: 2px solid #fff; /* Border color for the container */
            border-radius: 8px; /* Border radius for the container */
            overflow: hidden;
            padding-bottom: 300px;
            width: 60%; /* Ensures the border wraps around the content */
        }
        .logo {
            position: absolute;
            max-width: 100px; /* Adjust the max-width as needed for your logo */
            left: 0;
            top: 0;

        }
        .butt{
    top: 0;
    left: 0;
    display: block;
    width: 100px;
    height: 50px;
    border-radius: 25px;
    margin: 1rem 0;
    font-size: 1.2rem;
    outline: none;
    border: none;
    background-image: linear-gradient(to right, #5557ec, #3134db, #1e2097);
    cursor: pointer;
    color: #fff;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    background-size: 200%;
    text-transform: uppercase;
    transition: 0.5s;
  }
        .butt:hover{
            background-position: right;
        }

        h2 {
            text-align: center;
            margin: 0;
            padding: 10px;
            color: #fff; /* Header text color */
            background: black; /* Transparent white background for h2 */
            border-bottom: 2px solid #fff; /* Border at the bottom of h2 */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            color: #333; /* Text color */
        }

        th, td {
            padding: 15px;
            text-align: center;
            border: 1px solid #ddd; /* Border color */
        }

        @keyframes gradientAnimation {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }
    </style>
</head>
<body>
    <form action="logout.php">
    <button class="butt" >logout</button></form>
<img src="Ramsa.png" alt="Logo" class="logo">
    <div class="table-container">
    
        <h2>Problèmes que nous avons</h2>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>Prenom</th>
                    <th>Nom</th>
                    <th>Téléphone</th>
                    <th>Localisation</th>
                    <th>Plus</th>
                    <th>Supprime</th>
                </tr>
                <tr>
                    <?php 
                    while($row = mysqli_fetch_assoc($show)){
                   ?>
                   <td><?php echo $row ["id"] ?></td>
                   <td><?php echo $row ["Firstname"] ?></td>
                   <td><?php echo $row ["Lastname"] ?></td>
                   <td><?php echo $row ["phonenum"] ?></td>
                   <td><?php echo $row ["localisation"] ?></td>
                   <td> 
                                        <a  href="editTodo.php?id=<?= $row["id"] ?>"  role="button" style="background-color: green;">more</a>
                                        <a  href="delete.php?id=<?= $row["id"] ?>"  role="button" style="background-color: red;">delete</a>
                                    </td>
                 </tr>
               <?php
                    }
                 ?>
               
            </thead>
            <tbody>
                <!-- Add your table content here -->
            </tbody>
        </table>
    </div>
</body>
</html>
