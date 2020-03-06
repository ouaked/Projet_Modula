<?php
session_start();
include 'connexionbdd.php';
include 'haeder.php';
//on prépare la requete pour sélectionner tous les champs de la table user
$listeuser = $pdo->prepare('select * from user ORDER BY date DESC');
$listeuser->execute();
$existe = $listeuser->rowCount();
//on vérifier si on a une ligne qui existe et on fait un fetch
if($existe > 0){
    $rows =  $listeuser->fetchAll(PDO::FETCH_ASSOC);

}else{
    //sinon on mis la variable rows a vide pour ne pas avoir d'erreurs en cas ou ca nous retourne aucune ligne
    $rows='';
    echo '<div class="alert alert-danger">'.'Aucune utilisateur n\'a été crée!'.'</div>';
}
?>


<div class="corps">


    <b>Voici la liste des utilisateurs: </b>
    <table class="table table-striped table-hover table">
        <tr class="bb" style="background-color: ">
            <th scope="col">Date</th>
            <th scope="col">Heure</th>
            <th scope="col">Adresse mail</th>
            <th scope="col"><i class="fas fa-trash-alt"></i></th>


        </tr>
<!--affichage des résultat de la requete sous forma d'un tableau avce le foreach-->
        <?php 
        foreach($rows as $ligne_tab): 
        ?>
        <tr class="st" scope="row">
            <td> <?php echo $ligne_tab['date']; ?></td>
            <td> <?php echo $ligne_tab['heure']; ?></td>
            <td><a href="detailuser.php?id=<?php echo $ligne_tab['id']; ?>"><?php echo $ligne_tab['mail']; ?></a></td>
             <td><a href="suppuser?idd=<?php echo $ligne_tab['id']; ?>" onclick="return confirm(' êtes vous sûr de vouloir supprimer cet utilisateur')" > <i class="fas fa-trash-alt rouge"></i></a></td>

        </tr>   

        <?php endforeach;  ?>
    </table>


</div>





<?php
include 'footer.php'
?>