<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup.css">
    <title>Sign up</title>
    <script>
        function sub() {
          if(){
              //check if passwords are same
              
          }
          
        }
    </script>
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
                
        <h1>Signup</h1>
        <a class="exit"><i class="fa-solid fa-xmark"></i></a>


        <form method="POST" action="signup.php" onsubmit="" autocomplete="off">
          <div class="txt_field">
            <input type="text"   required  name="username" id="username"   >
            <span></span>
            <label>Username</label>
          </div>
          
          <div class="txt_field">
            <input type="email" required name="email" id="email"   >
            <span></span>
            <label>Email</label>
          </div>

          <div class="txt_field">
            <input type="text"  required name="matricule" id="matricule"    >
            <span></span>
            <label>Matricule</label>
          </div>


          <div class="txt_field">
            <input type="password"  required name="password" id="password"   >
            <span></span>
            <label>Password</label>
          </div>
          
          <div class="txt_field">
            <input type="password"  required id = "repassword" name = "repassword"   >
            <span></span>
            <label>Confirm password</label>
          </div>

          <p id = "warning"  style="color:red ;" ></p>

          
          <input type="submit" id="submit"  value="Verify">
          <div class="signup_link">
            you are a member? <a href="ind.html">Login</a>
          </div>
        </form>
    </div>
 


<?php
require '../email.php';
require '../database.php';

if($_SERVER['REQUEST_METHOD'] == "POST")
{

    main(); 
}


    function main()
    {
      if (isset($_POST['username']) and isset($_POST['email']) and isset($_POST['password']) and isset($_POST['matricule']) ) {

        $username = $_POST["username"];
        $email = $_POST["email"];
        $password  = $_POST["password"];
        $matricule = $_POST["matricule"];
        
        if(checkIfFromSection($matricule)==NULL)
        {
          ?><script>document.getElementById("warning").innerHTML = "your matricule is not registered in acad section c" ;</script><?php
          return 1;
        }
        if (verifyUserAccount($matricule) == 1) 
        {
          ?><script>document.getElementById("warning").innerHTML = "you allready have an account" ;</script><?php
          return 1;  
        }

        $confirmationCode = random_int(111111 , 999999); //this function is secure
        sendConfirmationEmail($email , $confirmationCode);

    
          $post = [
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'matricule' => $matricule,
            'confirmationCode' => $confirmationCode
          ];

          // post('localhost/acad_section_c/html/confirmation.php', $post);
        }

       
       
      }

      
      ?>




</div>
</body>
</html>