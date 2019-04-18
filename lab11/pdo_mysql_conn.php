<?php
$host ="localhost";
$user ="root";
$passwd="";
$dbname ="firstdb";
try{
    $conn = new PDO("mysql:host=$host;dbname=$dbname",$user,$passwd);
    
}catch(PDOException$e){
    echo"Connection failed: ".$e->getMessage();
}
?>