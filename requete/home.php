<?php 
$pdo = new PDO ('mysql:dbname = blog; host=localhost','root', 'root');
$pdo->exec ('SELECT * FROM users') 
?>