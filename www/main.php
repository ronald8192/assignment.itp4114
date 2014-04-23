<?php 
session_start();
if (!isset($_SESSION["studid"])) {
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit() ;
} else {
    if(!isset($_SESSION["fname"]) || !isset($_SESSION["lname"]) ||
       !isset($_SESSION["email"]) || !isset($_SESSION["programcode"])){
        $link = mysql_connect("localhost", "student", "studaccess") or die("1");
        mysql_select_db("SIS", $link) or die("2");
        $query = mysql_query("select fname, lname ,email, programcode 
                             FROM student s join studentcourse sc on s.studid=sc.studid 
                             WHERE s.studid=" . $_SESSION["studid"]) or die("3");
        $studInfo = mysql_fetch_array($query) or die("4");
        $_SESSION["fname"] = $studInfo["fname"];
        $_SESSION["lname"] = $studInfo["lname"];
        $_SESSION["email"] = $studInfo["email"];
        $_SESSION["programcode"] = $studInfo["programcode"];
    }
    
    $welcomemsg = "Welcome back, " . $_SESSION["fname"] . " !";
    
    if(isset($_SESSION["from"])){
        if($_SESSION["from"] == "login"){
            $status = "Login successfully! &nbsp;&nbsp;". $welcomemsg;
        }else{
            $status = $welcomemsg;
        }
    }else{
        $status = $welcomemsg;
    }
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link type="text/css" rel="stylesheet" href="css/main.css" />
        <link type="text/css" rel="stylesheet" href="css/style.css" />
        <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
        <title>Student Information System</title>
    </head>
    <body>
        <div id="container">
            <div id="banner">
                <!-- banner -->
                <img src="img/gear.svg" id="bannerIcon" width="50px" height="50px;" />
                Student Information System
            </div>
            <nav id="menu" class="box">
                <!-- menu -->
                <a class="btnActived">Student Info</a>
                <a class="btnStandby" href="updateemail.php">Change Email</a>
                <a class="btnStandby" href="logout.php" id="btnlogout">Logout</a>
            </nav>
            <div id="statusbar" class="box">
                <!-- status bar -->
                <ul>
                    <li>
                        <?php echo $status; ?>                    
                    </li>
                </ul>
            </div>
            <div id="content" class="box">
                <!-- content -->
                <table>
                    <tr><td class="field">Student Number</td><td><?php echo $_SESSION["studid"]; ?></td></tr>
                    <tr><td class="field">Student Name</td><td><?php echo $_SESSION["fname"] . " " . $_SESSION["lname"]; ?></td></tr>
                    <tr><td class="field">Password</td><td>********</td></tr>
                    <tr><td class="field">Program Code</td><td><?php echo $_SESSION["programcode"]; ?></td></tr>
                    <tr><td class="field">Email</td><td><?php echo $_SESSION["email"]; ?></td></tr>
                </table>
            </div>
        </div>
    </body>
</html>













