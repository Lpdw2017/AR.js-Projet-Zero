<?php
setcookie('remember', NULL, -1);
unset($_SESSION['log']);
$_SESSION['flash']['success'] = 'Vous êtes maintenant déconnecté';
header('Location: connexion.php');
