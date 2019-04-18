<?php
//Check is login/password empty?
if(empty($_REQUEST['login']) || empty($_REQUEST['passwd'])){
    echo"<font color='red'><b>Please fill Login name and Password</b></font>";
    echo"<a href=\"c_index.php\">Bact to Login</a>";
    exit;
}
else{
    //Collect the details and validate
    $login = $_REQUEST['login'];
    $passwd_sha1 = md5($_REQUEST['passwd']);

    include("mysql_conn.php");

    $query = "select * from users where login =:bp_login and passwd=:bp_passwd";
    $stmt =$conn->prepare($query);
    $stmt->bindParam(':bp_login',$login);
    $stmt->bindParam(':bp_passwd',$passwd_sha1);

    /*
    echo"Login: " .$login . "<br>";
    echo"PASSWORD: ".$passwd_sha1. "<BR>";
    echo$query."<br">;
    */

    $stmt->execute();

    if($stmt!==false){
        if($stmt->rowCount()==1){
            $row =$stmt->fetch(PDO::FETCH_ASSOC);
            $uname =$row["fname"];

            $counter=1;
            setcookie("login",$login,time()+3600);
            setcookie("uname",$uname,time()+3600);
            setcookie("counter",$counter,time()+3600);
            echo"SET Cookie to login :$login<br>";
            echo"SET Cookie to uname :$uname<br>";
            echo"SET Cookie to counter :$counter<br>";

            echo"<a href=\"c_user_detail.php\">User detail</a><br>";
            echo"<a href=\"c_index.php\">Login agin</a>";          
        }
        $conn =null;
    }
?>