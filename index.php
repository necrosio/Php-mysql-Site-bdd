
<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=espace_membre2', 'XX', 'XX');

if(isset($_POST['formconnexion'])) {
   $mailconnect = htmlspecialchars($_POST['mailconnect']);
   $mdpconnect = sha1($_POST['mdpconnect']);
   if(!empty($mailconnect) AND !empty($mdpconnect)) {
      $requser = $bdd->prepare("SELECT * FROM membre WHERE pseudo = ? AND motdepasse = ?");
      $requser->execute(array($mailconnect, $mdpconnect));
      $userexist = $requser->rowCount();
      if($userexist == 1) {
         $userinfo = $requser->fetch();
         $_SESSION['id'] = $userinfo['id'];
         $_SESSION['pseudo'] = $userinfo['pseudo'];
         $_SESSION['mail'] = $userinfo['mail'];
         header("Location: recherche.php");
      } else {
         $erreur = "Mauvais Nom ou mot de passe !";
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
?>



<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>PeakyBlinders</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/pricing/">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- Bootstrap core CSS -->
<link href="bootstrap.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>



    <link href="pricing.css" rel="stylesheet">
  </head>
  <body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal">Zetas</h5>
  <nav class="my-2 my-md-0 mr-md-3">
  </nav>
  <a type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#exampleModalCenter">Login</a>
</div>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
  <h1 class="display-4" style="color: white">La Zetas</h1>
  <p class="lead">Pour devenir Zetas il vous faut aller sur notre discord puis envoyer un message a l'un de nos recruteur.</p>
</div>

<div class="container">
  <div class="card-deck mb-3 text-center">
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Discord</h4>

 		 <img src="..." class="card-img-top" alt="...">
      </div>

      <div class="card-body">
        <h1 class="card-title pricing-card-title">+40<small class="text-muted">Membres</small></h1>
        <ul class="list-unstyled mt-3 mb-4">
          <li></li>
          <li></li>
          <li></li>
          <li></li>
        </ul>
        <a type="button" class="btn btn-lg btn-block btn-outline-primary" href="https://discord.gg/rmfAsjy">Discord</a>
      </div>
    </div>
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">3 Jobs</h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title"><small class="text-muted">Systeme de grade </small></h1>
        <ul class="list-unstyled mt-3 mb-4">
          <li>Chefs</li>
          <li>Commando</li>
          <li>Membre</li>
          <li></li>
        </ul>
      </div>
    </div>
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Recruteurs</h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title"> <small class="text-muted"></small></h1>
        <ul class="list-unstyled mt-3 mb-4">
          <li></li>
          <li></li>
          <li></li>
          <li></li>
        </ul>
      </div>
    </div>
  </div>

  <footer class="pt-4 my-md-5 pt-md-5 border-top">
    <div class="row">
      <div class="col-12 col-md">
        <small class="d-block mb-3 text-muted">Zetas &copy; 2019-2021</small>
      </div>
    </div>
  </footer>
</div>

<!-- connection gui -->

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Connection</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<center>
<div style="width: 20rem;">
      <div align="center">
         <form method="POST" action="">
            <input type="Name" class="form-control" name="mailconnect" placeholder="Prénom nom"/>
            <br>
            <input type="Password" class="form-control" name="mdpconnect" placeholder="Mot de passe" /> 
            <br>
            <input class="btn btn-success" type="submit" name="formconnexion" value="Se connecter !" /> 
         </form>
         <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>
      </div>
      </div>
    </div>
  </div>
</div>


</body>
</html>
