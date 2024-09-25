<?php

$conn = mysqli_connect('localhost','root','','21140296_22226101_22166523') or die('connection failed');


function pdo_connect_mysql() {
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'shoppingcart';
    try {
    	return new PDO('mysql:host='.$DATABASE_HOST .';dbname=' .$DATABASE_NAME . ';charset=utf8',$DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
    	exit('Failed to connect to the database.');
    }
}

$host = "localhost";
$dbname = "21140296_22226101_22166523";
$username = "root";
$password = "";

$mysqli = new mysqli( $host, $username, $password, $dbname);
                     
if ($mysqli->connect_errno) {
    die("There has been a connection error: " . $mysqli->connect_error);
}

return $mysqli;

