<?php
session_start();

// Check if there's a message
$message = isset($_GET['message']) ? $_GET['message'] : '';

// Rest of your login.php code goes here
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RAMSA.support</title>
    <link rel="stylesheet" href="login.css" />
  </head>

  <body>
  
  <div class="container">
       <div class="img"><!--
        <img src="pic.PNG" />-->
      </div> 
      <div class="login-container">
        <form action="session.php" method="post">
         <a href="http://www.ramsa.ma/Accueil.aspx"><img class="avator" src="Ramsa.png" /></a> 
          <div id="vam"><h2>R.A.M.S.A Services</h2>
          <div class="input-div" one>
            <div class="i">
              <i class="fas fa-user"></i>
            </div>
            <div>
              <h5>Nom</h5>
              <input class="input" type="text" name="firstname"required />
            </div>
          </div>
          <div class="input-div" two>
            <div class="i">
              <i class="fas fa-lock"></i>
            </div>
            <div>
              <h5>Prenom</h5>
              <input class="input" type="text" name="lastname" required />
            </div>
          </div>
          <div class="input-div" three>
            <div class="i">
              <i class="fas fa-lock"></i>
            </div>
            <div>
              <h5>CIN</h5>
              <input class="input" type="text" name="cin" required />
            </div>
          </div>
          <input type="submit"  class="btn" value="Connexion" /></div>
        </form>
      </div>
    </div>
    <footer>
      Copyright © 2023 - All rights reserved to Ayoub
    </footer>
    <script>
        const inputs = document.querySelectorAll(".input");

function focusFunx() {
  let parent = this.parentNode.parentNode;
  parent.classList.add("focus");
}

inputs.forEach((input) => {
  input.addEventListener("focus", focusFunx);
});
var message = "<?php echo $message; ?>";
    if (message) {
        alert(message);
    }
    </script>
 

  </body>
</html>