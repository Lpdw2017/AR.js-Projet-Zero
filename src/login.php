<?php
require_once 'inc/functions.php';
require 'inc/session.php';
require_once 'inc/db.php';
if(isset($_SESSION['log'])){
    header('Location: index.php');
    exit();
}
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
                    /* Création des sessions */
                    $_SESSION['log'] = array(
                        'id' => $id,
                        'pseudo' => $pseudo,
                        'motdepasse' => $motdepasse,

                    );
                     echo 'Connecté !';
            }
            else{
                echo '<p class="erreur2">Le mot de passe est incorrecte</p>';
            }

        }
        else{

            echo '<p class="erreur2">Ce pseudo n\'existe pas</p>';

        }

    }
    else{

        echo '<p class="erreur2">Veuillez remplir tous les champs</p>';

    }

}
var_dump($_SESSION['log']);
?>

    <h1>Se connecter</h1>

    <form action="" method="POST">

        <div class="form-group">
            <label for="">Pseudo ou email</label>
            <input type="text" name="pseudo" class="form-control"/>
        </div>

        <div class="form-group">
            <label for="">Mot de passe <a href="forget.php">(J'ai oublié mon mot de passe)</a></label>
            <input type="password" name="motdepasse" class="form-control"/>
        </div>

        <div class="form-group">
            <label>
                <input type="checkbox" name="remember" value="1"/> Se souvenir de moi
            </label>
        </div>
<br>
        <button type="submit" class="btn btn-primary">Se connecter</button>

    </form>
