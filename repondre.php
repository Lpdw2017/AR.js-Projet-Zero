<?php require 'header.php';
$sql="SELECT * FROM ENIGME";
              $req = $db->prepare($sql);
              $req->execute();
              $result = $req->fetchAll(PDO::FETCH_ASSOC);
              ?>
<div class="list_questions">
	<?php
              foreach($result as $key => $value){var_dump($value);
              	echo $value['titre']; ?> <form action="" method="POST"><label for="">Répondre à la question</label>
                    <? if($value['Resolution'] = 0){
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