<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="style.css" rel="stylesheet" />
        <title> inscription </title>

        <head>
            <body>
                <div class='login-form'>
                    <?php
                        if(isset($_GET['reg_err']))
                        {
                            $err = htmlspecialchars($_GET['reg_err']);

                            switch($err)
                            {
                                case 'success':
                                    ?>
                                        <div class="alert alert-success">
                                            <strong>Succès </strong> inscription reussie ! 
                                        </div>
                                        <?php
                                        break;

                                case 'password':
                                    ?>
                                        <div class="alert alert-success">
                                            <strong>Succès </strong> mot de passe différents ! 
                                        </div>
                                        <?php
                                        break;

                                case 'email':
                                    ?>
                                        <div class="alert alert-success">
                                            <strong>Succès </strong> email non valide ! 
                                        </div>
                                        <?php
                                        break;
                                                
                                case 'email_length':
                                    ?>
                                        <div class="alert alert-success">
                                            <strong>Succès </strong> email trop long ! 
                                        </div>
                                        <?php
                                        break;

                                case 'pseudo_length':
                                    ?>
                                        <div class="alert alert-success">
                                            <strong>Succès </strong> pseudo trop long ! 
                                        </div>
                                        <?php
                                        break;


                                case 'already':
                                    ?>
                                        <div class="alert alert-success">
                                            <strong>Succès </strong> compte deja existant ! 
                                        </div>
                                        <?php
                                        break;
                
                            }
                        }

                        ?>

                    <form action="inscription_traitement.php" method="post">
                        <h2 class="text-center"> Inscription </h2>
                        <div class = 'form-group'>
                            <input type="text" name="pseudo" class="form-control" placeholder="Pseudo" required="required" autocomplete="off">
                        </div>
                        <div class = 'form-group'>
                            <input type="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password_retype" class="form-control" placeholder="Retapez le mot de passe" required="required" autocomplete="off">
                        </div>
                        <div claas="form-group">
                            <button type = "submit" class="btn btn-primary btn-block">Inscription</button>
                        </div>
                    </form>
                    <p class="text-center"><a href="inscription.php"> inscription </a></p>
                </div>