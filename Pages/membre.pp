<?php 
    session_start();
    require_once __DIR__.'/../Php/config.php'; // ajout connexion bdd 
    // si la session existe pas soit si l'on est pas connecté on redirige
    if(!isset($_SESSION['user'])){
        header('Location:../Pages/formconn.php');
        die();
    }

    // On récupere les données de l'utilisateur
    $req = $bdd->prepare('SELECT * FROM inscription WHERE token = ?');
    $req->execute(array($_SESSION['user']));
    $data = $req->fetch();
   
?>











<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Espace Membre</title>
    <link rel="stylesheet" href="../Style/stylemembre.css">
    <link rel="shortcut icon" href="../Mon site/Images/logolby.png">
</head>
<body>
</head>
<?php 
    session_start();
    require_once __DIR__.'/../Php/config.php'; // ajout connexion bdd 
    // si la session existe pas soit si l'on est pas connecté on redirige
    if(isset($_SESSION['user'])){
        header('Location:../Pages/membre.php');
        die();
    }

   
?>
    <div class="container">
     
        <nav class="nav-links">

               <a href="../index.php"><img src="../Images/logolby.png" alt="" class="logo">
               </a> 
            <ul>
                
                <li class="deroulant"><a href="#">Services &ensp;</a>

                    <ul class="sous">
                        
                        <li><a href="#">Bibliothèque</a></li>
                        <li><a href="#">Clubs</a></li>  
                
                    </ul>
               </li>


                <li><a href="../Pages/scolarite.php" class="cls" >S'inscrire</a></li>
                <li><a href="../Pages/bulletindenotes.php" class="cls">Bulletins de notes</a></li>
                <li><a href="#" class="cls">Notification</a></li>
                <li><a href="../Pages/profil.php" class="cls">Profil</a></li>
                <li><a href="../Php/deconnexion.php"><button class="btn" id="displayForm">Deconnexion</button> </a></li>
                

            
            </ul>
            
            <img src="../Mon site/Images/menuhamburger.png" alt="Menu" class="menu-hamburger">


        </nav>
          <!--    <img src="../Mon site/Images/menuhamburger.png" alt="Menu" class="menu-hamburger">-->

        
    </div>

</body>



<style>



nav a:hover{
    color: rgb(0, 0, 0);
    
}

.sous{
    display: none;
    box-shadow: 0px 1px 2px rgba(255, 255, 255, 0.459);
    background-color: rgba(29, 189, 218, 0.37);
    position: absolute;
    width: 110px;
    z-index: 1000;
    
}
nav > ul li:hover .sous{
    display: block;
}
.sous li{
    float: none;
    width: 155px;
    text-align: left;
}
.sous a{
    padding: 10px;
    border-bottom: none;
}
.sous a:hover{
    border-bottom: none;
    background-color: RGBa(200,200,200,0.1);
}
.deroulant > a::after{
    content:" ▼";
    font-size: 12px;
}




</style>
<script >
                
    const menuhamburger=document.querySelector(".menu-hamburger")
    const navLinks=document.querySelector(".nav-links")
    
    menuhamburger.addEventListener('click',()=>{
        navLinks.classList.toggle('mobile-menu')
    })
    
        </script>



</html>