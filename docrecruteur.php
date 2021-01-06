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
    <a class="p-2 text-dark" href="docrecruteur2.php"><button type="button" class="btn btn-success">Doc recruteur 2</button></a>
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
        <p align="left"><span class="badge badge-primary"><input autocomplete="off" maxlength="5" size="1" type="text" name="n2">/1</span> Qu’est-ce que le FearRp/PainRp ?( défintions et exemples demandé) (question éliminatoire)<p>
        <p align="left"><span class="badge badge-primary"><input autocomplete="off" maxlength="5" size="1" type="text" name="n3">/1</span> Qu'est-ce que le Power Gaming ? (Faire quelque chose qui n'est pas réalisable dans la vraie vie) ( définition et exemple demandé )<p>
        <p align="left"><span class="badge badge-primary"><input autocomplete="off" maxlength="5" size="1" type="text" name="n4">/1</span> Quelles sont les rançons maximales pour un citoyen ainsi que pour le maire lors prise d’otage?. (50.000;60.000)<p>
        <p align="left"><span class="badge badge-primary"><input autocomplete="off" maxlength="5" size="1" type="text" name="n5">/1</span> La tech-9 est une arme lourde ? <p>
        <p align="left"><span class="badge badge-primary"><input autocomplete="off" maxlength="5" size="1" type="text" name="n6">/1</span> Citez les 3 types de sommations ( les temps est requis )<p>
        <p align="left"><span class="badge badge-primary"><input autocomplete="off" maxlength="5" size="1" type="text" name="n7">/1</span> Combien de gendarmes faut-il pour braquer un joueur, la banque, l'armurerie ?<p>
        <p align="left"><span class="badge badge-primary"><input autocomplete="off" maxlength="5" size="1" type="text" name="n8">/1</span> Peut-on braquer un armurier pour une avoir une arme ? Et pour de l'argent ?<p>
        <p align="left"><span class="badge badge-primary"><input autocomplete="off" maxlength="5" size="1" type="text" name="n9">/1</span> Peut-on braquer un cuisinier pour une avoir de la nouriture ? Et pour de l'argent ?<p>
        <p align="left"><span class="badge badge-primary"><input autocomplete="off" maxlength="5" size="1" type="text" name="n10">/1</span> As-tu le droit de prendre en otage le cuisinier ? <p>
        <p align="left"><span class="badge badge-primary"><input autocomplete="off" maxlength="5" size="1" type="text" name="n11">/1</span> Peux-tu volé un véhicule de fonction ? (Véhicule de gendarme, ambulance)<p>
        <p align="left"><span class="badge badge-primary"><input autocomplete="off" maxlength="5" size="1" type="text" name="n12">/1</span> Qu’est-ce que le ForceRP ? et est-ce autorisé ?  (Exemple et défintion demandé)<p>
        <p align="left"><span class="badge badge-primary"><input autocomplete="off" maxlength="5" size="1" type="text" name="n13">/1</span> Est-il autorisé de mentir sur la position de l’otage pour berner la gendarmerie ? (non)<p>
        <p align="left"><span class="badge badge-primary"><input autocomplete="off" maxlength="5" size="1" type="text" name="n14">/1</span> Peut on lockpick un fading-doors si il y a pas de keypad ?<p>
        <p align="left"><span class="badge badge-primary"><input autocomplete="off" maxlength="5" size="1" type="text" name="n15">/1</span> Combien faut-il de personnes (en tout) pour faire un braquage de banque,armurie et PO ?<p>   
        <p align="left"><span class="badge badge-primary"><input autocomplete="off" maxlength="5" size="1" type="text" name="n16">/1</span> Est-il autorisé de cacher ses keypads pour ralentir l’ennemi? (non il doit etre visible pres du props)<p>
        <p align="left"><span class="badge badge-primary"><input autocomplete="off" maxlength="5" size="1" type="text" name="n17">/1</span> Les faux otages tels que les complices ou les joueurs du même métier sont ils autorisés?(non)<p>
        <p align="left"><span class="badge badge-primary"><input autocomplete="off" maxlength="5" size="1" type="text" name="n18">/1</span> cites moi les safezones ?( Spawn,Concessionaire et Distributeurs)<p>
        <p align="left"><span class="badge badge-primary"><input autocomplete="off" maxlength="5" size="1" type="text" name="n19">/1</span> Peut on détruire les machines de bitcoins et les entitées de businessman ? <p>  
        <p align="left"><span class="badge badge-primary"><input autocomplete="off" maxlength="5" size="1" type="text" name="n20">/1</span> Est-il autorisé de frapper un joueur pour qu'il oublie tout si non que faut-il faire ?<p>
      <p align="left"><span class="badge badge-primary"><input autocomplete="off" maxlength="5" size="1" type="text" name="n21">/1</span> Qu'est que le MétaGaming ?( exemple et définition demandé) (question éliminatoire)<p> 
      <p align="left"><span class="badge badge-primary"><input autocomplete="off" maxlength="5" size="1" type="text" name="n22">/1</span> Quel est le nombre de keypad maximum autorisé pour une construction défensive ? (2)<p>
      <p align="left"><span class="badge badge-primary"><input autocomplete="off" maxlength="5" size="1" type="text" name="n23">/1</span> Est-il autorisé de braquer un local commercial ? (Non)<p>
      <p align="left"><span class="badge badge-primary"><input autocomplete="off" maxlength="5" size="1" type="text" name="n24">/1</span> Quel est le nombre maximum d'otage lors d'un braquage ou une PO (10)<p>
      <p align="left"><span class="badge badge-primary"><input autocomplete="off" maxlength="5" size="1" type="text" name="n25">/1</span> Est-il autorisé de tuer une personne que tu braques si il a pas 5000 ? Si oui dans quel situation ? (Oui seulement si les 3 sommations ont été effectuées )<p> 
      <p align="left"><span class="badge badge-primary"><input autocomplete="off" maxlength="5" size="1" type="text" name="n26">/4</span> (Mise en situation ) Braquage de banque : Imagines tu fais un braquage de banque avec des <br>Peakys,tu rentres dans la banque tu as avec toi 3 Peakys et deux otages.Quels sont t'es premiers réflexes ? Ensuite viennent <br> les négociations Que dis-tu aux négociateurs ? et comment geres-tu les <br> personnes avec toi pour organiser la fuite ? Ensuite,vous partez,le véhicule se crash mais<br> vous avez encore un otage a ta disposition que fais-tu ?<p>
	      <button type="submit" class="btn btn-success">calculer les point(s)</button>

			<button class="btn btn-primary" style="pointer-events: none;" type="button" disabled><?php
				if(isset($_POST['n2']))
				{
				    $resultat = $_POST['n1']+$_POST['n2']+$_POST['n3']+$_POST['n4']+$_POST['n5']+$_POST['n6']+$_POST['n7']+$_POST['n8']+$_POST['n9']+$_POST['n10']+$_POST['n11']+$_POST['n12']+$_POST['n13']+$_POST['n14']+$_POST['n15']+$_POST['n16']+$_POST['n17']+$_POST['n18']+$_POST['n19']+$_POST['n20']+$_POST['n21']+$_POST['n22']+$_POST['n23']+$_POST['n24']+$_POST['n25']+$_POST['n26'];
				    echo '' . $resultat .'';

				}
				?>/29 <span class="badge badge-pill badge-danger">Minimum 24/29</span></button>









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










































