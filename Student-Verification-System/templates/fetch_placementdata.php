<?php

//fetch_data.php

include('pconfig.php');

if(isset($_POST["action"]))
{
 $query = "
  SELECT * FROM student as S, result as R, department as D WHERE S.Eno = R.Enum and R.status = '1' and S.Dno = D.Dno and D.dstatus = '1' and S.sstatus = '1'   
 ";
 if(isset($_POST["minimum_ogpa"], $_POST["maximum_ogpa"]) && !empty($_POST["minimum_ogpa"]) && !empty($_POST["maximum_ogpa"]))
 {
  $query .= "
   AND R.Ogpa BETWEEN '".$_POST["minimum_ogpa"]."' AND '".$_POST["maximum_ogpa"]."'
  ";
 }
 // if(isset($_POST["Ogpa"]))
 // {
 //  $Ogpa_filter = implode("','" , $_POST["Ogpa"]);
 //  $query .= "
 //   AND Ogpa IN('".$Ogpa_filter."')
 //  ";
 // }
 if(isset($_POST["Pstatus"]))
 {
  $Pstatus_filter = implode("','", $_POST["Pstatus"]);
  $query .= "
   AND Pstatus IN('".$Pstatus_filter."')
  ";
 }
 if(isset($_POST["Dname"]))
 {
  $Dname_filter = implode("','", $_POST["Dname"]);
  $query .= "
   AND Dname IN('".$Dname_filter."')
  ";
 }
 // if(isset($_POST["Skills"]))
 // {
 //  $Skills_filter = implode("','", $_POST["Skills"]);
 //  $query .= "
 //   AND Skills IN('".$Skills_filter."')
 //  ";
 // }
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $total_row = $statement->rowCount();
 $output = '';
 if($total_row > 0)
 {
  ?>
   
     <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
            <th style="width: 19%;">Name</th>
            <th style="width: 17%;">Father</th>
            <th style="width: 17%;">Mother</th>
            <th style="width: 13%;">Mobilenumber</th>
            <th style="width: 10%;">Placement Status</th>
            <th style="width: 10%;">Dname</th>
            <th style="width: 20%;">Address</th>
            <th style="width: 8%;">Ogpa</th>
            </tr>
        </thead>
        <!-- <tbody><tr>
        <td style="width: 18%;">'. $row['Name'] .'</td>
        <td style="width: 17%;">'. $row['Father'] .'</td>
        <td style="width: 17%;">'. $row['Mother'] .'</td>
        <td style="width: 13%;">'. $row['Mobilenumber'] .'</td>
        <td style="width: 10%;">'. $row['Pstatus'] .' </td>
        <td style="width: 10%;">'. $row['Dname'] .' </td>
        <td style="width: 20%;">'. $row['Address'] .' </td>
        <td style="width: 8%;">'. $row['Ogpa'] .'  </td>
            </tr>
            </tbody> -->
            </table><?php
            foreach($result as $row)
            {
              echo "<table border='1'>";
             $output .= '
             
               <!--table class="table table-striped table-bordered">
                  <thead class="thead-dark">
                      <tr>
                          <th>Name</th>
                          <th>Father</th>
                          <th>Mother</th>
                          <th>Mobilenumber</th>
                          <th>Placement Status</th>
                          <th>Dname</th>
                          <th>Address</th>
                          <th>Ogpa</th>
                      </tr>
                  </thead-->
                  <table class="table table-striped table-bordered">
                  <tbody><tr>
                          <td style="width: 18%;">'. $row['Name'] .'</td>
                          <td style="width: 17%;">'. $row['Father'] .'</td>
                          <td style="width: 17%;">'. $row['Mother'] .'</td>
                          <td style="width: 13%;">'. $row['Mobilenumber'] .'</td>
                          <td style="width: 10%;">'. $row['Pstatus'] .' </td>
                          <td style="width: 10%;">'. $row['Dname'] .' </td>
                          <td style="width: 20%;">'. $row['Address'] .' </td>
                          <td style="width: 8%;">'. $row['Ogpa'] .'  </td>
                      </tr>
                      </tbody>

    
    

    
   ';
  }?></table><?php
 }
 else
 {
  $output = '<h3>No Data Found</h3>';
 }
 echo $output;
}

?>

<style type="text/css">
  .table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: grey;
  color: white;
}
</style>

