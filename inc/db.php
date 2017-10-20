<?php
$host ='localhost';
$db_name ='arjs';
$user ='root';
$password ='root';

try {
$db = new PDO("mysql:dbname=" .$db_name.";host=" .$host, $user, $password );
$db ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e){
    echo 'error while connecting :'.$e->getMessage();
};
?>
