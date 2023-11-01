<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Form</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #3498db;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }

        label {
            display: block;
            margin: 10px 0;
            color: #fff;
        }

        input,
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #fff;
            border-radius: 4px;
            background-color: #fff;
            color: #333;
        }

        textarea {
            resize: vertical;
        }

        button {
            background-color: #fff;
            color: #3498db;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        /*#image{
             border: none;
             background-color:#ffffff ;
            width: 390px;
            margin-top: 40px;
            position: absolute;
            margin-left: -190px;
            height: 145px;
         
            
        }*/
 
#MiniInput{
    margin-top: 100px;
  top: 20px;
  width: 95%;
  height: 180px;
  text-align: center;
  line-height: 170px;
  font-family: Arial;

}

    </style>
</head>

<body>
    <div class="container">
        <form action="login.php">
            <input style="background-color: #3498db;" id="fog" type="file" multiple name="image[]"   accept=".jpeg,.pdf,.png,.svg"  value="Placeholder Text" >
           <div><button id="MiniInput" type="button"  onclick="document.getElementById('fog').click()">Selectioner des images</button></div> 
            <label for="local">Local</label>
            <input type="text" id="local" name="local">
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4"></textarea>
            <label for="description">Date:</label>
            <input type="datetime-local" id="date" name="date">
            <label for="phone">Telephone:</label>
            <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" >
                <label for="surname">Adresse:</label>
            <input type="text" id="adresse" name="adresse" >

            <button type="submit">Submit</button>
        </form>
    </div>
</body>
<script>$(document).ready(function(){
  $('form input').change(function () {
    $('form p').text(this.files.length + " file(s) selected");
  });
});
document.getElementById('MiniInput').addEventListener('click', 
    function(event) {
        event.preventDefault();
});
 
</script>
</html>