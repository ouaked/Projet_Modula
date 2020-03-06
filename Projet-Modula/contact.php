<?php
session_start();
include 'connexionbdd.php';
include 'haeder.php';
$date = date("d-m-Y");
$heure = date("H:i");
function getIp(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
$adip = getIp();

$nom = "";
$prenom = "";
$mail = "";
$mess="";
//$regle="";
if($_POST){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['mail'];
    $mess = $_POST['mess'];
    if(isset($_POST['regle'])){
        $regle = $_POST['regle'];
    }
    else{
        $regle = "";#default value
    }
    if(isset($_POST['captcha']) and !empty($_POST['captcha'])){
    if($_POST['captcha']==$_SESSION['captcha']){
    
         if(!empty($nom) and !empty($prenom) and !empty($mail) and !empty($mess) and !empty($regle)){
        $req = $pdo->prepare('insert into user (nom, prenom, mail, message,regles,date, heure, ip) values(?, ?, ?, ?, ?, ?, ?, ?)');
        $req->execute(array($nom, $prenom, $mail, $mess, $regle, $date, $heure, $adip));
        echo '<div class="alert alert-success">Votre message à été bien pris en compte </div>';
    }else{
         echo '<div class="alert alert-danger"> Votre message ne peut etre envoyer pour le moment...</div>';
    }
    } else {
        echo '<div class="alert alert-danger"> Code de vérification incorrect</div>';;
       
    }
}else{
         echo '<div class="alert alert-danger"> Votre message ne peut etre envoyer pour le moment...</div>';
    }
   
}
?>
<div id="resultat">
</div>
<div class="container-fluid formregister">
    <form action="" method="post">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" placeholder="votre nom" value="<?php echo $nom ?>" >
            </div>
            <div class="form-group col-md-6">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" placeholder="votre prenom" value="<?php echo $prenom  ?>"  >
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="mail">Mail</label>
                <input type="email" class="form-control" id="mail" name="mail" placeholder="votre email" value="<?php echo $mail ?>" >
            </div>

        </div> 
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="mess">Message</label>
                <textarea class="form-control" id="mess" name="mess"  placeholder="" value="<?php  echo $mess?>" ></textarea>
            </div>
        </div>
        <div>

            <input type="text" name="captcha"/>
<!--            <input type="submit"/>-->
            <img src="captcha.php" onclick="this.src='captcha.php?' + Math.random();" alt="captcha" style="cursor:pointer;">
        </div>
        <div>
            <input type="checkbox" id="regle" name="regle" value="oui">
            <label for="regle">Vuillez accepter les regles RGPD</label>
        </div>


        <button type="submit" class="btn btn-primary" name="register">Soumettre</button>
    </form>
</div>
<div id="resultat">
</div>
<div class="ajout">
</div>
<?php
    include 'footer.php'
?>