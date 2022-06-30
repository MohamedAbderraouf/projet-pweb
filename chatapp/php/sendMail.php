<?php

require "../../partieHamouche/email.php";
require "../../partieHamouche/database.php";


include_once "config.php";


$email = mysqli_real_escape_string($conn, $_POST['email']);


$select_sql2 = mysqli_query($conn, "SELECT * FROM confirmationemail WHERE email = '$email';");



if(mysqli_num_rows($select_sql2) == 0){

    $select_s = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
    if(mysqli_num_rows($select_s) > 0){
        echo "ce compte est confirmer";
        goto end;
    }
    else
    {
        echo "ce compte n'exist pas";
        goto end; 
    }
}


$confirmationCode = random_int(111111 , 999999 ) ;

$insert_query = mysqli_query($conn, "UPDATE `confirmationemail` SET confirmation = $confirmationCode  WHERE email = \"$email\" ;");

if(sendConfirmationEmail($email , $confirmationCode))
echo "success";
else 
echo "failed to send confirmation";

end:




?>