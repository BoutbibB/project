<?php  

  session_start();
  $todos = isset( $_SESSION["newArray"] ) ? $_SESSION['newArray'] : [] ;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

    <?php include("./data.php") ;?>

    <div class="d-flex ">
        <div class="container  p-0">
            <form method="post" class="d-flex flex-column justify-content-center align-items-center vh-100" >

                <div class="border border-2 border-secondary rounded-5 p-5 w-50">
                <?php

                    if ( isset($_POST['add']) === true ) :

                        $id = $_POST["id"];
                        $iduser = $_POST["iduser"];
                        $description= $_POST["description"];

                        // echo('<pre>');
                        // var_dump($completed);
                        // echo('</pre>');

                        if ( !empty( $id ) && !empty( $iduser  )  && !empty( $description ) ) {
                            $newarr = [
                                "id"=>$id,
                                "idUser"=>$iduser,
                                "completed"=>false,
                                "description"=>$description,
                            ];
                            
                            array_push($todos,$newarr); 
                            $_SESSION["newArray"] = $todos;


                        } else {
                ?>
                            <div class="alert alert-danger text-center" role="alert">
                                tous les champs sont requis !!
                            </div>
                            
                <?php
                        }
                    endif;
                ?>
                        <div class="mb-3">
                            <label  class="form-label">id</label>
                            <input type="text" class="form-control"  aria-describedby="emailHelp" name="id" > 
                        </div>

                        <div class="mb-3">
                            <label  class="form-label" >idUser</label>
                            <input type="text" name="iduser" class="form-control" >
                        </div>

                        <div class="mb-3">
                            <label  class="form-label" >description</label>
                            <input type="text" name="description" class="form-control" >
                        </div>
                                    
                        <input type="submit" value="add" class="btn bg-primary w-100" name="add" >

                </div>

            </form>
        </div>

        <div class="container my-5 pt-4">
                
                <table class="table border border-primary  rounded  ">
                    <thead  >
                        <tr>
                            <th scope="col" class="text-center bg-primary text-white" >       id               </th>
                            <th scope="col" class="text-center bg-primary text-white" >       idUser           </th>
                            <th scope="col" class="text-center bg-primary text-white" >       completed        </th>
                            <th scope="col" class="text-center bg-primary text-white" >       description      </th>
                            <th scope="col" class="text-center bg-primary text-white" >       Action           </th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">

                        
                            <?php foreach( $todos as $todo ): ?>
                                <tr>
                                    <td class="text-center" > <?= $todo["id"]                            ?> </td>
                                    <td class="text-center" > <?= $todo["idUser"]                        ?> </td>
                                    <td class="text-center" > <?= $todo["completed"] ? "✔" : "❌"       ?> </td>
                                    <td class="text-center" > <?= $todo["description"]                   ?> </td>
                                    <td class="text-center" > 
                                        <a class="btn btn-success" href="editTodo.php?id=<?= $todo["id"] ?>"  role="button">MODIFIER</a>
                                        <a class="btn btn-danger" href="deleteTodo.php?id=<?= $todo["id"] ?>"  role="button">SUPPRIMER</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        
                                
                    </tbody>

                </table>
        </div>


    </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
