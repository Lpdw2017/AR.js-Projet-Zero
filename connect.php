<?php
require 'header.php';
if(isset($_SESSION['log'])){

$sql="SELECT* FROM ENIGME";
              $req = $db->prepare($sql);
              $req->execute();
              $result = $req->fetchAll(PDO::FETCH_ASSOC);
              ?>
  <div class="row heading-content">
                    <p><h1>Bienvenue <?php if(isset($_SESSION['log'])){ echo($_SESSION['log']['pseudo']);?> </h1> <?php
                      }
                      ?>
</div>
<div="row">
<div class="col-md-offset-2 col-md-8">
<h2 class="text-center">Te voici connecté(e) à l’univers fantastique de </br>The Faclab Quest !</h2></br></br>

<p class="text-center">Es-tu prêt à vivre la quête 2.0 la plus improbable de tous les temps jeune fantassin ?</br>

Alors lance-toi & découvre dès à présent ta première énigme !</br>

Il te faudra toutes les résoudre pour donner le mot de passe à l’ogre qui garde l’entrée de la salle tant convoitée !</br>

Il est intransigeant, n’essaie pas de le berner en sautant les étapes ! Il le saura !</br>

Pour toute réponse, un seul mot (sans accent ni ponctuation) sera accepté.</p>

</div>
<div class="text-center"><img src="assets/images.jpeg">
</div>
<div class="list_questions">
	<?php
              foreach($result as $key => $value){?>

              	<h1><?php echo $value['titre']; ?></h1>




                <form action="" method="POST"><label for="">Répondre à la question</label>
                    <? if($value['Resolution'] != 0){
                    ?>
                    <input type="repondre" name="repondre" class="form_input"/>
                    <button type="submit" class="btn btn-primary">repondre</button>


                    <?}else {?>


                    <p>vous avez déjà répondu à la question !</p>
                    <?}?>


                    <button id ="indice_lieu">Un indice sur le lieu? </button>
                    <div class="lieu"><? echo $value['lieu'];?></div>
                </form>



                <?php
                  if(!empty($_POST)){
                                  $errors = array();

                                  if($value['reponse'] != $_POST['repondre']){
                                      $errors['repondre'] = "vous avez la mauvaise réponse !";
                                  }

                              if(empty($errors)){
                                  try {
                                      $req1 = $db->prepare("INSERT INTO enigme_membre (id_user, id_Enigme, Resolution) VALUES (:id_user, :id_Enigme, :Resolution)");
                                         $req1->execute(
                                              array(
                                                  'id_user' => $_SESSION['log']['id'],
                                                  'id_Enigme' => $value['id'],
                                                  'Resolution' => '1'
                                              )
                                          );
                                          ?>




                                          <p>
                                            Vous avez trouvé la bonne réponse ! Bravo !
                                          </p>
                                          <a href="repondre.php">revenir</a>



                                          <?php $req->closeCursor();
                                  }
                                  catch (PDOException $e){
                                      echo 'error while inserting enigme :'.$e->getMessage();
                                  };}
                              }}
              ?>
              <?php if(!empty($errors)): ?>
              <div class="alert alert-danger">
                  <p>Vous n'avez pas rempli le formulaire correctement</p>
                  <ul>
                      <?php foreach($errors as $error): ?>
                         <li><?= $error; ?></li>
                      <?php endforeach; ?>
                  </ul>
              </div>
              <?php endif; ?>
</div>
<?php } else {
  ?>
  <h3>Vous n'avez rien à faire ici, retournez d'ou vous venez !<a href="index.php">fripouille  !</a> </h3>
  <?php
}

require 'footer.php' ?>
