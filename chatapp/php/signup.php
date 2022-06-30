<?php
    session_start();
    require "../../partieHamouche/email.php";

    include_once "config.php";
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $matricule = mysqli_real_escape_string($conn, $_POST['mat']);//to replace
    if(checkIfFromSection($matricule) == NULL) 
    {    echo "matricule n'est pas de la section";
         goto end;
    }
    
    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
            if(mysqli_num_rows($sql) > 0){
                echo "$email - This email already exist!";
            }else{
                if(isset($_FILES['image'])){
                    $img_name = $_FILES['image']['name'];
                    $img_type = $_FILES['image']['type'];
                    $tmp_name = $_FILES['image']['tmp_name'];
                    
                    $img_explode = explode('.',$img_name);
                    $img_ext = end($img_explode);
    
                    $extensions = ["jpeg", "png", "jpg"];
                    if(in_array($img_ext, $extensions) === true){
                        $types = ["image/jpeg", "image/jpg", "image/png"];
                        if(in_array($img_type, $types) === true){
                            $time = time();
                            $new_img_name = $time.$img_name;
                            if(move_uploaded_file($tmp_name,"images/".$new_img_name)){
                                $ran_id = rand(time(), 100000000);
                                $status =1;
                                $encrypt_pass = $password;
                                $sql3=mysqli_query($conn,"SELECT * FROM users");
                                $user_id=mysqli_num_rows($sql3)+1;
                                $insert_query = mysqli_query($conn, "INSERT INTO users (users_id,unique_id, fname, lname, email , matricule, password, img, stats)
                                 VALUES ( {$user_id}, {$ran_id}, '{$fname}' , '{$lname}' ,  '{$email}' ,  {$matricule} , '{$encrypt_pass}', '{$new_img_name}', {$status})");
                                if($insert_query){
                                    $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                    if(mysqli_num_rows($select_sql2) > 0){
                                        $result = mysqli_fetch_assoc($select_sql2);
                                        $_SESSION['email'] = $email ;
                                        $confirmationCode = random_int(111111 , 999999 );
                                        $insert_query = mysqli_query($conn, "INSERT INTO `confirmationemail` (email , confirmation) values (\"$email\" , $confirmationCode)");
                                        sendConfirmationEmail($email , $confirmationCode);
                                        echo "success";
                                    }else{
                                        echo "This email address not Exist!";
                                    }
                                }else{
                                    echo "Something went wrong. Please try again!";
                                }
                            }else{echo 'impossible';}
                        }else{
                            echo "Please upload an image file - jpeg, png, jpg";
                        }
                    }else{
                        echo "Please select an image file - jpeg, png, jpg";
                    }
                }
            }
        }else{
            echo "$email is not a valid email!";
        }
    }else{
        echo "All input fields are required!";
    }
    end:
?>