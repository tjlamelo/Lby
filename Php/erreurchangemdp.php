<?php
                
                if(isset($_GET['err'])){
                    $err = htmlspecialchars($_GET['err']);
                    switch($err){
                        case 'current_password':
                            echo "<div class='alert alert-danger'>Le mot de passe actuel est incorrect</div>";
                        break;

                        case 'success_password':
                            echo "<div class='alert alert-success'>Le mot de passe a bien été modifié ! </div>";
                        break; 
                    }
                }
           







?>