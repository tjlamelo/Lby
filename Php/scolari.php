<?php 
    require_once __DIR__.'/../Php/config.php'; // On inclu la connexion à la bdd
    
    // Si les variables existent et qu'elles ne sont pas vides
    if(!empty($_POST['nom_eleves']) 
        && !empty($_POST['prenoms_eleves'])
        && !empty($_POST['date_naiss']) 
        && !empty($_POST['lieu_naiss']) 
        && !empty($_POST['radios']) 
        && !empty($_POST['noms_parent']) 
        && !empty($_POST['adresse'])
        && !empty($_POST['tel'])
        && !empty($_POST['classe'])
        
        
        )
    {
        // Patch XSS
        $nomeleves = htmlspecialchars($_POST['nom_eleves']) ;
        $prenomseleves = htmlspecialchars($_POST['prenoms_eleves']));
        $datenaiss=htmlspecialchars($_POST['date_naiss']) ;
        $lieunaiss= htmlspecialchars($_POST['lieu_naiss']);
        $sexe= htmlspecialchars($_POST['radios']) ;
        $nomparent = htmlspecialchars($_POST['noms_parent']);
        $adresse = htmlspecialchars($_POST['adresse']);
        $tel = htmlspecialchars($_POST['tel']);
        $classe = htmlspecialchars($_POST['classe']);
        // On vérifie si l'élève existe
        $check = $bdd->prepare('SELECT noms_eleves, prenoms_eleves, FROM scolarisation WHERE nomseleves = ?');
        $check->execute(array($nomeleves));
        $data = $check->fetch();
        $row = $check->rowCount();

        $noms = strtolower($nomeleves); // on transforme toute les lettres majuscule en minuscule pour éviter que Foo@gmail.com et foo@gmail.com soient deux compte différents ..
    
        if($row == 0){ 
            if(strlen($pseudo) <= 100){ // On verifie que la longueur du pseudo <= 100
                if(strlen($email) <= 100){ // On verifie que la longueur du mail <= 100
                    if(filter_var($email, FILTER_VALIDATE_EMAIL)){ // Si l'email est de la bonne forme
                        if($password === $password_retype ){ // si les deux mdp saisis sont bon

                            if ($email===$emailconf) {
                                
                                // On hash le mot de passe avec Bcrypt, via un coût de 12
                            $cost = ['cost' => 12];
                            $password = password_hash($password, PASSWORD_BCRYPT, $cost);
                            
                            // On stock l'adresse IP
                            $ip = $_SERVER['REMOTE_ADDR']; 
                             /*
                              ATTENTION
                              Verifiez bien que le champs token est présent dans votre table utilisateurs, il a été rajouté APRÈS la vidéo
                              le .sql est dispo pensez à l'importer ! 
                              ATTENTION
                            */
                            // On insère dans la base de données
                            $insert = $bdd->prepare('INSERT INTO scolarisation(noms_eleves, prenoms_eleves, date_naiss, lieu_naiss, sexe, nom_parent, adresse, tel, classe, ) 
                            VALUES(:nomeleves,:prenomseleves, :datenaiss, :lieunaiss, :sexe, :nomparent, :adresse, :tel, :classe)');
                            $insert->execute(array(
                                'nomparent'=>$nomparent,
                                'pseudo' => $pseudo,
                                'email' => $email,
                                'tel'=>$tel,
                                'password' => $password,
                                'ip' => $ip,
                                'token' => bin2hex(openssl_random_pseudo_bytes(64))
                            ));
                            // On redirige avec le message de succès
                            header('Location:../Pages/inscription.php?reg_err=success');
                            die();


                            }else{header('Location: ../Pages/inscription.php?reg_err=email2'); die();}
                        }else{ header('Location: ../Pages/inscription.php?reg_err=password'); die();}
                    }else{ header('Location:../Pages/inscription.php?reg_err=email'); die();}
                }else{ header('Location: ../Pages/inscription.php?reg_err=email_length'); die();}
            }else{ header('Location: ../Pages/inscription.php?reg_err=pseudo_length'); die();}
        }else{ header('Location: ../Pages/inscription.php?reg_err=already'); die();}
    }
    