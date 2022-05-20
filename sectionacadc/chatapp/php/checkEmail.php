<?php
session_start();
include_once "config.php";

$email = mysqli_real_escape_string($conn, $_POST['email']);
$confirmation = mysqli_real_escape_string($conn, $_POST['confirmation']);



$select_sql2 = mysqli_query($conn, "SELECT * FROM confirmationemail WHERE email = '$email' and confirmation = $confirmation ;");



if(mysqli_num_rows($select_sql2) > 0){



    $select_s = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
    if(mysqli_num_rows($select_s) > 0){
        $result = mysqli_fetch_assoc($select_s);
        $_SESSION['unique_id'] = $result['unique_id'];
    }
    $select_s = mysqli_query($conn, "DELETE FROM confirmationemail WHERE email = '{$email}'");
        echo "success";

}else{
    echo "wrong code";
}






?>