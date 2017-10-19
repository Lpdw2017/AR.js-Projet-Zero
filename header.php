<?php
require('inc/session.php');
require('inc/db.php');
?>
<!doctype html>
<html lang="fr" >
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Realite augmentee</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<div class="container">
          <nav class="row navbar navbar-inverse">
            <ul id="menu_horizontal" class="nav navbar-nav">
              <li><a href="index.php">Accueil</a></li>
              <li><a href="inscription.php">Inscription</a></li>
              <li><a href="connexion.php"><i class="fa fa-user-circle" aria-hidden="true"></i>  Connexion</a></li>
              <?php if(isset($_SESSION['log'])){?>
                <li><a href="connect.php">Mon Grimoire</a></li>
              <?php } ?>
              <?php if(isset($_SESSION['log']['admin'])){?>
                              <li><a href="admin.php">Administration</a></li>
              <?php } ?>
              <li><a href="deconnexion.php">Déconnexion</a></li>
            </ul>
          </nav>
<body>
