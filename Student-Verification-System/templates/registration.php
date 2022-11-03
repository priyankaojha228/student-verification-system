<?php
require_once('config.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Verification System</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

<div>
	<form action="registration.php" method="post">
		<div class="container">
        <br>
        <br>
        <h1 style="text-align:center;">Student Verification System</h1>
        <br>
        <h3 style="text-align:center;">Enter the registration details.</h3>
			<div class="row">
				<div class="col-sm-4">				
                    <hr class="mb-4">
					<label for="userid"><b>User ID</b></label>
					<input class="form-control" id="userid" type="text" name="userid" required>
                    <br>
					<label for="password"><b>Password</b></label>
					<input class="form-control" id="password"  type="password" name="password" required>
                    <br>
                    <label for="role"><b>Select Profile:   </b></label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input id="role" type="radio" name="role" value="admin"/>admin
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input id="role" type="radio" name="role" value="student"/>student
                    <br>
					<hr class="mb-4">
					<input class="btn btn-primary" type="submit" id="register" name="create" value="Register">
				</div>
			</div>
		</div>
	</form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
    $(function(){
        $('#register').click(function(e){
            var valid = this.form.checkValidity();
            if(valid){

                var userid  	= $('#userid').val();
			    var password	= $('#password').val();
                var role        = $("input[name='role']:checked").val()

                e.preventDefault();

                $.ajax({
                    type: 'POST',
					url: 'process.php',
					data: {userid: userid, password: password, role: role},
					success: function(data){
					Swal.fire({
								'title': 'Successful',
								'text': data,
								'type': 'success'
								})
							
					},
					error: function(data){
						Swal.fire({
                            'icon': 'error',
                            'title': 'Failed!!',
                            'text': 'Wrong login credentials!',
                            })
					}

                });
                
            }else{
                
            }
            
            
        });
        
        
    });
</script>
</body>
</html>