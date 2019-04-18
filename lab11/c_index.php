<?php
//Check if cookie is set
if(isset($_COOKIE['login']) or !empty($_COOKIE['login'])){
    $login = $_COOKIE['login'];
    $uname = $_COOKIE['uname'];
    $counter = $_COOKIE['counter'];

    setcookie("login",$login,time()+3600);
    setcookie("uname",$uname,time()+3600);
    setcookie("counter",++$counter,time()+3600);

    echo"<center><h3>Welcome back $uname and your login is $login ($counter) </h3><br>";
    echo"<a href = \"c_user_detail.php\">User detail</a><br>";
    echo"<a href = \"c_logout.php\">Logout</a>";
    exit;
}else{
?>
<html><body>
    <form method="POST" action ="c_authen.php">
    <center><h1>User Login</h1>
        <center>
        <table border="0" width="auto">
        <tr> <td>Login name</td>
             <td input type ="text" name="login" size="30"></td>
        </tr>
        <tr> <td>Password</td>
             <td><input type="password" name="passwd" size="30"></td>
        </tr>
        </table>
    <center>
    <p><input type="submit" value="Submit" name="sub">
    <input type="reset" value="Reset" name="res"></p>
    </center>
    </form>
</body>
</html>
<?php>
}
?>