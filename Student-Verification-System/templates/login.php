<?php
require_once('connection.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
	<title style="color: white">Student Verification System</title>
	<!-- <link rel="stylesheet" href="style.css"> -->

</head>
<body style="background-color: #FFFFFF">
<center>
<div class="card">
<div>
	<form action="login.php" onsubmit = "return validation()" method="post">
		<div class="container">
        <br>
        <br>
        <h1 style="text-align:center; font-family: Segoe UI; color: white">Student Verification System</h1>    
        <h3 style="text-align:center; color: white;">Enter the login details.</h3>
			<div class="row">
				<div class="col-sm-4">				
                    <hr class="mb-4">
					<label for="userid"><b style="color: white">User ID</b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input class="form-control" id="userid" type="text" name="userid" required>
                    <br>
                    <br>
					<label for="password"><b style="color: white">Password</b></label>&nbsp;&nbsp;&nbsp;
					<input class="form-control" id="password"  type="password" name="password" required>
                    <br>
                    <br>
                    <label for="role"><b style="color: white">Select Profile:   </b></label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input id="admin" type="radio" name="role" value="admin"  /><b style="color: white">admin</b>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input id="student" type="radio" name="role" value="student"/><b style="color: white">student</b>
                    <br>
					<hr class="mb-4">
					<input class="button" type="submit" name="submit" value="Login">
				<br><br>
            </div>
			</div>
		</div>
	</form>
</div>

    <?php      
    include('connection.php');  
    if(isset($_POST['submit'])){
    $userid = $_POST['userid'];
    $password = $_POST['password'];
    $role = $_POST['role']; 
      
        $userid = stripcslashes($userid);  
        $password = stripcslashes($password); 
        $role = stripcslashes($role); 
        $userid = mysqli_real_escape_string($con, $userid);  
        $password = mysqli_real_escape_string($con, $password); 
        $role = mysqli_real_escape_string($con, $role);  
      
        $sql = "select *from login where Eno = '$userid' and Password = '$password' and Role = '$role'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
         
        if($count == 1){ 
            $tnc = $_POST['role'];
            switch($tnc)
            {
                case "admin":
                header("location: http://localhost/Fproject (1)/Fproject/Fproject/project/templates/admin.php ");
                break;

                case "student":
                header("location: http://localhost/Fproject (1)/Fproject/Fproject/project/templates/studentdetails.php");
                break;
            }
            
       }  
        else{ 
           echo '<script>alert("Incorrect Credentials")</script>';
          //  header("location: login.php ");
            
        }   }  
?>
</div>
</center>
</body>
<style>
    .card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 30%;
   margin-top: 80px;
  background-color: #003153;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container {
  padding: 2px 16px;
}



.button {
  border-radius: 4px;
  background-color: #5D8AA8;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 10px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}

</style>
</html>