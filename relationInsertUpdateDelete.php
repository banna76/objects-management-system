<?php
include('conn.php');
	$output="";
	if($_POST['mode'] == "insert")
	{
		global $output;
	   $id1=$_POST['id1'];
	   $id2=$_POST['id2'];
	   $qu="insert into relations values('','$id1','$id2')";
	   $res=insertUpdateDeleteData($qu);
	   if($res){
		   $output ="$id1 has been inserted Successfullly!";
	   }else{
		   $output = $res;
	   }
	}
	if($_POST['mode']  == "delete")
	{
		global $output;
		$id=$_POST['id'];
        $qu="delete from relations where id='$id'";
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
	    $id1=$_POST['id1'];
	    $id2=$_POST['id2'];
	    $qu="update relations set id_1='$id1',id_2='$id2' where id='$id'";
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