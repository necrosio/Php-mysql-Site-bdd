<?php
$bdd = new PDO('mysql:host=localhost;dbname=joueur', 'XX', 'XX');

if(isset($_POST['forminscription'])) {
   $pseudo = htmlspecialchars($_POST['pseudo']);
   $mail = htmlspecialchars($_POST['mail']);
   $mail2 = htmlspecialchars($_POST['mail2']);
   if(!empty($_POST['pseudo']) AND !empty($_POST['mail'])) {
      $pseudolength = strlen($pseudo);
      if($pseudolength <= 255) {
         if($mail == $mail) {
               $reqmail = $bdd->prepare("SELECT * FROM recrutement WHERE mail = ?");
               $reqmail->execute(array($mail));
               $mailexist = $reqmail->rowCount();
               if($mailexist == 0) {
                     $insertmbr = $bdd->prepare("INSERT INTO recrutement(pseudo, mail) VALUES(?, ?)");
                     $insertmbr->execute(array($pseudo, $mail));
                     $erreur = "Save !";
               } else {
                  $erreur = "erreur";
               }
            } else {
               $erreur = "erreur";
            }
         } else {
            $erreur = "erreur";
         }
      } else {
         $erreur = "erreur";
      }
   } else {
      $erreur = "erreur";
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
    <a class="p-2 text-dark"  href="http://peakyblindersrp.ga/phpmyadmin/"><button type="button" class="btn btn-warning">PhpmyAdmin</button></a>
    <a class="p-2 text-dark" href="recherche.php"><button type="button" class="btn btn-info">Recherche</button></a>
    <a class="p-2 text-dark" href="inscriptionjoueur.php"><button type="button" class="btn btn-info">inscription Joueurs</button></a>
    <a class="p-2 text-dark" href="docrecruteur.php"><button type="button" class="btn btn-success">Doc recruteur</button></a>
  </nav>
  <a class="btn btn-outline-danger" href="deconnexion.php">Déconnexion</a>
</div>





<br> <br>

<!-- <iframe width="1300" height="900" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vTHnOeBZdE5erMWZq5pVUHotv-_QYuT9Zjfek_4kk6W51iVQHiad5hkm5UDwAcFsCk2tw-RBzJ1OKSJ/pubhtml?gid=0&amp;single=true&amp;widget=true&amp;headers=false"></iframe> -->
<br>
<center>
<div>
      <div align="center">
         <h2 style="color:#FFFFFF";>Inscription de joueur par le recruteur</h2>
         <br /><br />
         <form method="POST" action="">
            <table>
               <tr>
                  <td align="center">
                     <label  for="pseudo"></label>
                  </td>
                  <td>
                     <input  type="text" class="form-control" placeholder="Nom du recruteur" id="pseudo" name="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>" />
                  </td>
               </tr>
               <tr>
                  <td align="center">
                     <label  for="mail"></label>
                  </td>
                  <td>
                     <input type="steamID" class="form-control" size="50" placeholder="steamID | nom du joueur | date | note | (blacklist)" id="mail" name="mail" value="<?php if(isset($mail)) { echo $mail; } ?>" />
                     <p style="color:#FFFFFF" >steamID | nom du joueur | date | note | (backlist)</p>
                     <p style="color:#FFFFFF" ><span class="badge badge-light">Ex : STEAM_0:1:448607441 Evan Pole 22/3/2019 19/20 </span></p>
                  </td>
               </tr>
               <tr>
                  <td></td>
                  <td align="center">
                     <br />
                     <input class="btn btn-success" type="submit" name="forminscription" value="je sauvegarde" />
                  </td>
               </tr>
            </table>
         </form>
         <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>
      </div>
   </div>
</center>





</body>
</html>


