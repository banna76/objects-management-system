<?php
  $host = "localhost";
  $user = "root";
  $pass = "";
  $db = "omsw";	
  $pdo = new PDO("mysql:host=$host;dbname=$db",$user,$pass);  
  
  // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  function getSelectResults($sql_query) {
	global $pdo;
	$statement = $pdo->prepare($sql_query);
	$statement->execute();
	$results = $statement->fetchAll(PDO::FETCH_ASSOC);
	return $results;
  }
  
    function insertUpdateDeleteData($sql_query) {
	global $pdo;
	$statement = $pdo->prepare($sql_query);
	$results= $statement->execute();
	//$results = $statement->fetchAll(PDO::FETCH_ASSOC);
	return $results;
  }
  
  
?>