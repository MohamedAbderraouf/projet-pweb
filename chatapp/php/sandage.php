<?php
require "../../partieHamouche/database.php";


$userid = $_POST["userid"];
$voteid = $_POST["voteid"];
$vote   = $_POST["vote"];


$resultCheck = checkIfUserVoted($voteid , $userid);

if($resultCheck!=0 )
{
    switch ($resultCheck) {
        case 1:
            decrementYesVote($voteid);
            break;
        case 2:
            decrementNoVote($voteid);
            break;
        
        default:
            break;
    }

    
    deleteUserVote($userid , $voteid);
}
else{
    switch ($vote) {
        case 1:
               incrementYesVote($voteid);    
            break;
        case 2:
            incrementNoVote($voteid);
            break;                        
        default:
            break;            
        }

        addUserVote($voteid , $userid , $vote);
}
echo "success";



?>