<?php 
 session_start();
 if(!isset($_SESSION['unique_id']))
 {
   header("location:login.php");
 }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ds.css">
    <link rel="stylesheet" href="radio.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <title>Acad c web site</title>
</head>
<body>
    <header>
        <div class="nav">
            <div class="bar">
                <a href="#" class="logo">ACAD C WEB SITE  </a>
               <a class="k"><i class="fas fa-bars"></i></a> 
            </div>
            
            <ul class="navigation">
                <li><a href="#acueil"> Acueil</a></li>
                <li><a href="#Modules"> module</a></li>
                <li><a href="#emploi"> Emploi du temp</a></li>
                <li><a href="#lien"> Liens de cours</a></li>
                <li><a href="http://localhost/sectionacadc/chatapp/sandage.php"> Sandage</a></li>
                <li><a href="http://localhost/sectionacadc/chatapp/users.php"> Chat</a></li>

                
                
                
            </ul>
        </div>
        
    </header>
    <section class="main" id="acueil">
        <div class="q">
            <div><h2>Hello, dear student <br><span>welcome to your section site  </span> </h2>
                <h3>All you need about your section informations</h3>
                <a  class="login-button" id="login-button" href="#">Login</a>
                <a  class="login-button1" id="login-button1" href="singup.html">Register</a>
            </div>
            
            <div class="social-icon">
                <a class="f" href="https://www.facebook.com/groups/174085714464172" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                <a class="y" href="https://www.youtube.com/channel/UC0jmBpmm4n5yU2cImlCCpCw" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                <a class="g" href="https://drive.google.com/drive/folders/1GTlibQ6JnKkpDoMq5BXXXMyEuBDLc7ct?fbclid=IwAR3aSrb8eAS163riYrK6VXEuFI0Q_x0qEzmjGJE21MIz0Pl52pdASNpAc8s" target="_blank"><i class="fa-brands fa-google-drive"></i></a>

            </div>

        </div>



    </section>
    <section class="cards" id="Modules" >
        <h2 class="title"> Our Modules</h2>
        <div class="content">

           
            <div class="card">
                <div class="icon">
                    <i class="fa-solid fa-laptop-code"></i>
                </div>
                <div class="info">
                    <h3>Web development</h3>
                    <p>build a complte web site using different languages like HTML CSS JAVASCRIPT PHP </p>
                </div>
            </div>
            <div class="card">
                <div class="icon">
                    <i class="fa-solid fa-network-wired"></i>
                </div>
                <div class="info">
                    <h3>Semantic web</h3>
                    <p>aims to facilitate the explotation of structured data , to give a meaning to the content of Web pages. </p>
                </div>
            </div>
            <div class="card">
                <div class="icon">
                    <i class="fa-solid fa-folder-tree"></i>
                </div>
                <div class="info">
                    <h3>Structured documents </h3>
                    <p>We learn the structure of an XML document . </p>
                </div>
            </div>
            <div class="card">
                <div class="icon">
                    <i class="fa-solid fa-server"></i>
                </div>
                <div class="info">
                    <h3>Clients-serveur administration </h3>
                    <p>The architecture of the Clients/serveur model . </p>
                </div>
            </div>

            
        </div>

    </section>
    <section class="emploi" id="emploi">
        <div class="titl">
            <h2>EMPLOI DU TEMP</h2>
        </div>
        <div class="container">
            <div class="imag_emploi">
                <img src="Annotation 2022-04-19 033215.png"  id="imag_emploi" alt="" width="1000px">  
            </div>
                    <div class="prev">
                        <a class="prev-btn">
                            <i class="fa-solid fa-angle-left"></i>
                        </a>
                    </div>
                    <div class="next">
                        <a class="next-btn">
                            <i class="fa-solid fa-angle-right"></i>
                        </a>
                    </div>
        </div>
        
    </section>
    <section class="lien" id="lien">
        <h2 class="cour">LIENS DE COURS</h2>
        <div class="content">

           
            <div class="card">
                <div class="icon">
                    <a class="y" href="https://www.youtube.com/channel/UC0jmBpmm4n5yU2cImlCCpCw" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                </div>
                <div class="info">
                    <h3>OUR YOUTUBE CHANEL</h3>
                   
                </div>
            </div>
            <div class="card">
                <div class="icon">
                   <a class="f" href="https://www.facebook.com/groups/174085714464172" target="_blank"><i class="fa-brands fa-facebook-square"></i></a> 
                </div>
                <div class="info">
                    <h3>OUR FACBOOK CHANEL</h3>
                   
                </div>
            </div>
            <div class="card">
                <div class="icon">
                  <a class="g" href="https://drive.google.com/drive/folders/1GTlibQ6JnKkpDoMq5BXXXMyEuBDLc7ct?fbclid=IwAR3aSrb8eAS163riYrK6VXEuFI0Q_x0qEzmjGJE21MIz0Pl52pdASNpAc8s" target="_blank"><i class="fa-brands fa-google-drive"></i></a>  
                </div>
                <div class="info">
                    <h3>DRIVE </h3>
                    
                </div>
            </div>
            
        </div>
          
    </section>
  
    <div class="copyright">
        <p>copyright 2021 . Tous droits reservé</p>
        </div>
    <script src="ds.js"></script>
</body>
</html>