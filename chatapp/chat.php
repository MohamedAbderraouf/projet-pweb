<?php 
 session_start();
 if(!isset($_SESSION['unique_id']))
 {
   header("location:login.php");
 }
?>



<?php 
 include_once "header_users.php";
?>
<body>
<div class="chat-ps">
    <section class="chat-area">
        <header>
            
     <?php 
     include_once "php/config.php";
     $user_id=mysqli_real_escape_string($conn, $_GET['user_id']);
     $sql=mysqli_query($conn,"SELECT * FROM users WHERE unique_id={$user_id}");
     if(mysqli_num_rows($sql) > 0)
     {
     $rows=mysqli_fetch_assoc($sql);
     }
     ?>
            <img src="php/images/<?php echo $rows['img'];?>" alt="">
            <div class="details">
            <span><?php echo $rows['fname']. " ". $rows['lname']; ?></span>
              <p><?php if($rows['stats']==1)
                   { echo "active now";} ?></p>
            </div>
            <a href="users.php" class="back-icon"><i class="fas fa-arrow-right"></i></a>
        </header>
        <div class="chat-box">
            <div class="chat outgoing">
                <div class="details">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.dsddddddddddddd</p>
                </div>
            </div>

            <div class="chat incoming">
                <img src="image/img.jpeg" alt="">
                <div class="details">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
            </div>
            <div class="chat outgoing">
                <div class="details">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.dsddddddddddddd</p>
                </div>
            </div>

            <div class="chat incoming">
                <img src="image/img.jpeg" alt="">
                <div class="details">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
            </div><div class="chat outgoing">
                <div class="details">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.dsddddddddddddd</p>
                </div>
            </div>

            <div class="chat incoming">
                <img src="image/img.jpeg" alt="">
                <div class="details">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
            </div><div class="chat outgoing">
                <div class="details">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.dsddddddddddddd</p>
                </div>
            </div>

            <div class="chat incoming">
                <img src="image/img.jpeg" alt="">
                <div class="details">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
            </div>
        </div>
        <form action="" class="typing-area">
            <input type="text" placeholder="type a message here...">
         <button><i class="fab fa-telegram-plane"></i></button>
        </form>
    </section>


    </div>

</body>


