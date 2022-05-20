<?php
  session_start();
  include_once "config.php";
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);


  $select_sql2 = mysqli_query($conn, "SELECT * FROM confirmationemail WHERE email = '$email';");

  if(mysqli_num_rows($select_sql2) > 0){
  
      echo "vous n'avez pas confirmer votre email";
  
  }

if(!empty($email) && !empty($password))
{ 
  $sql=mysqli_query($conn ,"SELECT * from users where email ='{$email}' AND password='{$password}' ");
   if(mysqli_num_rows($sql) > 0)
   {
    $rows=mysqli_fetch_assoc($sql);
    $stats=1;
    $sql2=mysqli_query($conn,"UPDATE users set stats={$stats} WHERE unique_id={$rows['unique_id']}");
   if($sql2){
      $_SESSION['unique_id'] = $rows['unique_id'];
      echo "success";
   }

   }else{
      echo 'Email or password incorrect';
   }


}else {
   echo 'all input are required';
}

  
?>