<?php
require 'header.php';

if(isset($_SESSION['log'])){
    if($_SESSION['log']['admin'] = 1){
        $sql="DELETE FROM user WHERE id = :id";
              $req = $db->prepare($sql);
              $req->execute(array( ':id' => $_GET['id']));

?>
<p> Vous avez bien supprimé l'utilisateur</p>
<a href="admin.php">maintenant, revenons au panneau d'admin</a>
<?php
}
var_dump($req);
}
require 'footer.php';
