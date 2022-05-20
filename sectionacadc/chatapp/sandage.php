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

    <style>
        .nodiv {
            height: 130px;
        }

        #myUnOrdList {
            display: flex;
            justify-content: center;
            align-items: center;

        }

        .todo-list {
            min-width: fit-content;

            /* To remove the bullets of unordered list */
            list-style: none;
        }

        .todo {
            margin: 1rem;
            background: rgb(79, 74, 74);
            color: white;
            font-size: 19px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.25em 0.5em;
            border-radius: 30px;
            transition: background-color 200ms ease-in-out;
        }

        .up,
        .down {
            margin-left: 40px;
            margin-right: 40px;
            border-radius: 4px;
            background-color: rgb(79, 74, 74);
            padding: 10px;
            color: white;
            border-color: white;


        }

        .up:hover {
            background-color: green;
        }

        .down:hover {
            background-color: red;

        }

        .voteSubject {
            margin-left: 10px;
        }
    </style>

    <script>
        function treateVote(uid, vid, v) {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "php/sandage.php", true);
            xhr.onload = () => {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        let data = xhr.response;
                        if (data === "success") {
                          location.href = "sandage.php";
                        } else {
                            alert(data);
                        }
                    }
                }
            }


            var formData = new FormData();
            formData.append("userid", uid);
            formData.append("voteid", vid);
            formData.append("vote", v);

            xhr.send(formData);
        }
    </script>

    <title>Acad c web site</title>
</head>

<body style="background-color: rgb(0, 0, 0);">

    <div>

        <header>
            <div class="nav">
                <div class="bar">
                    <a href="#" class="logo">ACAD C WEB SITE </a>
                    <a class="k"><i class="fas fa-bars"></i></a>
                </div>

                <ul class="navigation">
                    <li><a href="#acueil"> Acueil</a></li>
                    <li><a href="#Modules"> module</a></li>
                    <li><a href="#emploi"> Emploi du temp</a></li>
                    <li><a href="#lien"> Liens de cours</a></li>
                    <li><a href=""> Sandage</a></li>
                    <li><a href="http://localhost/sectionacadc/chatapp/users.php"> Chat</a></li>

                </ul>
            </div>

        </header>

    </div>
    <div class="nodiv">

    </div>


    <?php

require "../partieHamouche/database.php";


$t = getSandage();

$userid = $_SESSION['unique_id'];

foreach ($t as $item ) {

    

    echo " <div id=\"myUnOrdList\">
    <ul class=\"todo-list\">
        <div class=\"todo\">
            <small class=\"voteSubject\">".$item[1]."</small>
            <li></li>
            <button onclick=\"treateVote(".$userid." , ".$item[0]." , 1)\" class=\"up\" >yes <h3>".$item[2]."</h3></button>
            <button onclick=\"treateVote(".$userid." , ".$item[0]." , 2)\" class=\"down\">no<h3>".$item[3]."</h3></button>
        </div>
    </ul>
</div>
";
}

    
    ?>

    <div id="myUnOrdList">
        <ul class="todo-list">
            <div class="todo">
                <p style="display:none;"></p>
                <small class="voteSubject"> le prof veut vous ajouter un horaire a 16h hfkdjfh</small>
                <li></li>
                <button class="up">yes <h3>0</h3></button>
                <button class="down">no<h3>0</h3></button>
            </div>

        </ul>
    </div>


    <script src="ds.js"></script>
</body>

</html>