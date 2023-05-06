<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="author" content="TJ"/>
          
            <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="../Style/styleconn.css">
            <title>Connexion</title>
        </head>
        <body>
<?php 
    session_start();
    require_once __DIR__.'/../Php/config.php'; // ajout connexion bdd 
    // si la session existe pas soit si l'on est pas connecté on redirige
    if(isset($_SESSION['user'])){
        header('Location:../Pages/membre.php');
        die();
    }

   
?>
            
        <div class="login-form">
                <?php 
                    include("../Php/erreurconnexion.php");
                   ?> 
               

                   <form action="../Php/connexion.php" method="post">
                    <h2 class="text-center">Connexion</h2>       
                    <div class="form-group">
                        <label for="username" class="form-label">E-mail</label>
                        <input type="email" name="email" class="my-1 form-control" placeholder="Entre votre Email" required="required" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="username" class="form-label">Mot de passe</label>
                        <input type="password" name="password" class="my-1 form-control" placeholder="Entrez votre Mot de passe" required="required" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="my-3 btn btn-primary btn-block">Connexion</button>
                    </div>   
                </form>
                <p class="text-center"><a href="inscription.php">Inscription</a></p>
           
           </div>
    
       
        </body>
</html>