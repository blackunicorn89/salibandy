<?php
// Skriptissä määritellään tietokantayhteyden asetukset
function dbConnect (){
 	$conn =	null;
 	$host = 'mysql14.000webhost.com';
 	$db = 	'a7901619_Players';
 	$user = 'a7901619_aehe';
 	$pwd = 	't7b5c17ecs?';
	try {
	   	$conn = new PDO('mysql:host='.$host.';dbname='.$db, $user, $pwd);
	}
	catch (PDOException $e) {
		echo '<p>Cannot connect to database !!</p>';
		echo '<p>'.$e.'</p>';
	    exit;
	}
	return $conn;
 }

 ?>