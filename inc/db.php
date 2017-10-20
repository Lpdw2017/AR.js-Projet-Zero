<?php
$host ='localhost';
$db_name ='arjs_kwry';
$user ='arjs_kwry';
$password ='lpdw2017';

try {
$db = new PDO("mysql:dbname=" .$db_name.";host=" .$host, $user, $password );
$db ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e){
    echo 'error while connecting :'.$e->getMessage();
};
?>
