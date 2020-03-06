
<?php
session_start();
include 'connexionbdd.php';
include 'haeder.php';

$login = "";
$mdp = "";

if(isset($_POST['connexion'])){
    $login = $_POST['login'];
    $mdp = md5($_POST['mdp']);
    if(!empty($login) and !empty($mdp)){
        $user = $pdo->prepare('select * from admin where login = ? and mdp = ?'); 
        $user->execute(array($login, $mdp)); 
        $exist = $user->rowCount();
        if($exist > 0 ){
            $info = $user->fetch();
            $_SESSION['id'] = $info['id'];
            $_SESSION['login'] = $info['login'];
            $_SESSION['mdp'] = $info['mdp'];

            header('location:profil.php?id='.$_SESSION['id']);
        }
        else{
             echo '<div class="alert alert-danger"> Tous les champs doivent etre complités</div>';
        }

    }
}

?>

<div class="container-fluid formregister">
    <form action="" method="post">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="ogin">Login</label>
                <input type="text" class="form-control" id="login" name="login" placeholder="votre login" value="<?php  ?>" >
            </div>
            <div class="form-group col-md-6">
                <label for="mdp">Mot de passe</label>
                <input type="password" class="form-control" id="mdp" name="mdp" placeholder="votre mot de passe" value="<?php ?>"  >
            </div>
        </div>


        <button type="submit" class="btn btn-primary" name="connexion">Connexion</button>
    </form>
</div>
    <?php
    include 'footer.php'
    ?>
