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
<br>






<body>


<center>
	<form action="" method="POST">
	<span class="badge badge-light">
			<p align="left">Nom du joueur : <span class="badge badge-primary"><input autocomplete="off" maxlength="50" size="10" type="text" name="joueur"></span><p>
		    <p align="left"><span class="badge badge-primary"><input autocomplete="off" maxlength="5" size="1" type="text" name="n1">/1</span> Avez-vous des warns ? 3 warns = non | 2warn = 0 pts<p>
		    <p align="left"><span class="badge badge-primary"><input autocomplete="off" maxlength="5" size="1" type="text" name="n2">/1</span> Quel est le montant maximum que nous pouvons donner a autrui sans raison roleplay? (100.000)<p>
		    <p align="left"><span class="badge badge-primary"><input autocomplete="off" maxlength="5" size="1" type="text" name="n3">/1</span> Quel est le nombre de keypad maximum autorisé pour une construction défensive. (2)<p>
		    <p align="left"><span class="badge badge-primary"><input autocomplete="off" maxlength="5" size="1" type="text" name="n4">/1</span> Quelle sont les rancons maximales pour un citoyen et le maire en prise d’otage?. (10.000;20.000)<p>
		    <p align="left"><span class="badge badge-primary"><input autocomplete="off" maxlength="5" size="1" type="text" name="n5">/1</span> Le contre cambriolage est-il autorisé? Et le contre-braquage? (non;uniquement si la gendarmerie n’est pas encore sur les lieux)<p>
		    <p align="left"><span class="badge badge-primary"><input autocomplete="off" maxlength="5" size="1" type="text" name="n6">/1</span> Est-il autorisé de mentir sur la position de l’otage pour berner la gendarmerie ? (non)<p>
		    <p align="left"><span class="badge badge-primary"><input autocomplete="off" maxlength="5" size="1" type="text" name="n7">/1</span> Quelles sont les armes autoriées en psychopathe?(armes métier machette et couteaux)<p>
		    <p align="left"><span class="badge badge-primary"><input autocomplete="off" maxlength="5" size="1" type="text" name="n8">/1</span> Quelles sont les armes autorisées en agent de sécurité? (toutes)<p>
		    <p align="left"><span class="badge badge-primary"><input autocomplete="off" maxlength="5" size="1" type="text" name="n9">/1</span> Est-il autorisé de cacher ses keypads pour ralentir l’ennemi? (non il doit etre visible pres du props)<p>
		    <p align="left"><span class="badge badge-primary"><input autocomplete="off" maxlength="5" size="1" type="text" name="n10">/1</span> Combien de temps faut-il attendre entre chaque sommations avant de tuer quelqu’un? (10 entre chaques)<p>
		    <p align="left"><span class="badge badge-primary"><input autocomplete="off" maxlength="5" size="1" type="text" name="n11">/1</span> Les faux otages tels que les complice ou les joueurs du même métiers sont ils autorisés?(non)<p>
		    <p align="left"><span class="badge badge-primary"><input autocomplete="off" maxlength="5" size="1" type="text" name="n12">/1</span> Qu’est-ce que le ForceRP ? et est-ce autorisé ?  (Exemple demander) <p>
		    <p align="left"><span class="badge badge-primary"><input autocomplete="off" maxlength="5" size="1" type="text" name="n13">/1</span> Est-il autorisé de voler les printers des autres ? Si oui peu-on aussi voler les vip meme si on ne l’est pas ? (oui;oui)<p>
		    <p align="left"><span class="badge badge-primary"><input autocomplete="off" maxlength="5" size="1" type="text" name="n14">/1</span> Combien de temps faut-il attendre avant de ranger son arme dans son inventaire apres une action ? (5min)<p>
		    <p align="left"><span class="badge badge-primary"><input autocomplete="off" maxlength="5" size="1" type="text" name="n15">/1</span> Combien de partenaire faut-il pour faire un braquage de banque,armurie et PO ? <p>   
		    <p align="left"><span class="badge badge-primary"><input autocomplete="off" maxlength="5" size="1" type="text" name="n16">/1</span> Est-il autorisé de casser son véhicule pour qu’il respawn? Si oui dans quelles conditions? (oui si il n’y a pas de staff connectés) <p>
		    <p align="left"><span class="badge badge-primary"><input autocomplete="off" maxlength="5" size="1" type="text" name="n17">/1</span> Peut on voler un véhicule de fonction ? (non)<p>
		    <p align="left"><span class="badge badge-primary"><input autocomplete="off" maxlength="5" size="1" type="text" name="n18">/1</span> cites moi les safezones ?<p>
		    <p align="left"><span class="badge badge-primary"><input autocomplete="off" maxlength="5" size="1" type="text" name="n19">/1</span> Que sont le no-pain et le no-fear ainsi que le métagaming et le force-rp? (exemple demandés) <p>  
		    <p align="left"><span class="badge badge-primary"><input autocomplete="off" maxlength="5" size="1" type="text" name="n20">/1</span> Quelle est la meilleure famille du serveur? (peaky <3)<p>
	      <button type="submit" class="btn btn-success">calculer les point(s)</button>

			<button class="btn btn-primary" style="pointer-events: none;" type="button" disabled><?php
				if(isset($_POST['n2']))
				{
				    $resultat = $_POST['n1']+$_POST['n2']+$_POST['n3']+$_POST['n4']+$_POST['n5']+$_POST['n6']+$_POST['n7']+$_POST['n8']+$_POST['n9']+$_POST['n10']+$_POST['n11']+$_POST['n12']+$_POST['n13']+$_POST['n14']+$_POST['n15']+$_POST['n16']+$_POST['n17']+$_POST['n18']+$_POST['n19']+$_POST['n20'];
				    echo '' . $resultat .'';

				}
				?>/20 <span class="badge badge-pill badge-danger">Minimum 16/20</span></button>









	   </span>
	</form>
</center>

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
                     <input  type="text" class="form-control" placeholder="Nom du recruteur" id="pseudo" name="pseudo" value="" />
                  </td>
               </tr>
               <tr>
                  <td align="center">
                     <label  for="mail"></label>
                  </td>
                  <td>
                     <input type="steamID" class="form-control" size="50" placeholder="steamID | nom du joueur | date | note | (blacklist)" id="mail" name="mail" value="<?php if(isset($mail)) { echo $mail; } ?>" />
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
                     <p style="color:#FFFFFF" >steamID | nom du joueur | date | note | (backlist)</p>
                     <p style="color:#FFFFFF" ><span class="badge badge-light">Ex : STEAM_0:1:448607441 Evan Pole 22/3/2019 19/20 </span></p>
</center>










































