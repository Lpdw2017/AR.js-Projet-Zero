<?php require 'header.php';
$lol = 'trololo';

if(isset($_SESSION['log'])){
?>
<div class="message_connexion">
  <p>Bienvenu <?php echo($_SESSION['log']['pseudo']);?></p>
  <p>Profite bien de ton voyage ici...</p>
</div>
<?php
if($_SESSION['log']['admin'] = 1){
  ?>
  <div class="admin_panneau">
    <p>Vous êtes un administrateur, vous pouvez vous connectés ici !
    <a href="admin.php">admin</a>'
<?php
}
} ?>

        <!-- Sections -->
        <section id="about" class="about sections">
            <div class="container">
                <!-- Example row of columns -->
				<div class="heading-content text-center">
          <script >
          var lol = '<?php echo $lol; ?>' ;
          console.log(lol);
          </script>

					<h3>Projet 0</h3>
					<p>Voici une description de notre projet : </br>
					Inter has ruinarum varietates a Nisibi quam tuebatur accitus Vrsicinus, cui nos obsecuturos iunxerat
					imperiale praeceptum, dispicere litis exitialis certamina cogebatur abnuens et reclamans, adulatorum
					oblatrantibus turmis, bellicosus sane milesque semper et militum ductor sed forensibus iurgiis longe
					discretus, qui metu sui discriminis anxius cum accusatores quaesitoresque subditivos sibi consociatos
					ex isdem foveis cerneret emergentes
					</P>
					<img src="assets/images/separator.png" alt="Separator" />
						<div >
							<a href="camera.php"><img src="images.jpeg" />
						</div>
				</div>
</div>
<?php

 require 'footer.php'; ?>
