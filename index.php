<!doctype html>
<html lang="en">
  <head>
    <title> Objects Management System</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="js/jquery-3.2.1.min.js"></script>
  <script>
	$(document).ready(function(){
		$('#search').keyup(function(){
			var name =$(this).val();
			var Str= "";
			$.get('getdata.php',{name:name}, function(data){
				$.each(data, function (key, val) {
					
						Str+="<div class='item' id='"+val.id+"'>"+val.name+"</div>";

				})
				$('div#result').html(Str);
			});
		});
		$(document).on('click', 'div.item', function() {
			var id =$(this).attr('id');
			var Str ="";
			$.get('getdatabyid.php',{id:id}, function(data){
				$.each(data, function (i, dataitem) {
					Str+="<div class='card'><div class='card-body'><b>"+dataitem.name+"</b></div></div><div class='space5px'></div><div class='card'><div class='card-body'>"+dataitem.description+"</div></div>";
				})
				$('div#details').html(Str);

			});
			var nStr ="";
			$.get('getrelateddata1.php',{id:id}, function(data){
			
				$.each(data, function (i, relateditem) {
					nStr+="<div class='card'><div class='card-body'>"+relateditem.name+"</div></div>";
					})
				$('div#relations').html(nStr);
			});
		});
	});
  </script>
<style>
	.space5px {margin-top:5px;}
	
</style>
  </head>
  <body>
	<div class="container">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-sm" >
						<form method="post" action="#">
							<input type="search" class="form-control" name="name" id="search" placeholder="Suchfeld">
						</form>
						<div class="space5px"></div>
						<div class="card" style="min-height:400px;">
							<div class="card-body">
								<div id="result"></div>
							</div>
						</div>
					</div>
					<div class="col-sm">
						<div class="card" style="min-height:435px;">
							<div class="card-body">
								<div class="card">
									<div class="card-body" id="details"></div>
								</div>
								<div class="card">
									<div class="card-body"><b>Relationen</b></div>
								</div>
								<div class="card">
									<div class="card-body" id="relations"></div>
								</div>
							</div>	
						</div>	
					</div>
				</div>
				
			</div>
		</div>
		<div class="card">
			<div class="card-body">
				<a href="admin.php">Admin</a>
			</div>
		</div>
	</div>
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>