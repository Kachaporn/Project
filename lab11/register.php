<?php
include("mysql_conn.php");
$fname=$_REQUEST['fname'];
$lname=$_REQUEST['lname'];
$login=$_REQUEST['login'];
$passwd_sha1=md5($_REQUEST['passwd']);
echo "passwd_sha1:" .$passwd_sha1. "<br>";

$sql="INSERT INTO users(fname,lname,login,passwd) values(:bp_fname,:bp_lname,:bp_login,:bp_passwd)";

$stmt=$conn->prepare($sql);
$stmt->bindParam(':bp_fname',$fname);
$stmt->bindParam(':bp_lname',$lname);
$stmt->bindParam(':bp_login',$login);
$stmt->bindParam(':bp_passwd',$passwd_sha1);
$stmt->execute();
if($stmt!==false){
    echo $stmt->rowCount(). "records INSERTED";
}else{echo"Insertion failed";
}
?>
