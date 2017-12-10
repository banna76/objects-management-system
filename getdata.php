<?php
include('conn.php');

$sql_query = "select * from objects where LOWER(name) like LOWER('%".$_GET['name']."%')";
$results=getSelectResults($sql_query);
//var_dump($results); 
header('Content-Type: application/json');
echo json_encode($results);
?>