<?php
include('conn.php');
	$output="";
	if($_POST['mode'] == "insert")
	{
		global $output;
	   $name=$_POST['name'];
	   $desc=$_POST['desc'];
	   $type=$_POST['type'];
	   $qu="insert into objects values('','$name','$desc','$type')";
	   $res=insertUpdateDeleteData($qu);
	   if($res){
		   $output ="$name has been inserted Successfullly!";
	   }else{
		   $output = $res;
	   }
	}
	if($_POST['mode']  == "delete")
	{
		global $output;
		$id=$_POST['id'];
        $qu="delete from objects where id='$id'";
		$res=insertUpdateDeleteData($qu);
	   if($res){
		   $output ="ID:$id has been deleted Successfullly!";
	   }else{
		   $output = $res;
	   }
	}

	if($_POST['mode'] == "update")
	{
		global $output;
		$id=$_POST['id'];
	   $name=$_POST['name'];
	   $desc=$_POST['desc'];
	   $type=$_POST['type'];
	   $qu="update objects set name='$name',description='$desc',type='$type' where id='$id'";
	   $res=insertUpdateDeleteData($qu);
	   if($res){
		   $output ="$id has been updated Successfullly!";
	   }else{
		   $output = $res;
	   }
	}
		
	header('Content-Type: application/json');
	echo json_encode($output);
?>