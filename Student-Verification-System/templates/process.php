<?php
require_once('config.php');
?>
<?php

if(isset($_POST)){

	    $userid = $_POST['userid'];
        $password = $_POST['password'];
        $role = $_POST['role'];
		$sql = "INSERT INTO login(Eno, Password, Role ) VALUES(?,?,?)";
            $stmtinsert = $db->prepare($sql);
            $result = $stmtinsert->execute([$userid, $password, $role]);
            if($result){
                echo 'Successfully Registered!!';
            }else{
                echo 'There were errors!!';
            }
}else{
	echo 'No data';
}