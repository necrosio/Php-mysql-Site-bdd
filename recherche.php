<meta charset="utf-8" />
<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=espace_membre', 'XX', 'XX');

if(isset($_SESSION['id'])) {
   $requser = $bdd->prepare("SELECT * FROM membre WHERE id = ?");
   $requser->execute(array($_SESSION['id']));
   $userinfo = $requser->fetch();

   if(isset($_POST['newrank']) AND !empty($_POST['newrank']) AND $_POST['newrank'] != $user['rank']) {
      $newrank = htmlspecialchars($_POST['newrank']);
      $insertrank = $bdd->prepare("UPDATE membre SET rank = ? WHERE id = ?");
      $insertrank->execute(array($newrank, $_SESSION['id']));
      header('Location: profil.php?id='.$_SESSION['id']);
   }


?>





<?php

$bdd = new PDO('mysql:host=localhost;dbname=joueur;charset=utf8','XX','XX');

$articles = $bdd->query('SELECT * FROM recrutement ORDER BY id DESC');
if(isset($_GET['q']) AND !empty($_GET['q'])) {
   $q = htmlspecialchars($_GET['q']);
   $articles = $bdd->query('SELECT mail FROM recrutement WHERE mail LIKE "%'.$q.'%" ORDER BY id DESC');
   if($articles->rowCount() == 0) {
      $articles = $bdd->query('SELECT mail FROM recrutement WHERE CONCAT(titre, contenu) LIKE "%'.$q.'%" ORDER BY id DESC');
   }
}
?>

<head>
   <title>PeakyBlinders</title>
   <meta charset="utf-8">
   <meta name="description" content="Site en dev discord : https://discord.gg/Fv4Vgvu">
   <link rel="stylesheet" href="css/main.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-dark border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal" ><span class="badge badge-secondary">Recruteur</span></h5>
  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-dark" href="http://peakyblindersrp.ga/phpmyadmin/"><button type="button" class="btn btn-warning">PhpmyAdmin</button></a>
    <a class="p-2 text-dark" href="recherche.php"><button type="button" class="btn btn-info">Recherche</button></a>
    <a class="p-2 text-dark" href="inscriptionjoueur.php"><button type="button" class="btn btn-info">inscription Joueurs</button></a>
    <a class="p-2 text-dark" href="docrecruteur.php"><button type="button" class="btn btn-success">Doc recruteur</button></a>
  </nav>
  <a class="btn btn-outline-danger" href="deconnexion.php">Déconnexion</a>
</div>




<head>




<br>
<br>

<center>
<form method="GET">
   <input type="search" name="q" placeholder="Recherche..." />
   <input type="submit" value="Valider" />
</form>

<center><h5><span class="badge badge-black">
<?php if($articles->rowCount() > 0) { ?>
   <ul>
   <?php while($a = $articles->fetch()) { ?>
      <li class="list-group-item"><?= $a['mail'] ?></li>
   <?php } ?>
   </ul>
</span></h5></center>
<?php } else { ?>
Aucun résultat pour: <?= $q ?>...
<?php } ?>



<!-- <iframe 
 src="http://peakyblindersrp.ga/pkadmin/recruteur/inscriptionjoueur.php"
 width="100%" height="500"
 sandbox>
  <p>
    <a href="http://peakyblindersrp.ga/pkadmin/recruteur/inscriptionjoueur.php">
      Un lien à utiliser dans les cas où les navigateurs ne supportent
      pas les <i>iframes</i>.
    </a>
  </p>
</iframe>

 -->
</center>




<?php   
}
else {
   header("Location: connexion.php");
}
?>