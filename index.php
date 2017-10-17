<?php
require('inc/session.php');
require('inc/db.php');
?>
<!doctype html>
<html class="" lang="fr" >
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Realite augmentee</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <!--Theme custom css -->
        <link rel="stylesheet" href="assets/css/style.css">
        <!--Theme Responsive css-->
        <link rel="stylesheet" href="assets/css/responsive.css" />
        <script src="assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <script src="https://cdn.rawgit.com/jeromeetienne/AR.js/1.5.0/aframe/examples/vendor/aframe/build/aframe.min.js"></script>
        <script src="https://cdn.rawgit.com/jeromeetienne/AR.js/1.5.0/aframe/build/aframe-ar.js"></script>

    </head>
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-2" style="background-color: #A9A9A9; height:100%;">
      <p>Bienvenue compagnon <?php if(isset($_SESSION['log'])){ echo($_SESSION['log']['pseudo']);?>, pour connaitre l'avancement de votre quête, rendez vous sur <a href="repondre.php"> le grimoire</a></p>
      <?php
        if($_SESSION['log']['admin'] = 1){
      ?>
      <p>Vous êtes un administrateur compagnon. Rendez vous sur <a href="admin.php"> le panneau d'administration</a> pour user de vos droits. </p>
      <?php
        }
       ?>
       <?php
        }
        ?>
    </div>



    <div class="col-md-8">
      <div class="row">
        <?php
          require 'header.php';

        ?>
      </div>
      <div class="row">
        <? /*<section id="slideshow"> */?>



        <div class="heading-content">
               <h1>La Réalité Augmentée</br> débarque dans ta fac !</h1>
        </div>

        <div class="col-md-6">
      					<h3>Projet 0 :</h3></br></br>
      					<p>Voici une description de notre projet : </br></br></br>
      					Inter has ruinarum varietates a Nisibi quam tuebatur accitus Vrsicinus, cui nos obsecuturos iunxerat
      					imperiale praeceptum, dispicere litis exitialis certamina cogebatur abnuens et reclamans, adulatorum
      					oblatrantibus turmis, bellicosus sane milesque semper et militum ductor sed forensibus iurgiis longe
      					discretus, qui metu sui discriminis anxius cum accusatores quaesitoresque subditivos sibi consociatos
      					ex isdem foveis cerneret emergentes
      					</P>
        </div>
      	<div class="col-md-6">
      			<a href="camera.php"><img src="./images.jpeg"></img>
      	</div>

        <? /*  </section> */?>
    </div>
  </div>

<div class="col-md-2" style="background-color: #A9A9A9;">
  colonne droite
</div>

<div class="row">
  <div class="col-md-12">
<?php
 require 'footer.php';
 ?>
 </div>
 </div>
 </div>
 </div>
 </body>
</html>
