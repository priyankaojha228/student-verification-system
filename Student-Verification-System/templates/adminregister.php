<?php
// Load the database configuration file
include_once 'dbConfig.php';

// Get status message
if(!empty($_GET['status'])){
    switch($_GET['status']){
        case 'succ':
            $statusType = 'alert-success';
            $statusMsg = 'Members data has been imported successfully.';
            break;
        case 'err':
            $statusType = 'alert-danger';
            $statusMsg = 'Some problem occurred, please try again.';
            break;
        case 'invalid_file':
            $statusType = 'alert-danger';
            $statusMsg = 'Please upload a valid CSV file.';
            break;
        default:
            $statusType = '';
            $statusMsg = '';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body style="background-color: #d5dfed">
<div class="topnav">
  <a class="active" href="admin.php">Home</a>
  <a href="studentviewdetails.php">View Data</a>
  <a href="placementdata.php">Filter Data</a>
</div>
</body>
</html>
<!-- Display status message -->
<?php if(!empty($statusMsg)){ ?>
<div class="col-xs-12">
    <div class="alert <?php echo $statusType; ?>"><?php echo $statusMsg; ?></div>
</div>
<?php } ?>
<!-- For general details -->
<center><div class="row">
    <!-- Import link -->
    <div class="col-md-12 head">
        <div class="float-right"><br><br><br><br>
            <a style="color:#003153; text-decoration: none;" href="javascript:void(0);" class="btn1" onclick="formToggle('importFrm');"><i class="plus"></i><b style="color:#003153; font-size:45px; font-family: sans-serif;">Import General Data</b></a><br><br>
        </div>
    </div>
    <!-- CSV file upload form -->
    <div class="col-md-12" id="importFrm" style="display: none;">
        <form action="importData.php" method="post" enctype="multipart/form-data">
            <input type="file" name="file" />
            <input type="submit" class="btn" name="importSubmit" value="IMPORT">
        </form>
    </div><br><br>
<!-- .... -->
<!-- For academic details -->
<div class="row">
    <!-- Import link -->
    <div class="col-md-12 head">
        <div class="float-right">
            <a style="color:#003153; text-decoration: none;" href="javascript:void(0);" class="btn1" onclick="formToggle('importFrm1');"><i class="plus"></i><b style="color:#003153; font-size:45px; font-family: sans-serif;"> Import Academic Data</b></a><br><br>
        </div>
    </div>
    <!-- CSV file upload form -->
    <div class="col-md-12" id="importFrm1" style="display: none;">
        <form action="importData.php" method="post" enctype="multipart/form-data">
            <input type="file" name="file" />
            <input type="submit" class="btn" name="importSubmit1" value="IMPORT">
        </form>
    </div>
</center>




</div>
<!-- upload files -->
<?php
$con = mysqli_connect("localhost","root","","test");
if (mysqli_connect_errno()) {
echo "Unable to connect to MySQL! ". mysqli_connect_error();
}
if (isset($_POST['save'])) {
$target_dir = "Uploaded_Files/";
$target_file = $target_dir . date("dmYhis") . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

if($imageFileType != "jpg" || $imageFileType != "png" || $imageFileType != "jpeg" || $imageFileType != "gif" ) {
if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
$files = date("dmYhis") . basename($_FILES["file"]["name"]);
}else{
echo "Error Uploading File";
exit;
}
}else{
echo "File Not Supported";
exit;
}
$Enrollnum = $_POST['Enrollnum'];
$name = $_POST['name'];
$filename = $_POST['filename'];
$location = "Uploaded_Files/" . $files;
$sqli = "INSERT INTO `tblfiles` (`Enrollnum`, `name`,`FileName`, `Location`) VALUES ('{$Enrollnum}','{$name}','{$filename}','{$location}')";
$result = mysqli_query($con,$sqli);
if ($result) {
echo "<p align=center>File has been uploaded</p>";
};
}
?>

<center>
<h1 style="color:#003153; font-size:45px; font-family: sans-serif;">Upload Documents</h1>
<form id="upload" class="form" method="post" action="" enctype="multipart/form-data">
<label>Enrollment No. :</label>
<input type="text" name="Enrollnum" > <br/>

<label>Name:</label>
<input type="text" name="name" > <br/>
<label>Filename:</label>
<input type="text" name="filename" > <br/>

<div >
<label>File:</label>
<input type="file" name="file"> <br/>
</div><br>
<button type="submit" name="save" class="btn1"><i class="fa fa-upload fw-fa"></i> Upload</button>
</form>
</center>
<!-- ends upload file -->
<!-- Show/hide CSV upload form -->
<script>
function formToggle(ID){
    var element = document.getElementById(ID);
    if(element.style.display === "none"){
        element.style.display = "block";
    }else{
        element.style.display = "none";
    }
}
</script>

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
 #upload button{
    background-color: #5D8AA8;
    padding: 5px;
    width: 150px;

 }
 #upload input{
    width: 20%;
  padding: 5px ;
  margin: 8px 0;
  box-sizing: border-box;
   display: inline-block;
  float: center;
 }
 #upload label{
    display: inline-block;
    float: center;
    clear: left;
    width: 250px;
    text-align: center;
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