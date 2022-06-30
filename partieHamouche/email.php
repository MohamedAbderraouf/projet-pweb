<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

require 'php_mailer/Exception.php';
require 'php_mailer/PHPMailer.php';
require 'php_mailer/SMTP.php';


#this function return NULL if the mat is not from section
#     else: returns the email
function checkIfFromSection($mat) {

    $jsonfile = file_get_contents("C:\\wamp64\\www\\sectionacadc\\partieHamouche\\util\\etudiant.json");
    $array = json_decode($jsonfile, true) ;
    for ($i=0; $i < count($array) ; $i++)
        if (strcmp($array[$i]["matricule"] , $mat) == 0) return $array[$i]["email"] ; 
    return NULL;
}


function sendConfirmationEmail($email , $confirmationCode)
{
    $mail = new PHPMailer;

    $mail->isSMTP();                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;               // Enable SMTP authentication
    $mail->Username = 'sectionacadc@gmail.com';   // SMTP username
    $mail->Password = 'sectioncacad1312';   // SMTP password
    $mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                    // TCP port to connect to

    // Sender info
    $mail->setFrom('sectionacadc@gmail.com', 'ACAD SECTION C');

    $mail->addAddress($email);

    $mail->isHTML(true);

    $mail->Subject = 'CONFIRMATION EMAIL';

    $mail->Body = '<h2 style="font-family: sans-serif;">the confirmation number is <h1 style="color: rgb(16, 224, 30);">'.$confirmationCode.'</h1> </h2>';


    // Send email 
    return $mail->send()  ;
}


?>