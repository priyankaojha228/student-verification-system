<?php
require_once('config.php');
?>
<?php

if(isset($_POST)){
        $eno = $_POST['eno'];
        $name = $_POST['name'];
	    $address = $_POST['address'];
        $mobilenumber = $_POST['mobilenumber'];
        $dno = $_POST['dno'];
        $father = $_POST['father'];
        $mother = $_POST['mother'];        
        $scheme = $_POST['scheme']; 

		$sql = "INSERT INTO student(Eno, Name, Address, Mobilenumber, Dno, Father, Mother, scheme) VALUES(?,?,?,?,?,?,?,?)";
            $stmtinsert = $db->prepare($sql);
            $result = $stmtinsert->execute([$eno, $name, $address, $mobilenumber, $dno, $father, $mother, $scheme]);
            if($result){
                echo 'Details updated successfully!!';
            }else{
                echo 'There were errors!!';
            }
}else{
	echo 'No data';
}

// if(isset($_POST)){
//         $enum = $_POST['enum'];
//         $ogpa = $_POST['ogpa'];
//         $year = $_POST['year'];
//         $semester1 = $_POST['semester1'];
//         $semester2 = $_POST['semester2'];
//         $semester3 = $_POST['semester3'];
//         $semester4 = $_POST['semester4'];
//         $semester5 = $_POST['semester5'];
//         $semester6 = $_POST['semester6'];
//         $semester7 = $_POST['semester7'];
//         $semester8 = $_POST['semester8'];

        
//         $sql = "INSERT INTO result(Enum, Ogpa, Year, Semester1, Semester2, Semester3, Semester4, Semester5, Semester6, Semester7, Semester8 ) VALUES(?,?,?,?,?,?,?,?,?,?,?)";
//             $stmtinsert = $db->prepare($sql);
//             $result = $stmtinsert->execute([$enum, $ogpa, $year, $semester1, $semester2, $semester3, $semester4, $semester5, $semester6, $semester7, $semester8]);
//             if($result){
//                 echo 'Details updated successfully!!';
//             }else{
//                 echo 'There were errors!!';
//             }
// }else{
//     echo 'No data';
// }