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
<body style="background-color:c2c2c2">
<div class="container-fluid">
  <div class="row">




    <div class="col-md-8" style="margin:auto;float:none;background-color:#000;height:100%">
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
      					<h3>The Faclab Quest:</h3></br></br>
      					<p>Ola voyageur temporel !  </br></br></br>
                  Prêt à vivre la plus incroyable quête & à accéder ainsi aux portes du très convoité Faclab ?
                  Alors inscris-toi, connecte-toi & plonge-toi dans un univers encore inexploré ! L’aventure t’attend !
      					</P>
        </div>
      	<div class="col-md-6">
      			<a href="camera.php"><img src="./images.jpeg"></img>
      	</div>

        <? /*  </section> */?>
    </div>
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
