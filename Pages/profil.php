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
<title>LYCEE BILINGUE DE YAOUNDE</title>
  
    <link rel="stylesheet" href="../Style/styleprofil.css">

    <link rel="shortcut icon" href="../Mon site/Images/logolby.png">
</head>
<body>
</head>








<div class="modal-body">

<?php 
                        if(isset($_GET['err'])){
                            $err = htmlspecialchars($_GET['err']);
                            switch($err){
                                case 'current_password':
                                    echo "<div class='alert alert-danger'>Le mot de passe actuel est incorrect</div>";
                                break;
                                case 'new_password_retype':
                                    echo "<div class='alert alert-danger'>Le mot de passe  est différent</div>";
                                break;

                                case 'success_password':
                                    echo "<div class='alert alert-success'>Le mot de passe a bien été modifié ! </div>";
                                break; 
                            }
                        }
                    ?>


                                <form action="../Php/mdpchange.php" method="POST">
                                    <label for='current_password'>Mot de passe actuel</label>
                                    <input type="password" id="current_password" name="current_password"  required/>
                                    <br />
                                    <label for='new_password'>Nouveau mot de passe</label>
                                    <input type="password" id="new_password" name="new_password"  required/>
                                    <br />
                                    <label for='new_password_retype'>Re tapez le nouveau mot de passe</label>
                                    <input type="password"  name="new_password_retype"  required/>
                                    <br />
                                    <button type="submit" >Sauvegarder</button>
                                </form>
                            </div>









</body>





</html>