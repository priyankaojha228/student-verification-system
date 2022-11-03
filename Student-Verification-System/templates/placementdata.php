<?php 

//index.php

include('pconfig.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Product filter in php</title>

    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href = "css/jquery-ui.css" rel = "stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
</head>
<style type="text/css">
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
<body>
    <!-- Page Content -->

<div class="topnav">
  <a class="active" href="admin.php">Home</a>
  <a href="studentviewdetails.php">View Data</a>
  <a href="adminregister.php">Upload Data</a>
</div>
    <div class="container">
        <div class="row">
         <br />
         <h2 style="color: #003153" align="center">Student Data</h2>
         <br />
            <div class="col-md-3">                    
    <div class="list-group">
     <h3 style="color: #003153">Ogpa</h3>
     <input type="hidden" id="hidden_minimum_ogpa" value="0" />
                    <input type="hidden" id="hidden_maximum_ogpa" value="10" />
                    <p id="ogpa_show">0 - 10</p>
                    <div id="ogpa_range"></div>
                </div>    
                <!-- <div class="list-group">
     <h3>Ogpa</h3>
                    <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
     <?php

                    $query = "SELECT DISTINCT(Ogpa) FROM result WHERE status = '1' ORDER BY Ogpa DESC";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector Ogpa" value="<?php echo $row['Ogpa']; ?>"  > <?php echo $row['Ogpa']; ?></label>
                    </div>
                    <?php
                    }

                    ?>
                    </div>
                </div> -->

    <div class="list-group">
     <h3 style="color: #003153">Placement Status</h3>
                    <?php

                    $query = "
                    SELECT DISTINCT(Pstatus) FROM student WHERE sstatus = '1' ";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector Pstatus" value="<?php echo $row['Pstatus']; ?>" > <?php echo $row['Pstatus']; ?></label>
                    </div>
                    <?php    
                    }

                    ?>
                </div>
    
    <div class="list-group">
     <h3 style="color: #003153">Department</h3>
     <?php
                    $query = "
                    SELECT DISTINCT(Dname) FROM department WHERE dstatus = '1' ";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector Dname" value="<?php echo $row['Dname']; ?>"  > <?php echo $row['Dname']; ?> </label>
                    </div>
                    <?php
                    }
                    ?> 
                </div>

                <!-- <div class="list-group">
                 <h3>Skills</h3>
                    <?php

                    $query = "
                    SELECT DISTINCT(Skills) FROM account WHERE astatus = '0' ";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector Skills" value="<?php echo $row['Skills']; ?>" > <?php echo $row['Skills']; ?></label>
                    </div>
                    <?php    
                    }

                    ?>
                </div> -->


            </div>

            <div class="col-md-9">
             <br />
                <div class="row filter_data">

                </div>
            </div>
        </div>

    </div>
<style>
#loading
{
 text-align:center; 
 background: url('img/loader.gif') no-repeat center; 
 height: 150px;
}
</style>

<script>
$(document).ready(function(){

    filter_data();

    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_placementdata';
        var minimum_ogpa = $('#hidden_minimum_ogpa').val();
        var maximum_ogpa = $('#hidden_maximum_ogpa').val();
        // var Ogpa = get_filter('Ogpa');
        var Pstatus = get_filter('Pstatus');
        var Dname = get_filter('Dname');
        // var storage = get_filter('storage');
        $.ajax({
            url:"fetch_placementdata.php",
            method:"POST",
            data:{action:action, minimum_ogpa:minimum_ogpa, maximum_ogpa:maximum_ogpa, Pstatus:Pstatus, Dname:Dname, },
            success:function(data){
                $('.filter_data').html(data);
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });

    $('#ogpa_range').slider({
        range:true,
        min:0,
        max:10,
        values:[0, 10],
        step:0.5,
        stop:function(event, ui)
        {
            $('#ogpa_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_ogpa').val(ui.values[0]);
            $('#hidden_maximum_ogpa').val(ui.values[1]);
            filter_data();
        }
    });

});
</script>

</body>

</html>