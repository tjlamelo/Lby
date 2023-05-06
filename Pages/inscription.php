<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="author" content="TJ"/>
            <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="../Style/styleinscriptio.css">

 <title>Inscription</title>
            
        </head>
        <body>














        
        <div class="login-form">
            <?php 
                    include("../Php/erreurinscription.php");
                     ?>

        <form action="../Php/inscription_traitement.php" method="post">
                <h2 class="text-center">Inscription</h2>       
                <div class="form-group">
                <label for="username" class="form-label">Nom parent</label>
                <input type="text" name="nomparent" class="my-0 form-control" placeholder="Nom"  minlength="3" maxlength="15">
                </div>
                <div class="form-group">
                <label for="username" class="form-label">Pseudonyme (optionnel)</label>
                <input type="text" name="pseudo" class=" form-control" placeholder="Pseudo"  minlength="2" maxlength="10">
                </div>
                <div class="form-group">
                <label for="username" class="form-label">Numéro de téléphone</label>
                <input type="number" name="tel" class=" form-control" placeholder="Téléphone" minlength=""  onblur="veriftel(this)">
                </div>
                <label for="username" class="form-label">Email</label>
                <div class="form-group">
                <input type="email" name="email" class=" form-control" placeholder="Email" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                <label for="username" class="form-label">Confirmation E-mail</label>
                <input type="email" name="emailconf" class=" form-control" placeholder="Re-tapez votre e-mail" onblur="mail2(this)">
                </div>
                <div class="form-group">
                <label for="username" class="form-label">Mot de passe</label>
                <input type="password" name="password" class=" form-control" placeholder="Mot de passe" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                <label for="username" class="form-label">Confirmation mot de passe</label>
                <input type="password" name="password_retype" class=" form-control" placeholder="Re-tapez le mot de passe" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <button type="submit" class="my-3 btn btn-primary btn-block">Inscription</button>
                </div>   
            </form>
       
        </body>
</html>
