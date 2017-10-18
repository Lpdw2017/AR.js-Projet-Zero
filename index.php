<?php
require('inc/session.php');
require('inc/db.php');
?>
<!--    <div class="col-md-0">
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
-->
        <?php
          require 'header.php';
        ?>
        <? /*<section id="slideshow"> */?>

        <div class="row heading-content">
               <h1>La Réalité Augmentée</br> débarque dans ta fac !</h1>
        </div>
        <div class="row">
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
      </div>
        <? /*  </section> */?>

<?php
 require 'footer.php';
 ?>
