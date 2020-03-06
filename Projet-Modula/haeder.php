<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Site web</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link rel="stylesheet" href="css/general.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>

    <body>
        <header role="header">
            <nav class="menu" role="navigation">
                <div class="inner">
                    <div class="m-left">
                        <h2 class="logo">voyager facilment</h2>
                    </div>
                    <div class="m-right">
                        <a href="index.php" class="m-link">Accueil</a>
<!--                        on vérifier si y a une variable de session qui existe et si c'est le cas on affiche déconnexion sinon on affiche connexion-->
                        <?php

                        if(isset($_SESSION['id'])){ ?>
                        <a href="deconnexion.php" class="m-link">Deconnexion</a>
                        <?php 
                        }else{?>
                        <a href="connexion.php" class="m-link">Connexion</a>
                        <?php } ?>
                        <a href="promotion.php" class="m-link">Nos promotions</a>
                        <a href="contact.php" class="m-link">Contact</a>
                    </div>
                    <div class="m-nav-toggle">
                        <span class="m-toggle-icon"></span>
                    </div>
                </div>
            </nav>
        </header>
        <script src="js/general.js"></script>  
    </body>
</html>
