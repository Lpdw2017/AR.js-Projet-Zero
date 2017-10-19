<?php
require 'header.php';
if(isset($_SESSION['log'])){

  if($_SESSION['log']['admin'] = 1){
    $sql="SELECT * FROM user";
                  $req = $db->prepare($sql);
                  $req->execute();
                  $result = $req->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <div class="admin">
    	<?php
                  foreach($result as $key => $value){
                    ?> <div class="user"> <?php echo $value['pseudo'];?>
                      <?php echo ("<a class='delet' type='button' href='delete.php?id=".$value['id']."'> Supprimer l'utilisateur </a>");?>
                      <?php echo ("<a class='modif' type='button' href='modification.php?id=".$value['id']."'> modifier l'utilisateur  </a>");?>
                    <?php
                  }
                  ?>
      </div>
      <?php
  }
} else {
  ?>
  <h3>Vous n'avez rien à faire ici, retournez d'ou vous venez !<a href="index.php">fripouille  !</a> </h3>
  <?php
}

require 'footer.php' ?>
