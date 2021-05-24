<html>
	<head>
		<title>CRUD</title>
		<link rel="stylesheet" href= "<?= asset('css/bootstrap/css/bootstrap.css') ?>">
		<script src="<?= asset('js/jquery-3.3.1.min.js') ?>"></script>
		<script src="<?= asset('css/bootstrap/js/bootstrap.min.js') ?>"></script>
		<script>
			$(document).ready(function(){
				$('#add-record-btn').click(function(){
					var lastname = $('#lname').val();
					var firstname = $('#fname').val();
					var mi = $('#mi').val();
					var age = $('#age').val();
					var gender = $('#gender').val();
						//console.log(lastname+firstname+mi+age+gender);

					var data = {
						//properties
						lname:lastname,
						fname:firstname,
						mi:mi,
						age:age,
						gender:gender
					};	


					$.ajax({
						"url":'http://localhost/Person/public/store',
						"type":'POST',
						"data":data,
						success:function(result){
							location.reload();
						}
					});

				});

 			<?php foreach($persons as $person): ?>
 				$('#edit-btn'+<?= $person->id ?>).click(function(){
 
  					var id = $(this).attr("data-id");
 					var lname = $(this).attr("data-lname");
 					var fname = $(this).attr("data-fname");
 					var mi = $(this).attr("data-mi");
 					var age = $(this).attr("data-age");
 					var gender = $(this).attr("data-gender");

 					$('#edit-id').val(id);
 					$('#edit-lname').val(lname);
 					$('#edit-fname').val(fname);
 					$('#edit-mi').val(mi);
 					$('#edit-age').val(age);
 					$('#edit-gender').val(gender);			

 				});

 				$('#delete-btn'+<?= $person->id ?>).click(function(){
 					
 					var id = $(this).attr("data-id");
 					
 					$.ajax({
						"url":'http://localhost/Person/public/destroy/'+id,
						success:function(result){
							location.reload();
						}
					});		


 				});


 			<?php endforeach; ?>


 				$('#update-record-btn').click(function(){
 					var edit_lname = $('#edit-lname').val();
 					var edit_fname = $('#edit-fname').val();
 					var edit_mi = $('#edit-mi').val();
 					var edit_age = $('#edit-age').val();
 					var edit_gender = $('#edit-gender').val();


					var data = {
						//properties
						lname:edit_lname,
						fname:edit_fname,
						mi:edit_mi,
						age:edit_age,
						gender:edit_gender
					};	

 					var id = $('#edit-id').val();

					$.ajax({
						"url":'http://localhost/Person/public/update/'+id,
						"type":'POST',
						"data":data,
						success:function(result){
							location.reload();
						}
					});		
 				});

			});
		</script>
	</head>
	<body>
		<div class="row">
			<br>
			<br>
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="panel panel-info">
					<div class="panel-heading"></div>
					<div class="panel-body">
						<button class="btn btn-success pull-right" data-toggle="modal" data-target="#add-modal">Add</button>
						<br>
						<br>
<!-- 						<a href="add">Add</a> -->
						<table class="table table-hover table-bordered table-stripped">
							<tr>
								<th>Last Name</th>
								<th>First Name</th>
								<th>M.I</th>
								<th>Age</th>
								<th>Gender</th>
								<th>Actions</th>
							</tr>
							<?php foreach($persons as $person): ?>
				 				<tr>
				 					<td><?= $person->last_name ?></td>
				 					<td><?= $person->first_name ?></td>
				 					<td><?= $person->middle_name ?></td>
				 					<td><?= $person->age ?></td>
				 					<td><?= $person->gender ?></td>
				 					<td>
				 						<button id="edit-btn<?= $person->id ?>" data-id="<?= $person->id ?>" data-fname="<?= $person->first_name ?>" data-lname="<?= $person->last_name ?>" data-mi="<?= $person->middle_name ?>" data-age="<?= $person->age ?>" data-gender="<?= $person->gender ?>" class="btn btn-info" data-toggle="modal" data-target="#edit-modal">Edit</button>
				 						<button id="delete-btn<?= $person->id ?>" class="btn btn-danger" data-id="<?= $person->id ?>">Delete</button>
<!-- 				 					<a href="edit/<?= $person->id ?>">Edit</a>
				 						<a href="destroy/<?= $person->id ?>">Delete</a> -->
				 					</td>
				 				</tr>
							<?php endforeach; ?>
						</table>
					</div>
				</div>
			</div>
		 	<div class="col-md-3"></div>
		 	</div>

			<div id="add-modal" class="modal fade" role="dialog">
				<div class="modal-dialog">

			    <!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Add Person Info</h4>
						</div>
						<div class="modal-body">
							<div class="row">
		           				<div class="col-md-12">
				 					<div class="form-group">
						       			<label>Last Name</label>
		          						<input type="text" id="lname" class="form-control">
		          					</div>
				   				</div>
						    </div>
							<div class="row">
	           					<div class="col-md-12">
	           						<div class="form-group">
    	      							<label>First Name</label>
        	  							<input type="text" id="fname" class="form-control">
	          						</div>
	           					</div>
		        			</div>
						    <div class="row">
								<div class="col-md-12">
			   						<div class="form-group">
		      							<label>Middle Initial</label>
		      							<input type="text" id="mi" class="form-control">
	          						</div>
	          					</div>
		        			</div>
			    			<div class="row">
		       					<div class="col-md-12">
		       						<div class="form-group">
		      							<label>Age</label>
	        							<input type="text" id="age" class="form-control">
	         						</div>
	           					</div>
		        			</div>
						    <div class="row">
			   					<div class="col-md-12">
					           		<div class="form-group">
					  					<label>Gender</label>
			  							<input type="text" id="gender" class="form-control">
				  					</div>
			   					</div>
							</div>
						</div>
						<div class="modal-footer">
							<button class="btn btn-primary" id="add-record-btn" type="button" data-dismiss="modal">Add</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
    				</div>
				</div>
			</div>


<!--edit modal -->
			<div id="edit-modal" class="modal fade" role="dialog">
				<div class="modal-dialog">
 				<input type="hidden" id="edit-id">
			    <!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Add Person Info</h4>
						</div>
						<div class="modal-body">
							<div class="row">
		           				<div class="col-md-12">
				 					<div class="form-group">
						       			<label>Last Name</label>
		          						<input type="text" id="edit-lname" class="form-control">
		          					</div>
				   				</div>
						    </div>
							<div class="row">
	           					<div class="col-md-12">
	           						<div class="form-group">
    	      							<label>First Name</label>
        	  							<input type="text" id="edit-fname" class="form-control">
	          						</div>
	           					</div>
		        			</div>
						    <div class="row">
								<div class="col-md-12">
			   						<div class="form-group">
		      							<label>Middle Initial</label>
		      							<input type="text" id="edit-mi" class="form-control">
	          						</div>
	          					</div>
		        			</div>
			    			<div class="row">
		       					<div class="col-md-12">
		       						<div class="form-group">
		      							<label>Age</label>
	        							<input type="text" id="edit-age" class="form-control">
	         						</div>
	           					</div>
		        			</div>
						    <div class="row">
			   					<div class="col-md-12">
					           		<div class="form-group">
					  					<label>Gender</label>
			  							<input type="text" id="edit-gender" class="form-control">
				  					</div>
			   					</div>
							</div>
						</div>
						<div class="modal-footer">
							<button class="btn btn-primary" id="update-record-btn" type="button" data-dismiss="modal">Edit</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
    				</div>
				</div>
			</div>




	</body>
</html>
