<?php 
 $host = 'localhost';
 $db = 'dbpuskesmas';
 $user = 'root';
 $pass = '';
 
 
 $dsn = "mysql:host=$host;dbname=$db";
 
 $dbh = new PDO($dsn, $user, $pass)
?>