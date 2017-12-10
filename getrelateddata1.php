<?php
include('conn.php');

$sql_query = "SELECT name FROM objects where id in(select id_2 from relations where id_1='".$_GET['id']."')";

$results=getSelectResults($sql_query);
  
header('Content-Type: application/json');
echo json_encode($results);
?>