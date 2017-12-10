<?php
include('conn.php');

$sql_query = "select * from objects where id='".$_GET['id']."'";
$results=getSelectResults($sql_query);
  
header('Content-Type: application/json');
echo json_encode($results);
?>