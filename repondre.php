<?php require 'header.php';
$sql="SELECT * FROM ENIGME LEFT JOIN enigme_membre ON ENIGME.id = enigme_membre.id_enigme";
              $req = $db->prepare($sql);
              $req->execute();
              $result = $req->fetchAll(PDO::FETCH_ASSOC);
              ?>
<!--  <div class="col-md-0">
                    <p>Bienvenue PSEUDO <?php if(isset($_SESSION['log'])){ echo($_SESSION['log']['pseudo']);?>, pour connaitre l'avancement de votre quête, rendez vous sur <a href="repondre.php"> le grimoire</a></p>
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
  <div class="col-md-offset-4 col-md-4">
    <p class="text-center">Te voici connecté(e) à l’univers fantastique de The Faclab Quest !

Es-tu prêt à résoudre les énigmes les plus improbables jeune fantassin ?

Alors lance-toi & choisis l’énigme par laquelle tu veux commencer !

Il te faudra toutes les résoudre pour donner le mot de passe à l’ogre qui garde l’entrée de la salle tant convoitée !

Il est intransigeant, n’essaie pas de le berner en sautant les étapes ! Il le saura !</p>
-->
<div class="jeu">
  <p></p>
</div>

<div class="list_questions">
	<?php
  var_dump($result);
              foreach($result as $key => $value){
              	echo $value['titre']; ?> <form action="" method="POST"><label for="">Répondre à la question</label>
                    <? if($value['Resolution'] != 1){
                    ?>
                    <input type="repondre" name="repondre" class="form_input"/>
                    <button type="submit" class="btn btn-primary">repondre</button>
                    <?
                  }else {
                    ?>
                    <p>vous avez déjà répondu à la question !</p>
                    <?
                  }

                    ?>

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
                                          <?php

                                          $req->closeCursor();
                                  }
                                  catch (PDOException $e){
                                      echo 'error while inserting enigme :'.$e->getMessage();
                                  };
                                  }
                              }
              }
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
<?php require 'footer.php'; ?>
