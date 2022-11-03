<?php
require_once('config.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://localhost/Fproject (1)/Fproject/Fproject/project/templates/style1.css">


</head>
<body style="background-color: #FFFFFF">
<center>
<section class="S8">
<h2 style="text-align: center; color:#003153;">Admin Panel</h2>
<div class="container1">
<div class="row align-items-center">
<div class="col-lg-5 col-xl-5">
<div class="S1_text">
<div class="S1_text_inner">
</div>
</div>
</div>
</div>
</div>
&nbsp;&nbsp;
<div class="main">
<div class="cards">
<div class="image">
  <br>
<img src="img/regi.png" style="height: 192px;" class="center">
</div>
<div class="title">
<h3 style="color:#879dcc; text-align: center ; font-size: 20px;">Register new Student</h3>
</div>
<div class="des">

<button id="reg" style="background-color:#5D8AA8; color:white; padding:10px; border-radius:7px;">Register</button></a>
<br>
<br>
</div>
</div>

<div class="cards">
<div class="image1">
  <br>
<img src="img/sign.png" style="height: 192px;" class="center">
</div>
<div class="title">
<h3 style="color:#879dcc; text-align: center ; font-size: 20px;">Enter details of a student</h3>
</div>
<div class="des">

<a href="adminregister.php"><button style="background-color:#5D8AA8; color:white; padding:10px; border-radius:7px;">Enter</button></a>
<br>
<br>
</div>
</div>

<div class="cards">
<div class="image2">
  <br>
<img src="img/buildings.png" style="height: 180px;" class="center">
</div>
<div class="title">
<h3 style="color:#879dcc; text-align: center ; font-size: 20px;">Placement Panel</h3><br>
</div>
<div class="des">

<a href="placementdata.php"><button style="background-color:#5D8AA8; color:white; padding:10px; border-radius:7px;">Search</button></a>
<br>
<br>
</div>
</div>

<div class="cards">
<div class="image3" style="height: 200px;" >
  <br>
  <br>
  <br>
<img src="img/search1.png" class="center">
</div>
<div class="title">
<h3 style="color:#879dcc; text-align: center ; font-size: 20px;">View Data</h3><br>
</div>
<div class="des">

<a href="studentviewdetails.php"><button style="background-color:#5D8AA8; color:white; padding:10px; border-radius:7px;">View</button></a>
<br>
<br>

</div>
</div>

<!--div class="cards">
<div class="image4" style="height: 200px;">
<br>
<img src="img/immigration.png" class="center">
</div>
<div class="title">
<h3 style="color:#879dcc; text-align: center ; font-size: 20px;">Attendance</h3><br>
</div>
<div class="des">
<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<input type="button" style="background-color:#879dcc; color:black; padding:10px; border-radius:7px;" value="Take Attendance" onclick="goPython()">
<script>
        function goPython(){
            $.ajax({
              url: "train.py",
             context: document.body
            }).done(function() {
             alert('finished python script');;
            });
        }
    </script>
<br>
<br>
</div>
</div-->
</div>
</div>
<!--button class="pbutton" onclick="login()">Login</button><br-->
   <!-- Trigger/Open The Modal -->

<div id="myModal" class="modal">
  <div class="modal-content">
      <span class="close">&times;</span>
       <form action="admin.php" method="post">
      <div class="container">
          <br>
          <br>
          <h1 style="text-align:center;">Student Verification System</h1>
          <br>
          <h3 style="text-align:center;">Enter the registration details.</h3>
        <div class="row">
          <div class="col-sm-4">        
                      <hr class="mb-4"><br>
            <label for="userid"><b>User ID</b></label>
            <input class="form-control" id="userid" type="text" name="userid" required>
                      <br><br>
            <label for="password"><b>Password</b></label>
            <input class="form-control" id="password"  type="password" name="password" required>
                      <br><br>
                      <label for="role"><b>Select Profile:   </b></label>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input id="role" type="radio" name="role" value="admin"/>admin
                      &nbsp;&nbsp;&nbsp;&nbsp;
                      <input id="role" type="radio" name="role" value="student"/>student
                      <br><br>
            <hr class="mb-4"><br>
            <input class="btn" type="submit" id="register" name="create" value="Register"><br>
          </div>
        </div>
      </div>
    </form>
    </div>
  
  </section>
  
  
  
  
  <script type="text/javascript">
  
  // Get the modal
  var modal = document.getElementById("myModal");
  
  // Get the button that opens the modal
  var btn = document.getElementById("reg");
  
  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];
  
  // When the user clicks the button, open the modal 
  btn.onclick = function() {
    modal.style.display = "block";
  }
  
  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
    modal.style.display = "none";
  }
  
  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
    $(function(){
        $('#register').click(function(e){
            var valid = this.form.checkValidity();
            if(valid){

                var userid    = $('#userid').val();
          var password  = $('#password').val();
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
</center>

<style type="text/css">
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
</style>
</body>

</html> 