<?php 
session_start();

 if(isset($_SESSION['email']))
 {
   $email = $_SESSION['email'];
 }
else{
    $email = "";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>confirmer email</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
<style>

.form form .resend input {
  height: 45px;
  border: none;
  color: #fff;
  font-size: 17px;
  background: green;
  border-radius: 5px;
  cursor: pointer;
  margin-top: 13px;
}
</style>

</head>

<body>




<div class="wrapper">
   <section class="form login">
       <header> <span id="span1">Confirmer votre compte</span></header>
            <form action="#">
                <div class="error-text"></div>
        
                <div class="field input ">
                    <label for="email">Email</label>
                    <?php echo "<input type=\"text\" name=\"email\" placeholder=\"entrer votre Email\" value = \"$email\"> " ; ?>  
                    </div>
                
                    <div class="field input ">
                    <label for="confirmation">Confirmation code</label>
                    <input type="text" name="confirmation" placeholder="entrer votre code de confirmation">  
                    </div>

                    <div class="field button">
                                <input type="submit" value="confirmer">  
                                </div>                          
                    <div class="field resend">
                                <input type="submit" value="resend email">  
                                </div>
        
            </form>
      <div class="link">Not yet signed up? <a href="../index.php">Singup now</a></div>
     </section>
    
    </div>

</body>

<script>

const form = document.querySelector(".login form"),
continueBtn = form.querySelector(".button input"),
resendBtn = form.querySelector(".resend input"),
errorText = form.querySelector(".error-text");

form.onsubmit = (e)=>{
    e.preventDefault();
}

continueBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "checkEmail.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              if(data === "success"){
                location.href="../users.php";
              }else{
                errorText.style.display = "block";
                errorText.textContent = data;
              }
          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}


resendBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "sendMail.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              if(data === "success"){
                errorText.style.display = "none";

                alert("you will recieve another email with confirmation code");
            }else{
                errorText.style.display = "block";
                errorText.textContent = data;
              }
          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}
</script>

</html>
