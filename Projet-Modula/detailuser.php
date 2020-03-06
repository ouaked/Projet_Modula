<?php
session_start();
include 'connexionbdd.php';
include 'haeder.php';
$id = intval($_GET['id']);
$req = $pdo->prepare('select * from user where id=?');
$req->execute(array($id));
$rows = $req->fetch();
?>

<div class="corps">
<!--affiche de détail des ligne de chaque utilisateur-->

    <b>Voici les information du utilisateur: <?php echo $rows['nom'] .' '. $rows['prenom'] ;?> </b>
    <table class="table table-striped table-hover table">
        <tr class="bb" style="background-color: ">
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>
            <th scope="col">Adresse mail</th>
            <th scope="col">Message</th>
            <th scope="col">Date</th>
            <th scope="col">Heure</th>


        </tr>
        <tr>
            <td><?php echo $rows['nom']; ?></td>
            <td><?php echo $rows['prenom']; ?></td>
            <td><?php echo $rows['mail']; ?></td>
            <td><?php echo $rows['message']; ?></td>
            <td><?php echo $rows['date']; ?></td>
            <td><?php echo $rows['heure']; ?></td>
        </tr>

    </table>
    <di>
        <form>
            <input type="button" class="btn btn-primary btnretour" value="Retour à la page précedente" onclick="history.go(-1)">
        </form>
    </di>

</div>



















<?php
include 'footer.php'
?>