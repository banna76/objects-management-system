<!doctype html>
<html lang="en">
  <head>
    <title> Relation Management System!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
     <script src="js/jquery-3.2.1.min.js"></script>
  <script>
		$(document).ready(function(){
			var output="";			

				// callback function
				function dropbox(id,disable,callback) { 
			
					var disableTxt = (disable ? "disabled" : ""); 
					$.post('getalldata.php', function(item){
					var str ="<select name='combobox'"+ disableTxt +">";
					str +="<option value='0'>Please select</option>";
					$.each(item, function (key, val) {
						var selected = (id == val.id ? "selected='selected'" : "");
						str +="<option value='"+val.id+"' "+selected+" >"+val.name+"</option>";
					})
					str +="</select>";
					callback(str);					
					});
				}
				
			$('#search').keyup(function(){
				var id =$(this).val();
				var up_com = true;
				output="";
				$.get('getrelateddata.php',{id:id}, function(data){
					$.each(data, function (key, val) {
						var current_id = val.id;
						var current_id_1 = val.id_1;
						var current_id_2 = val.id_2;
						var up_com_id_1 = "up_com_id_1"+current_id;
						var up_com_id_2 = "up_com_id_2"+current_id;
					output +="<tr>";
					output +="<td><input  id='id-"+val.id+"' class='plane-input-box-id' value='"+val.id+"' readonly></input></td>";
					//output +="<td><input  id='id_1-"+val.id+"' class='plane-input-box'  value='"+val.id_1+"' readonly></input></td>";
					//output +="<td><input  id='id_2-"+val.id+"' class='plane-input-box' value='"+val.id_2+"' readonly></input></td>";
					output += "<td><div id='"+up_com_id_1+"'></div></td>";
					output +="<td><div id='"+up_com_id_2+"'></div></td>";
					output +="<td><button  id='btnUpdate' type='button' class='btn btn-default btn-sm' name='update' value='"+val.id+"'> Edit</button></td>";
					output +="<td><button  id='btnDelete' type='button' class='btn btn-default btn-sm' name='delete' value='"+val.id+"'> Delete </button></td>";
					output +="</tr>";
					dropbox(current_id_1, up_com, function(s) {document.getElementById(up_com_id_1).innerHTML = s;});
					dropbox(current_id_2, up_com, function(s) {document.getElementById(up_com_id_2).innerHTML = s;});
					
					})
					output +="<tr>";
					output +="<td>Insert New :</td>";
					output += "<td><div id='in_com_id_1'></div></td>";
					output +="<td><div id='in_com_id_2'></div></td>";
					output +="<td><input id='btnSubmit' class='btn btn-default btn-sm' type=submit name='insert' value='Insert'></input></td>";
					output +="<td></td>";
					output +="</tr>";
					var in_com = false;
					var send_id = '0';
					
					dropbox(send_id, in_com, function(s) {document.getElementById("in_com_id_1").innerHTML = s;});
					dropbox(send_id, in_com, function(s) {document.getElementById("in_com_id_2").innerHTML = s;});
					$('tbody').html(output);
	
				});
				
			

				

			});
			//button click
				$(document).on('click','#btnSubmit',function(){
					var mode = $("#btnSubmit").attr("name");
					var id_1 = $("#in_com_id_1").find('select[name="combobox"]').find(":selected").val();
					var id_2 = $("#in_com_id_2").find('select[name="combobox"]').find(":selected").val();

					if(id_1 != ""){
						$.post('relationInsertUpdateDelete.php',{mode:mode,id1:id_1,id2:id_2}, function(data){
							$('#error_msg').addClass('show-msgbox');
							$('#error_msg').html(data);
						});
						$("in_com_id_1").find('select[name="combobox"]').find(":selected").val('0');
						$("in_com_id_1").find('select[name="combobox"]').find(":selected").val('0');
					}	
				}); 	
			$(document).on('click','#btnDelete',function(){
				var id =$(this).val();
				var mode = $("#btnDelete").attr("name");
				var msg = "Are you really want to delete id : "+id+" ?";
				if (confirm(msg)) {
					//alert(id+" "+mode);
					$.post('relationInsertUpdateDelete.php',{mode:mode,id:id}, function(data){
						$('#error_msg').addClass('show-msgbox');
						$('#error_msg').html(data);
						});
					$(this).closest('tr').addClass('remove-row');
				}
			});
				
			$(document).on('click','#btnUpdate',function(){
				var id =$(this).val();
				var btnText = $(this).text();
				var mode = $("#btnUpdate").attr("name");
				var Id_1 = "#up_com_id_1"+id;
				var Id_2 = "#up_com_id_2"+id;
				if (btnText === "Update"){
					$(Id_1).find('*').prop('disabled',true);
					$(Id_2).find('*').prop('disabled',true);
					$(this).text("Edit");

					 var Id_1_v = $(Id_1).find('select[name="combobox"]').find(":selected").val();
					 var Id_2_v = $(Id_2).find('select[name="combobox"]').find(":selected").val();
					$.post('relationInsertUpdateDelete.php',{mode:mode,id:id,id1:Id_1_v,id2:Id_2_v}, function(data){
							$('#error_msg').addClass('show-msgbox');
							$('#error_msg').html(data);
						});
				}else{
					$(this).text("Update");
					$(Id_1).find('*').prop('disabled',false);
					$(Id_2).find('*').prop('disabled',false);
				}
			}); 
			
		});
  </script>
<style>
	.plane-input-box {border-style:none;background:none;}
	.plane-input-box-id {border-style:none;background:none;width:30px;}
	textarea { resize: vertical;overflow: hidden;}
	.remove-row {display:none;}
	.shadow-box {box-shadow: 2px 2px 2px #888888;}
	.alert {display:none;}
	.show-msgbox {display:block;}
</style>
  </head>
  <body>
	<div class="container">
		<div class="card">
			<div class="card-body">
			<input type="search" class="form-control" id="search" placeholder="Search name..."></input>
			</div>	
		</div>
		<div class="card">
			<div class="card-body">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>ID_1</th>
						<th>ID_2</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				
				</tbody>
			</table>
			<div class="alert alert-info" id="error_msg"></div>
			</div>	
		</div>
		<div class="card">
			<div class="card-body">
				<a href="index.php">Home</a> | <a href="admin.php">Admin</a>
			</div>
		</div>
	</div>
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
  </body>
</html>