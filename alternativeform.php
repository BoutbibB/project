<?php
session_start();
if ( $_SESSION['authority'] !== 2) {
    // Redirect to the login page with a message
    header("Location: login.php");
    exit();
}

require_once"conn.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catchy Form</title>
    <style>
        body {  height: 100%;
            margin: 0;
            padding: 0;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
    background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
    background-size: 400% 400%;
    animation: linear-gradient 15s ease infinite;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: flex-start;
        }

        .container {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: flex-end;
            height: 70vh; /* Adjusted height */
            margin-right: 10%;
        }

        .catchy-form {
            background-color: transparent;
            padding: 20px;
            margin-top: 40px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            width: 400px;
            text-align: center;
            color: #ecf0f1;
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        input,
        textarea,
        select,
        button {
            margin-bottom: 5 px; /* Add space above each form element */
        }

        input,
        textarea {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #3498db;
            border-radius: 5px;
            background-color: transparent;
            color: #333;
            transition: background-color 0.3s, border-color 0.3s, color 0.3s, box-shadow 0.3s;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        input:focus,
        textarea:focus {
            background-color: #fff;
            border-color: #2980b9;
            color: #333;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        textarea {
            resize: vertical;
        }

        #MiniInput {
            display: grid;
        }

        label {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 15px 0;
            color: #fff;
            font-size: 18px;
        }

        button {
            background-color: #fff;
            color: #3498db;
            padding: 14px 24px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s, color 0.3s;
        }

        button:hover {
            background-color: #2980b9;
            color: #fff;
        }

        /* Custom styles for file input */
        .file-label {
            position: relative;
            display: inline-block;
            background-color: #3498db;
            color: #fff;
            padding: 14px 24px;
            border: 2px solid #2980b9;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s, transform 0.3s;
        }

        .file-button {
            display: block;
        }

        .file-label:hover {
            background-color: #2980b9;
            color: #fff;
            transform: scale(1.05);
        }
       .right-header {
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding-right: 18rem;
  }
 .right-header .name {
    font-size: 2.79rem;
  }
   .right-header .name span {
    color: mediumblue;
  }
   .right-header p {
    margin: 1.5rem 0;
    line-height: 2.5rem;
  }
  .right-header {
            margin: 20px;
            margin-right: 45px;
            padding-left: 50px;
   
        }
     
        /* Additional styling for smaller screens */
        @media screen and (max-width: 600px) {
            .catchy-form {
                width: 100%;
                justify-content: center;
                margin-right: 0;
            }

            input,
            textarea {
                width: calc(100% - 20px);
            }
        }
    </style>
</head>

<body>
   
<div class="right-header">
                <h1 class="name">
                    Salut, Monsieur <span><?php echo $_SESSION['user'][0]." ".$_SESSION['user'][1]?></span><br>
                    Ici, vous pouvez nous fournir toutes les informations dont nous avons besoin.
                </h1>
                <p>
                    
                </p> </div>
    <div class="container">
        <form action="photo.php" class="catchy-form" method="post">
           
            <label for="local">Localisation:</label>
            <input type="text" id="local" name="local" placeholder="E.g., City, Country" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" placeholder="Tell us more..."required></textarea>

            

            <label for="phone">Téléphone:</label>
            <input type="tel" id="phone" name="phone" pattern="{10}" placeholder="Enter your phone number" required>

            <label for="adresse">Adresse:</label>
            <input type="text" id="adresse" name="adresse" placeholder="Enter your address" required>

            <button type="submit">Envoyer</button>
          
        </form>
    </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            // jQuery script for file input
            $('form input[type="file"]').change(function () {
                const fileCount = this.files.length;
                const fileText = fileCount === 1 ? ' file selected' : ' files selected';
                $('#MiniInput').text(fileCount + fileText);
            });
            // Form validation
           

            // Smooth scrolling for anchor links
            $('a[href^="#"]').on('click', function (event) {
                const target = $($(this).attr('href'));
                if (target.length) {
                    event.preventDefault();
                    $('html, body').stop().animate({
                        scrollTop: target.offset().top
                    }, 1000);
                }
            });

            // Simple animation on button click
            $('button').on('click', function () {
                $(this).animate({ opacity: 0.5 }, 300, function () {
                    $(this).animate({ opacity: 1 }, 300);
                });
            });
        });

        // Function to validate the form
        function validateForm() {
            const local = $('#local').val();
            const description = $('#description').val();
            const phone = $('#phone').val();
            const adresse = $('#adresse');}
</script>
<?php
 
    
 
     
   // $sql = "INSERT INTO issue (localisation,adresse ,descript,phonenum)
  //  VALUES ('$local', '$adresse', '$description','$phone')";
   // $conn->close();

?>
</html>