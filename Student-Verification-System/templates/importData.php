<?php
// Load the database configuration file
include_once 'dbConfig.php';
// .....For General details
if(isset($_POST['importSubmit'])){
    
    // Allowed mime types
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    
    // Validate whether selected file is a CSV file
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
        
        // If the file is uploaded
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            // Skip the first line
            fgetcsv($csvFile);
            
            // Parse data from CSV file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                // Get row data
                $Eno = $line[0];
                $Name = $line[1];
                $Address = $line[2];
                $Mobilenumber = $line[3];
                $Dno = $line[4];
                $Father = $line[5];
                $Mother = $line[6];
                $scheme = $line[7];


                
                // Check whether member already exists in the database with the same email
                $prevQuery = "SELECT Eno FROM student WHERE Eno = '".$line[0]."'";
                $prevResult = $db->query($prevQuery);
                
                if($prevResult->num_rows > 0){
                    // Update member data in the database
                    $db->query("UPDATE student SET Eno = '".$Eno."', Name = '".$Name."', Address = '".$Address."', Mobilenumber = '".$Mobilenumber."', Dno = '".$Dno."', Father = '".$Father."', Mother = '".$Mother."', scheme = '".$scheme."'  WHERE Eno = '".$Eno."'");
                }else{
                    // Insert member data in the database
                    $db->query("INSERT INTO student (Eno, Name, Address, Mobilenumber, Dno, Father, Mother, scheme) VALUES ('".$Eno."','".$Name."', '".$Address."', '".$Mobilenumber."', '".$Dno."', '".$Father."','".$Mother."','".$scheme."')");
                }
            }
            
            // Close opened CSV file
            fclose($csvFile);
            
            $qstring = '?status=succ';
        }else{
            $qstring = '?status=err';
        }
    }else{
        $qstring = '?status=invalid_file';
    }
}
// ....

 // ...For Academic data
if(isset($_POST['importSubmit1'])){
    
    // Allowed mime types
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    
    // Validate whether selected file is a CSV file
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
        
        // If the file is uploaded
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            // Skip the first line
            fgetcsv($csvFile);
            
            // Parse data from CSV file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                // Get row data
                $Enum = $line[0];
                $Ogpa = $line[1];
                $Year = $line[2];
                $Semester1 = $line[3];
                $Semester2 = $line[4];
                $Semester3 = $line[5];
                $Semester4 = $line[6];
                $Semester5 = $line[7];
                $Semester6 = $line[8];
                $Semester7 = $line[9];
                $Semester8 = $line[10];
                $status = $line[11];


                
                // Check whether member already exists in the database with the same email
                $prevQuery = "SELECT Enum FROM result WHERE Enum = '".$line[0]."'";
                $prevResult = $db->query($prevQuery);
                
                if($prevResult->num_rows > 0){
                    // Update member data in the database
                    $db->query("UPDATE result SET Enum = '".$Enum."', Ogpa = '".$Ogpa."', Year = '".$Year."', Semester1 = '".$Semester1."', Semester2 = '".$Semester2."', Semester3 = '".$Semester3."', Semester4 = '".$Semester4."', Semester5 = '".$Semester5."', Semester6 = '".$Semester6."', Semester7 = '".$Semester7."', Semester8 = '".$Semester8."', status = '".$status."'  WHERE Enum = '".$Enum."'");
                }else{
                    // Insert member data in the database
                    $db->query("INSERT INTO result (Enum, Ogpa, Year, Semester1, Semester2, Semester3, Semester4, Semester5, Semester6, Semester7, Semester8, status) VALUES ('".$Enum."','".$Ogpa."', '".$Year."', '".$Semester1."', '".$Semester2."', '".$Semester3."','".$Semester4."','".$Semester5."','".$Semester6."','".$Semester7."','".$Semester8."','".$status."')");
                }
            }
            
            // Close opened CSV file
            fclose($csvFile);
            
            $qstring = '?status=succ';
        }else{
            $qstring = '?status=err';
        }
    }else{
        $qstring = '?status=invalid_file';
    }
}
            
            // ...
            
// Redirect to the listing page
header("Location: adminregister.php".$qstring);