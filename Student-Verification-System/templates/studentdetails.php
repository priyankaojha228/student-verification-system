<?php
require_once('config.php');
?>
<html>
<head>
<meta name="viewport" content="width=100px, initial-scale=1">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</head>
<style>
#students {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#students td, #students th {
  border: 5px solid #ddd;
  padding: 8px;
}

#students tr:nth-child(even){background-color: #f2f2f2;}

#students tr:hover {background-color: #ddd;}

#students th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #003153;
  color: white;
}
</style>
<body style="background-color: #879dcc">

<div>
<div data-role="page">
  <div data-role="header">
  <br>
<br>
  <h1 style="color: #003153; font-size: 40px; ">Student Tab</h1>
  </div>
  <br>
  <br>
  <div data-role="main" class="ui-content">
	<form action="studentdetails.php" method="post">
    <fieldset data-role="collapsible">
    <legend>Update Details</legend>			
                    <hr>
					<label for="enroll"><b>Enrollment No.</b></label>
					<input class="form-control" id="enroll" type="text" name="enroll">
                    <br>
                    <label for="year"><b>Year</b></label>
                    <select name="year" id="year" class="form-control">
                        <option value="first">I</option>
                        <option value="second">II</option>
                        <option value="third">III</option>
                        <option value="fourth">IV</option>
                    </select>
                    <br>
					<label for="certif"><b>Certification</b></label>
					<input class="form-control" id="certif"  type="text" name="certif">
                    <br>
                    <label for="skill"><b>Skills</b></label>
					<input class="form-control" id="skill"  type="text" name="skill" >
                    <br>
                    <label for="password"><b>Password</b></label>
					<input class="form-control" id="password"  type="text" name="password">
                    <br>
					<hr>
					<input class="button" type="submit" name="submit" value="Save Details">	

</fieldset>
</form>
<?php
require_once('config.php');
include('connection.php'); 
?>
<?php

if(isset($_POST['submit'])){
        $skill = $_POST['skill'];
        $certif = $_POST['certif'];
	    $enroll = $_POST['enroll'];
        $year = $_POST['year'];  
        $password  = $_POST['password'];


        $enroll = stripcslashes($enroll);  
        $password = stripcslashes($password); 
    
        $enroll = mysqli_real_escape_string($con, $enroll);  
        $password = mysqli_real_escape_string($con, $password); 
      
        $sql = "select *from login where Eno = '$enroll' and Password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
         
        if($count == 1){ 
            $sql = "INSERT INTO account(Skills, Certifications, Enu, Year ) VALUES(?,?,?,?)";
            $stmtinsert = $db->prepare($sql);
            $result = $stmtinsert->execute([$skill, $certif, $enroll, $year]);
            if($result){
                echo 'Details updated successfully!!';
            }else{
                echo 'Could not update. Some error occurred!';
            }  
            
       }  
        else{ 
           echo 'Could not update. Some error occurred!';
            
        }   }       
?>
<br>
<br>
<form action="studentdetails.php" method="post">
<fieldset data-role="collapsible">
    <legend>View Details</legend>			
                    <hr>
					<label for="enroll1"><b>Enrollment No.</b></label>
					<input class="form-control" id="enroll1" type="text" name="enroll1">
                    <br>
                    <label for="password1"><b>Password</b></label>
					<input class="form-control" id="password1"  type="text" name="password1">
                    <br>
					<hr>
					<input class="form-control" type="submit" name="view" value="View Details">    
                    </fieldset>
	</form>                
                    <?php  
                    
                    $conn = mysqli_connect("localhost","root","");
                    $db = mysqli_select_db($conn, 'test');

                    if(isset($_POST['view'])){
                        
	                $enroll1 = $_POST['enroll1'];
                    $password1  = $_POST['password1'];
                    $enroll1 = stripcslashes($enroll1);  
                    $password1 = stripcslashes($password1); 
                    $enroll1 = mysqli_real_escape_string($con, $enroll1);  
                    $password1 = mysqli_real_escape_string($con, $password1); 
                    $sql = "select *from login where Eno = '$enroll1' and Password = '$password1'";  
                    $result = mysqli_query($con, $sql);  
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
                    $count = mysqli_num_rows($result);  
         
        if($count == 1){ 
            $sql = "SELECT Eno, Name, Address, Mobilenumber, Father, Mother, scheme FROM student where Eno='$enroll1' ";
                        $retval = mysqli_query( $conn, $sql );
                        while($row=mysqli_fetch_array($retval)){
                            ?>
                            <table id ="students" align="center" border="1px" style="width:600px; line-height:40px;">
                                <tr>
                                    <th>Entity</th>
                                    <th>Value</th> 
                                </tr><br>
                                <tr>
                                    <td>Enrollment No.</td>
                                    <td><?php echo $row['Eno'] ?></td>
                                </tr><br>
                                <tr>
                                    <td>Name</td>
                                    <td><?php echo $row['Name'] ?></td>
                                </tr><br>
                                <tr>
                                    <td>Address</td>
                                    <td><?php echo $row['Address'] ?></td>
                                </tr><br>
                                <tr>
                                    <td>Mobile No.</td>
                                    <td><?php echo $row['Mobilenumber'] ?></td>
                                </tr><br>
                                <tr>
                                    <td>Father's Name</td>
                                    <td><?php echo $row['Father'] ?></td>
                                </tr><br>
                                <tr>
                                    <td>Mother's Name</td>
                                    <td><?php echo $row['Mother'] ?></td>
                                </tr><br>
                                <tr>
                                    <td>Batch</td>
                                    <td><?php echo $row['scheme'] ?></td>
                                </tr><br>
                        </table>

                            <?php// echo "Enrollment No. : {$row['Eno']}" ?>  
                            <?php// echo "Name           : {$row['Name']}" ?>   
                            <?php// echo "Address        : {$row['Address']}" ?>  
                            <?php //echo "Mobile No.     : {$row['Mobilenumber']}" ?>  
                            <?php// echo "Father's Name  : {$row['Father']}" ?>   
                            <?php// echo "Mother's Name  : {$row['Mother']}" ?>   
                            <?php// echo "Batch          : {$row['scheme']}" ?>  
                            <?php
                        }
            
       }  
        else{ 
           echo 'Could not view. Wrong Credentials!';
            
        }   }       
                    ?>                   

</div>
</div>
</div>
</script>
</body>
</html>