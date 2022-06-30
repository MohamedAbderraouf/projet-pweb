<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup.css">
    <title>Sign up</title>
</head>
<body>

    <header>
            <div class="nav">
                <div class="bar">
                  <a class="k"><i class="fas fa-bars"></i></a> 
                </div>
            </div>
    </header>
    
    <div class="center">
                
        <h1>confirmation</h1>
        <a class="exit"><i class="fa-solid fa-xmark"></i></a>


        <form method="POST" action="" onsubmit="" autocomplete="off">

          <div class="txt_field">
            <input type="text"  required id = "confirmationId" name = "confirmationId"   >
            <span></span>
            <label>Confirmation id</label>
          </div>

          <p id = "warning"  style="color:red ;" ></p>

          
          <input type="submit" id="submit"  value="Verify">
          <div class="signup_link">
            you are a member? <a href="ind.html">Login</a>
          </div>
        </form>
    </div>
 
<?php
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password  = $_POST["password"];
        $matricule = $_POST["matricule"];
        $confirmationCode = $_POST["confirmationCode"];

        echo $username;
        echo $email;
        echo $password;
        echo $matricule;
        echo $confirmationCode;

?>
