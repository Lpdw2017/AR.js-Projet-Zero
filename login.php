<?php
if(isset($_SESSION['log'])){
?>
<div class="Alerte connexion">
  <div class="alert alert-danger" role="alert">Vous êtes déjà connecté, Impossible de vous connecté deux fois <?php echo($_SESSION['log']['pseudo']) ?>
</div> <?php
}
else {

  if(isset($_POST['pseudo']) AND isset($_POST['motdepasse'])){

      if(!empty($_POST['pseudo']) AND !empty($_POST['motdepasse'])){

          $pseudo = $_POST['pseudo'];
          $motdepasse = $_POST['motdepasse'];
          $req = $db->prepare('SELECT * FROM user WHERE (pseudo = :pseudo OR email = :pseudo)');
          $req->execute(['pseudo' => $_POST['pseudo']]);
          $req->setFetchMode(PDO::FETCH_OBJ);
          $donnees = $req->fetch();
          $res = $req->rowCount();
          if(($res) != 0){
              if(($motdepasse == $donnees->motdepasse)){
               $id = $donnees->id;
               $admin = $donnees->admin;

                      /* Création des sessions */
                      $_SESSION['log'] = array(
                          'id' => $id,
                          'pseudo' => $pseudo,
                          'motdepasse' => $motdepasse,
                          'admin' => $admin
                      );
                       echo ($_SESSION['log']['pseudo'].", vous êtes connecté  ! vous pouvez dorénavant revenir à la page d'index. <a href='index.php'>Revenir à la page principale</a>");
              }
              else{
                  echo '<div class="alert alert-danger" role="alert"> <p class="erreur2">Le mot de passe est incorrecte</p></div>';
              }
          }
          else{

              echo '<p class="erreur2">Ce pseudo n\'existe pas, <a href="index.php">Connectez-vous!</a></p>';

          }

      }
      else{

          echo '<p class="erreur2">Veuillez remplir tous les champs</p>';

      }

  }
}
?>

    <h1>Se connecter</h1>

    <form action="" method="POST">

        <div class="form-group">
            <label for="">Pseudo ou email</label>
            <input type="text" name="pseudo" class="form-control"/>
        </div>

        <div class="form-group">
            <label for="">Mot de passe</label>
            <input type="password" name="motdepasse" class="form-control"/>
        </div>
<br>
        <button type="submit" class="btn btn-primary">Se connecter</button>

    </form>
