<?php
require '../header.php';

if(isset($_SESSION['log'])){
    if($_SESSION['log']['admin'] = 1){
        $sql="SELECT * FROM user WHERE id = :id";
              $req = $db->prepare($sql);
              $req->execute(array( ':id' => $_GET['id']));
              $result = $req->fetchAll(PDO::FETCH_ASSOC);
var_dump($result);
    ?>
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
