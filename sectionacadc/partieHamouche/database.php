<?php

function connect(){

    try {
        return new PDO('mysql:host=localhost;dbname=chat', "root", "");
    
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
        return false  ; 
    }   
}

function destroy($p) { $p = NULL; }

#######################################################
#                      utilisateur                    #  
#######################################################

// ajouter utilisateur
function addUser($matricule , $username , $password , $email , $extentionPic ){
$conn = connect();

if ($conn === false) { return 0 ; }

$sqlQuery = "INSERT INTO `users`";
$sqlQuery .= "(matricule , username , password , email ) ";
$sqlQuery .= "VALUES(\"$matricule\" , \"$username\" , \"$password\" , \"$email\");";

$count = $conn->exec($sqlQuery);

destroy($conn);

return $count;
}

// verifier le login
function verifyUserAccount($matricule){
    $conn = connect();
    
    $sqlQuery = "SELECT matricule , password FROM `users`";
    $sqlQuery .= "WHERE matricule = \"$matricule\" "; 
    
    $result = $conn->query($sqlQuery)->rowCount(); 
    
    destroy($conn);
    return $result;
    }


// verifier le login
function verifyUserLogin($matricule , $password){
$conn = connect();

$sqlQuery = "SELECT matricule , password FROM `users`";
$sqlQuery .= "WHERE matricule = \"$matricule\" AND password = \"$password\"; "; 

$result = $conn->query($sqlQuery)->rowCount(); 

destroy($conn);
return $result;
}

#######################################################
#                     unsavedusers                    #  
#######################################################

function addUnsavedUser($matricule , $username , $password , $email , $confirmation ){
        $conn = connect();
        
        if ($conn === false) { return 0 ; }
        
        $sqlQuery = "INSERT INTO `unsavedusers`";
        $sqlQuery .= "(matricule , username , password , email ,confirmation) ";
        $sqlQuery .= "VALUES(\"$matricule\" , \"$username\" , \"$password\" , \"$email\" , $confirmation );";
        
        $count = $conn->exec($sqlQuery);
        
        destroy($conn);
        
        return $count;
        }

function updateConfirmationUnsavedUser($matricule , $confirmation ){
        $conn = connect();
        
        if ($conn === false) { return 0 ; }
            
        $sqlQuery = "UPDATE `unsavedusers`";
        $sqlQuery .= "SET confirmation = $confirmation where matricule = \"$matricule\";  ";
            
        $count = $conn->exec($sqlQuery);
            
        destroy($conn);
            
        return $count;
}
        


#######################################################
#                        votes                        #  
#######################################################

//ajouter un sandage 
function addVotes($voteName , $voteSubject , $choises){
    $conn = connect();

    if ($conn === false) { return 0 ; }
    
    $sqlQuery = "INSERT INTO `votes`";
    $sqlQuery .= "( votename , votesubject , choises ) ";
    $sqlQuery .= "VALUES(\"$voteName\" , \"$voteSubject\" , \"$choises\");";
    
    $count = $conn->exec($sqlQuery);
    
    destroy($conn);
    return $count;

}

// supprimer un sandage

function deleteVote($id){
    $conn = connect();

    if ($conn === false) { return 0 ; }
    
    $sqlQuery = "DELETE FROM `votes`";
    $sqlQuery .= "WHERE voteid = $id;";
    
    $count = $conn->exec($sqlQuery);
    
    destroy($conn);
    return $count;
}

#######################################################
#                  users votes                        #  
#######################################################


function incrementYesVote($voteKey)
{
    $conn = connect();

    
    if ($conn === false) { return 0 ; }
    
    $sqlQuery = "UPDATE sandage
    SET countYes = countYes + 1
    WHERE voteKey = $voteKey ; ";
    
    $count = $conn->exec($sqlQuery);
    
    destroy($conn);
    return $count;
}

function decrementYesVote($voteKey)
{
    $conn = connect();

    
    if ($conn === false) { return 0 ; }
    
    $sqlQuery = "UPDATE sandage
    SET countYes = countYes - 1
    WHERE voteKey = $voteKey ; ";

    
    $count = $conn->exec($sqlQuery);
    
    destroy($conn);
    return $count;
}
function incrementNoVote($voteKey)
{
    $conn = connect();

    
    if ($conn === false) { return 0 ; }
    
    $sqlQuery = "UPDATE sandage
    SET countNo = countNo + 1
    WHERE voteKey = $voteKey ; ";


    
    $count = $conn->exec($sqlQuery);
    
    destroy($conn);
    return $count;
}

function decrementNoVote($voteKey)
{
    $conn = connect();

    
    if ($conn === false) { return 0 ; }
    
    $sqlQuery = "UPDATE sandage
    SET countNo = countNo - 1
    WHERE voteKey = $voteKey ; ";
    
    $count = $conn->exec($sqlQuery);
    
    destroy($conn);
    return $count;
}

//ajouter un vote
function addUserVote($voteid , $userid , $vote){
    $conn = connect();

    if ($conn === false) { return 0 ; }
    
    $sqlQuery = "INSERT INTO `usersvotes`";
    $sqlQuery .= "(voteKey , userId , vote)";
    $sqlQuery .= "VALUES( $voteid , $userid , $vote);";

    
    $count = $conn->exec($sqlQuery);
    
    destroy($conn);
    return $count;
}

// supprimer un vote fait par un utilisateur
function deleteUserVote($userid , $voteid){
    $conn = connect();

    if ($conn === false) { return 0 ; }
    
    $sqlQuery = "DELETE FROM `usersvotes`";
    $sqlQuery .= "WHERE userId = $userid AND voteKey = $voteid ;";
    
    $count = $conn->exec($sqlQuery);
    
    destroy($conn);
    return $count;
}

// verifier si utilisateur a deja voter 
function checkIfUserVoted($voteKey , $userid){
    $conn = connect();

    $sqlQuery = "SELECT vote FROM `usersvotes`";
    $sqlQuery .= "WHERE voteKey = \"$voteKey\" AND userId = $userid ;"; 

    $r = $conn->query($sqlQuery);
    $result = $r->rowCount();
    if ($result == 0) {
        return 0;
    }
    destroy($conn);
    return $r->fetch()['vote'];
}

function getSandage(){
    $conn = connect();

    $sqlQuery = "SELECT * FROM `sandage`";
    $result = $conn->query($sqlQuery);

    destroy($conn);
    return $result->fetchAll();
}


// addUserVote(1 , 204337920 , 1);
// addUserVote(1 , 123 , 1);

// echo(checkIfUserVoted(1 , 123 ));

// echo("hello world");



?>