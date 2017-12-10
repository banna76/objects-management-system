<!doctype html>
<html lang="en">
  <head>
    <title>Admin - Hasanul Banna</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
     <script src="js/jquery-3.2.1.min.js"></script>
  <script>
		$(document).ready(function(){
			var output="";
			$('#search').keyup(function(){
				var name =$(this).val();
				output="";
				$.get('getdata.php',{name:name}, function(data){
					$.each(data, function (key, val) {
					output +="<tr>";
					output +="<td><input  id='id-"+val.id+"' class='plane-input-box-id' value='"+val.id+"' readonly></input></td>";
					output +="<td><input  id='name-"+val.id+"' class='plane-input-box'  value='"+val.name+"' readonly></input></td>";
					output +="<td><textarea id='desc-"+val.id+"' class='plane-input-box' rows='3' cols='40' readonly>"+val.description+"</textarea></td>";
					output +="<td><input  id='type-"+val.id+"' class='plane-input-box' value='"+val.type+"' readonly></input></td>";
					output +="<td><button  id='btnUpdate' type='button' class='btn btn-default btn-sm' name='update' value='"+val.id+"'> Edit</button></td>";
					output +="<td><button  id='btnDelete' type='button' class='btn btn-default btn-sm' name='delete' value='"+val.id+"'> Delete </button></td>";
					output +="</tr>";
					})
					output +="<tr>";
					output +="<td>new:</td>";
					output +="<td><input type='text' class='form-control' name='txtname'></input></td>";
					output +="<td><input type='text' class='form-control' name='txtdesc'></input></td>";
					output +="<td><input type='text' class='form-control' name='txttype'></input></td>";
					output +="<td><input id='btnSubmit' class='btn btn-default btn-sm' type=submit name='insert' value='Insert'></input></td>";
					output +="<td></td>";
					output +="</tr>";
					$('tbody').html(output);
				});
			});
			//button click
				$(document).on('click','#btnSubmit',function(){
					var mode = $("#btnSubmit").attr("name");
					var name = $('[name=txtname]').val();
					var desc = $('[name=txtdesc]').val();
					var type = $('[name=txttype]').val();
					if(name != ""){
						$.post('insertUpdateDelete.php',{mode:mode,name:name,desc:desc,type:type}, function(data){
							$('#error_msg').addClass('show-msgbox');
							$('#error_msg').html(data);
						});
						$('[name=txtname]').val("");
						$('[name=txtdesc]').val("");
						$('[name=txttype]').val("");
					}	
				}); 	
			$(document).on('click','#btnDelete',function(){
				var id =$(this).val();
				var mode = $("#btnDelete").attr("name");
				var msg = "Are you really want to delete id : "+id+" ?";
				if (confirm(msg)) {
					//alert(id+" "+mode);
					$.post('insertUpdateDelete.php',{mode:mode,id:id}, function(data){
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
				var nameId = "#name-"+id;
				var descId = "#desc-"+id;
				var typeId = "#type-"+id;
				if (btnText === "Update"){
					$(nameId).removeClass('shadow-box').prop("readonly",true);
					$(descId).removeClass('shadow-box').prop("readonly",true);
					$(typeId).removeClass('shadow-box').prop("readonly",true);
					$(this).text("Edit");
					var nameValue = $(nameId).val();
					var descValue = $(descId).val();
					var typeValue = $(typeId).val();
					$.post('insertUpdateDelete.php',{mode:mode,id:id,name:nameValue,desc:descValue,type:typeValue}, function(data){
							$('#error_msg').addClass('show-msgbox');
							$('#error_msg').html(data);
						});
				}else{
					$(this).text("Update");
					$(nameId).addClass('shadow-box').prop("readonly",false);
					$(descId).addClass('shadow-box').prop("readonly",false);
					$(typeId).addClass('shadow-box').prop("readonly",false);	
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
						<th>Name</th>
						<th>Description</th>
						<th>Type</th>
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
				<a href="index.php">Home</a> | <a href="relation.php">Relation</a>
			</div>
		</div>
	</div>
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
  </body>
</html>