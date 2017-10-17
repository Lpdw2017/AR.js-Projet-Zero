<?php
require_once 'inc/functions.php';
if(!empty($_POST)){

    $errors = array();
    require_once 'inc/db.php';

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
        $req = $db->prepare('SELECT id FROM user WHERE email = ?');
        $req->execute([$_POST['email']]);
        $user = $req->fetch();
        if($user){
            $errors['email'] = 'Cet email est déjà utilisé pour un autre compte';
        }
    }

    if(empty($_POST['motdepasse']) || $_POST['motdepasse'] != $_POST['password_confirm']){
        $errors['motdepasse'] = "Vous devez rentrer un mot de passe valide";
    }

if(empty($errors)){
    try {
        $req = $db->prepare("INSERT INTO user (pseudo, motdepasse, email) VALUES (:pseudo, :motdepasse, :email)");
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
            <a href="connexion.php">maintenant, connectez vous !</a>
            <?php

            $req->closeCursor();
    }
    catch (PDOException $e){
        echo 'error while inserting user :'.$e->getMessage();
    };
    }
}
?>

<h1>S'inscrire</h1>

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

<form action="" method="POST">

    <div class="form-group">
        <label for="">Pseudo</label>
        <input type="text" name="pseudo" class="form-control"/>
    </div>

    <div class="form-group">
        <label for="">Email</label>
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

    <button type="submit" class="btn btn-primary">M'inscrire</button>

</form>
