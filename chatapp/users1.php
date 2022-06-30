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
    <input type="checkbox" id="check">

    <header class="header">

     <?php 
     include_once "php/config.php";
     $sql=mysqli_query($conn,"SELECT * FROM users WHERE unique_id={$_SESSION['unique_id']}");
     if(mysqli_num_rows($sql) > 0)
     {
     $rows=mysqli_fetch_assoc($sql);
     }
     ?>

        <div class="nav">
            <div class="bar">
                <a href="#" class="logo">ACAD C WEB SITE  </a>
                <a class="k"><i class="fas fa-bars"></i></a> 
            </div>
            
            <ul class="navigation">
                <li><a id="a" href="acueil.php#acueil"> Acueil</a></li>
                <li><a id="a" href="acueil.php#Modules"> module</a></li>
                <li><a id="a" href="acueil.php#emploi"> Emploi du temp</a></li>
                <li><a id="a" href="acueil.php#lien"> Liens de cours</a></li>
                <li><a id="a" href="sandage.php"> sondage</a></li>
                <li><label for="check"><span id="chat"> chat </span></label></li>
                
            </ul>
        </div>
        
    </header>

<div class="main">
    <div class="q">
    <div class="back-text"><h2>Hello, dear student <br><span>welcome to your section site  </span> </h2><h3>All you need about your section informations</h3>
   
        <div class="social-icon">
            <a class="f" href="https://www.facebook.com/groups/174085714464172" target="_blank"><i class="fa-brands fa-facebook"></i></a>
            <a class="y" href="https://www.youtube.com/channel/UC0jmBpmm4n5yU2cImlCCpCw" target="_blank"><i class="fa-brands fa-youtube"></i></a>
            <a class="g" href="https://drive.google.com/drive/folders/1GTlibQ6JnKkpDoMq5BXXXMyEuBDLc7ct?fbclid=IwAR3aSrb8eAS163riYrK6VXEuFI0Q_x0qEzmjGJE21MIz0Pl52pdASNpAc8s" target="_blank"><i class="fa-brands fa-google-drive"></i></a>

        </div>
     

    </div>
</div>
</div>



    <div class="wrapper">
    <section class="users">
        <label for="check">
            <i class="fas fa-times" id="cancel"></i>
          </label>
      
        <header>
 
           <div class="content">
               <img src="php/images/<?php echo $rows['img'];?>" alt="">
               <div class="details">
                   <span><?php echo $rows['fname']. " ". $rows['lname']; ?></span>
                   <p><?php if($rows['stats']==1)
                   { echo "active now";} ?></p>
               </div>
           </div>      
           <a href="php/logout.php?logout_id=<?php echo $rows['unique_id'] ?>" class="logout">Logout</a>
         </header>

         <div class="search">
             <span class="text">Select an user to start a chat</span>
             <input type="text" placeholder="Enter name to search">
            <button><i class="fas fa-search"></i></button>    
        </div>
        <div class="users-list">
         
            
                   
               
        </div>
   
     </section>
    
</div>


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
                   { echo "active now";} ?></</p>
            </div>
            <a href="users.php" class="back-icon"><i class="fas fa-arrow-right"></i></a>
        </header>
        <div class="chat-box">


        </div>
        <form action="" class="typing-area" autocomplete="off">
            <input type="text" name="outgoing_id" value="<?php echo $_SESSION['unique_id'] ;?>" hidden>
            <input type="text" name="incoming_id" value="<?php echo $user_id;?>" hidden>
            <input type="text" name="message" class="input-field" placeholder="type a message here...">
         <button><i class="fab fa-telegram-plane"></i></button>
        </form>
    </section>


    </div>


    <script src="javascript/users1.js"></script>

</body>
</html>