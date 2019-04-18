<?php
//Check is user already login or still login?
if(!isset($_COOKIE['login'])or !isset($_COOKIE['uname'])){
    echo "<font color ='red'><b>Error :You do not login to system</b></font><br>";
    echo "Please <a href=\"c_index.php\">Login</a><br>";
}
else{
    $login =$_COOKIE['login'];
    $uname =$_COOKIE['uname'];

    include ("mysql_conn.php");

    $query ="SELECT lname FROM users where login=:bp_login";
    $stmt =$conn->prepare($query);
    $stmt->bindParam(':bp_login',$login);

    $stmt->execute();
        if($stmt !== false){
            if($stmt->rowCount()==1){
                $row =$stmt->fetch(PDO::FETCH_ASSOC);
                $lname =$row['lname'];
                echo "<table width =200><tr><td colspan =2 align ='center'><b>User details</h1></td></b>";
                echo "<tr><td>First name:</td><td>$uname</td></tr>";
                echo "<tr><td>Last name:</td><td>$lname</td></tr>";
                echo "<tr><td>Login:</td><td>$login</td></tr>";
                echo "</table>";
            } 
            else {
                echo "There is no data found";
                exit;
            }
            //end if($stmt !==false)
            $conn =null;
        }
}
?>