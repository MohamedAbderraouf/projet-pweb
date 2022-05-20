<?php
session_start();

if(isset($_SESSION['unique_id']))
 {
   header("location: users.php");
 }
?>

<?php 
 include_once "header_login_index.php";
?>
<body>
<div class="wrapper">
   <section class="form login">
       <header> <span id="span1">Section Acad C</span></header>
     <form action="#">
         <div class="error-text"></div>
 
          <div class="field input ">
            <label for="email">Email</label>
            <input type="text" name="email" placeholder="entrer votre Email">  
            </div>
        
            <div class="field input ">
                <label for="motdpasse">Mot de passe</label>
                <input type="password" name="password" placeholder="entrer votre Mot de passe">  
                <i class="fas fa-eye" id="test"></i>    
            </div>
                     
        
                    <div class="field button">
                        <input type="submit" value="continuer a discuter">  
                        </div>
  
      </form>
      <div class="link">Not yet signed up? <a href="index.php">Singup now</a></div>
      <div class="link">confirm your email ? <a href="php/confirmationEmail.php">here</a></div>
     </section>
    
    </div>

    <script src="javascript/show-password.js"></script>
    <script src="javascript/login.js"></script>
</body>
</html>