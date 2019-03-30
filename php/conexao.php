<?php

define('SERVER', 'alv4v3hlsipxnujn.cbetxkdyhwsb.us-east-1.rds.amazonaws.com');
define('BANCO', 'a5cs5fjis77aj3b5');
define('SENHA', 'z9zpne3a9ulmh9hg');
define('USER', 'lwk8f7zk8565v63f');

try{

$con = new pdo('mysql:host=' . SERVER . ';dbname=' . BANCO, USER, SENHA);

}catch(PDOException $e){
echo "Erro gerado " . $e->getMessage(); 
}

?>