<?php
include('conn.php');

if(!empty($_GET['id'])){
$sql_query = "select * from relations where id_1 like '%".$_GET['id']."%'";
}else{
$sql_query = "select * from relations";
}

$results=getSelectResults($sql_query);
  
header('Content-Type: application/json');
echo json_encode($results);
?>