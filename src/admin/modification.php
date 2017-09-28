<?php require '../header.php';
require_once '../inc/db.php';
if(isset($_SESSION['log'])){
    if($_SESSION['log']['admin'] = 1){
        $sql="SELECT * FROM user WHERE id = :id";
              $req = $db->prepare($sql);
              $req->execute(array( ':id' => $_GET['id']));
              $result = $req->fetchAll(PDO::FETCH_ASSOC);


                  $errors = array();

                  if( !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['pseudo'])){
                      $errors['pseudo'] = "Votre pseudo n'est pas valide (alphanumérique)";
                  } else {
                      $req = $db->prepare('SELECT id FROM user WHERE pseudo = ?');
                      $req->execute([$_POST['pseudo']]);
                      $user = $req->fetch();
                      if($user){
                          $errors['pseudo'] = 'Ce pseudo est déjà pris';
                      }
                  }

                  if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                      $errors['email'] = "Votre email n'est pas valide";
                  } else {
                      $req = $db->prepare('SELECT id FROM user WHERE email = ?');
                      $req->execute([$_POST['email']]);
                      $user = $req->fetch();
                      if($user){
                          $errors['email'] = 'Cet email est déjà utilisé pour un autre compte';
                      }
                  }

                  if( $_POST['motdepasse'] != $_POST['password_confirm']){
                      $errors['motdepasse'] = "Vous devez rentrer un mot de passe valide";
                  }

              if(empty($errors)){
                  try {
                      $req = $db->prepare("UPDATE user (pseudo, motdepasse, email) VALUES (:pseudo, :motdepasse, :email)");
                         $req->execute(
                              array(
                                  'pseudo' => $_POST['pseudo'],
                                  'motdepasse' => $_POST['motdepasse'],
                                  'email' => $_POST['email']
                              )
                          );
                          ?>
                          <p>
                            Vous voila inscrit !
                          </p>
                          <a href="index.php">maintenant, connectez vous !</a>
                          <?php

                          $req->closeCursor();
                  }
                  catch (PDOException $e){
                      echo 'error while inserting user :'.$e->getMessage();
                  };
                  }
    ?>
    <p> Vous voulez mettre à jour les informations de <?php $result[0]['pseudo']; ?> ? Pas de soucis, remplissez ce formulaire</p>

    <form action="" method="POST">

        <div class="form-group">
            <label for="">Pseudo (actuellement <?php $result[0]['pseudo']; ?>)</label>
            <input type="text" name="pseudo" class="form-control"/>
        </div>

        <div class="form-group">
            <label for="">Email (actuellement <?php $result[0]['pseudo']; ?>) </label>
            <input type="text" name="email" class="form-control"/>
        </div>

        <div class="form-group">
            <label for="">Mot de passe</label>
            <input type="password" name="motdepasse" class="form-control"/>
        </div>

        <div class="form-group">
            <label for="">Confirmez votre mot de passe</label>
            <input type="password" name="password_confirm" class="form-control"/>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour les infos</button>
    </form>

<?php
  }
}
