<?php
require 'header.php';

if(isset($_SESSION['log'])){
    if($_SESSION['log']['admin'] = 1){
        $sql="SELECT * FROM user WHERE id = :id";
              $req = $db->prepare($sql);
              $req->execute(array( ':id' => $_GET['id']));
              $result = $req->fetchAll(PDO::FETCH_ASSOC);
if(!empty($_POST)){

    $errors = array();

    if(empty($_POST['pseudo']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['pseudo'])){
        $errors['pseudo'] = "Votre pseudo n'est pas valide (alphanumérique)";
    } else {
        $req = $db->prepare('SELECT id FROM user WHERE pseudo = ?');
        $req->execute([$_POST['pseudo']]);
        $user = $req->fetch();
        if($user){
            $errors['pseudo'] = 'Ce pseudo est déjà pris';
        }
    }

    if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $errors['email'] = "Votre email n'est pas valide";
    } else {
        $req1 = $db->prepare('SELECT id FROM user WHERE email = ?');
        $req1->execute([$_POST['email']]);
        $user = $req1->fetch();
        if($user){
            $errors['email'] = 'Cet email est déjà utilisé pour un autre compte';
        }
    }

    if(empty($_POST['motdepasse']) || $_POST['motdepasse'] != $_POST['password_confirm']){
        $errors['motdepasse'] = "Vous devez rentrer un mot de passe valide";
    }

if(empty($errors)){
    try {
        $req1 = $db->prepare("UPDATE user SET pseudo = :pseudo, motdepasse = :motdepasse, email = :email ");
           $req1->execute(
                array(
                    'pseudo' => $_POST['pseudo'],
                    'motdepasse' => $_POST['motdepasse'],
                    'email' => $_POST['email']
                )
            );
            ?>
            <p>
              Felicitation vous avez changés les informations de <?php echo($_POST['pseudo']); ?>
            </p>
            <a href="admin.php">maintenant, revenons au panneau d'admin</a>
            <?php

            $req1->closeCursor();
    }
    catch (PDOException $e){
        echo 'error while inserting user :'.$e->getMessage();
    };
    }
}
    ?>
    <?php if(!empty($errors)): ?>
    <div class="alert alert-danger">
        <p>Vous n'avez pas rempli le formulaire correctement</p>
        <ul>
            <?php foreach($errors as $error): ?>

    <div class="alert alert-success" role="alert"><li><?= $error; ?></li></div>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php endif; ?>
    <p> Vous voulez mettre à jour les informations de <?php echo($result[0]['pseudo']); ?> ? Pas de soucis, remplissez ce formulaire</p>

    <form action="" method="POST">

        <div class="form-group">
            <label for="">Pseudo (actuellement <?php  echo($result[0]['pseudo']); ?>)</label>
            <input type="text" name="pseudo" class="form-control"/>
        </div>

        <div class="form-group">
            <label for="">Email (actuellement <?php echo($result[0]['email']); ?>) </label>
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
require 'footer.php';
