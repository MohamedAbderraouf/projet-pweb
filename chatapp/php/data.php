<?php 

while($rows=mysqli_fetch_assoc($sql))
{
  $sql2="SELECT * FROM messages WHERE (incoming_msg_id={$rows['unique_id']}
  OR outgoing_msg_id={$rows['unique_id']}) AND (outgoing_msg_id={$outgoing_id}
  OR incoming_msg_id={$outgoing_id}) ORDER BY msg_id DESC LIMIT 1" ;
  $query2=mysqli_query($conn, $sql2);
  $row2=mysqli_fetch_assoc($query2);
  if(mysqli_num_rows($query2) >0)
  {
      $result=$row2['msg'];
  }else {

    $result="No message availabale";
  }


  (strlen($result) >28) ? $msg= substr($result, 0, 28).'...' : $msg=$result;
  
  if(isset($row2['outgoing_msg_id']))
  {
    ($outgoing_id==$row2['outgoing_msg_id']) ? $you="You:" : $you="";
  }else{
    $you='';
  }

  
  ($rows['stats']==0) ? $offline="offline" : $offline="";



 $output .='<a href="users1.php?user_id='.$rows['unique_id'].'">
 <div class="content">
     <img src="php/images/'. $rows['img'] .'" alt="">
     <div class="details">
         <span class="gclr">'. $rows['fname']. " ". $rows['lname'].'</span>
         <p class="gclr">'. $you . $msg .'</p>
     </div>

 </div>
 <div class="status-dot '.$offline.'"><i class="fas fa-circle"></i></div>
 </a>';
}

?>