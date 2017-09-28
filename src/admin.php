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
                    ?> <div class="user"> <?php echo $value['pseudo']; ?>
                      <?php echo "<button class='delet' type='button' href='admin/delete.php?id='.$key.'> Supprimer l'utilisateur </button>"?>
                      <?php echo "<button class='modif' type='button' href='admin/modification.php?id='.$key.'> modifier l'utilisateur  </button>"?>
                    <?php
                  }
                  ?>

      </div>
      <?php
  }
}
require 'footer.php' ?>
