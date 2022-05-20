<?php

require "../../partieHamouche/email.php";
require "../../partieHamouche/database.php";


include_once "config.php";


$email = mysqli_real_escape_string($conn, $_POST['email']);



$confirmationCode = random_int(111111 , 999999 ) ;

$insert_query = mysqli_query($conn, "INSERT INTO `confirmationemail` (email , confirmation) values (\"$email\" , $confirmationCode)");

if(sendConfirmationEmail($email , $confirmationCode))
echo "success";
else 
echo "failed";






?>