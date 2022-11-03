<?php
require_once('config.php');
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="http://localhost/Fproject/Fproject/project/templates/style.css">
<!--<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">-->
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<!--<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script> -->
</head>
<style>
#students {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 50%;
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

   .btn{
  border-radius: 4px;
  background-color: #5D8AA8;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 18px;
  padding: 5px;
  width: 150px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
    }

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #5D8AA8;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #516687;
  color: white;
}
</style>


<!-- style="background-image : url('img/45.jpg'); background-repeat: no-repeat; " -->

<body style="background-color: #d5dfed">
<div class="topnav">
  <a class="active" href="admin.php">Home</a>
  <a href="adminregister.php">Upload Data</a>
  <a href="placementdata.php">Filter Data</a>
</div>

<div>
<div data-role="page">
  <div data-role="header">
  <br>
<br>
  <center><h1 style="color: #003153; font-size: 40px; ">Verification Tab</h1></center>
  </div>
  <br>
<form action="studentviewdetails.php" method="post">

    <center><h1 style="color: #003153 "></h1></center><br><br>			
                    <h6 style="margin-left: 15px;">Enter the name of student whom you want to verify.</h6>
                    <hr>

					<label for="Name"><b style="margin-left: 15px; ">Name</b></label>
					<input style="width: 300px; border: 2px solid black; border-radius: 4px;" id="Name" type="text" name="Name">
                    <br>
					<hr>
					<input class= "btn" style="margin-left: 15px;" type="submit" name="view" value="View Details"> 

                    <?php  
                    
                    $conn = mysqli_connect("localhost","root","");
                    $db = mysqli_select_db($conn, 'test');

                    if(isset($_POST['view'])){
                        $Name = $_POST['Name'];
                        $sql = "SELECT Eno, Name, Address, Mobilenumber, Father, Mother, scheme, Ogpa, Year, 
                        Semester1, Semester2, Semester3, Semester4, Semester5, Semester6, Semester7, Semester8 
                        FROM student, result where Eno = Enum and Name='$Name' ";

                        $retval = mysqli_query( $conn, $sql );
                        while($row=mysqli_fetch_array($retval)){
                            ?>
                            <table id ="students"align="center" border="5px" style="width:600px; line-height:40px;">
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
                                <tr>
                                    <td>Ogpa</td>
                                    <td><?php echo $row['Ogpa'] ?></td>
                                </tr><br>
                                <tr>
                                    <td>Year</td>
                                    <td><?php echo $row['Year'] ?></td>
                                </tr><br>
                                <tr>
                                    <td>Semester1</td>
                                    <td><?php echo $row['Semester1'] ?></td>
                                </tr><br>
                                <tr>
                                    <td>Semester2</td>
                                    <td><?php echo $row['Semester2'] ?></td>
                                </tr><br>
                                <tr>
                                    <td>Semester3</td>
                                    <td><?php echo $row['Semester3'] ?></td>
                                </tr><br>
                                <tr>
                                    <td>Semester4</td>
                                    <td><?php echo $row['Semester4'] ?></td>
                                </tr><br>
                                <tr>
                                    <td>Semester5</td>
                                    <td><?php echo $row['Semester5'] ?></td>
                                </tr><br>
                                <tr>
                                    <td>Semester6</td>
                                    <td><?php echo $row['Semester6'] ?></td>
                                </tr><br>
                                <tr>
                                    <td>Semester7</td>
                                    <td><?php echo $row['Semester7'] ?></td>
                                </tr><br>
                                <tr>
                                    <td>Semester8</td>
                                    <td><?php echo $row['Semester8'] ?></td>
                                </tr><br>


                                <!-- view document -->
                                <br>
                                <div class="container">
                                <table id="students" align="center" class="table table-bordered" >
                                <thead>
                                <tr><br><br>
                                
                                <td>FileName</td>
                                <td>Action</td>
                                
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sqli = "SELECT * FROM `tblfiles` where name='$Name' ";
                                $res = mysqli_query($conn, $sqli);
                                while ($row = mysqli_fetch_array($res)) {
                                echo '<tr>';
                                echo '<td>'.$row['FileName'].'</td>';
                                echo '<td><a class="bttn" href="'.$row['Location'].'">View</a></td>';
                                echo '</tr>';
                                }
                                mysqli_close($conn);
                                ?>
                                </tbody>
                                </table>
                                </div>
                                    <!-- end view document -->
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
                    ?>                   
   
	</form>


 
</div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript"></script>
</body>
</html>




