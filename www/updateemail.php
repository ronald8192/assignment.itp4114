<?php 
session_start();
$_SESSION["from"] = "updateemail";
if (!isset($_SESSION["studid"])) {
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit();
}else if(!isset($_POST["newEmail"])) {
    $status = "Update your email below.";
    $err = "";
    $newEmail = "";
}else{
    $newEmail = mysql_real_escape_string($_POST["newEmail"]);
    
    $posSpace = strpos("_".$newEmail," ") or ($posSpace = -1);
    $posSymb1 = strpos("_".$newEmail,";") or ($posSymb1 = -1);
    $posSymb2 = strpos("_".$newEmail,"'") or ($posSymb2 = -1);
    if($posSpace == -1 && $posSymb1 == -1 && $posSymb2 == -1){
        $link = mysql_connect("localhost", "student", "studaccess") or die("Database connection failed!");
        $result = mysql_select_db("SIS", $link) or die("Database could not be selected!");
        $query = "UPDATE student SET email='". $newEmail ."' WHERE studid=".$_SESSION["studid"];
        $result = mysql_query($query, $link) or die("Illegal query!");
        
        $_SESSION["email"] = $newEmail;
        $status = "Your email has been updated!";
        $err = "";
        $newEmail = "";
    }else{
        $status = "Email update failure!";
        $err = " Invalid email address!";
    }
    
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script src="js/jq110min.js"></script>
        <script src="js/updateemail.js"></script>
        <link type="text/css" rel="stylesheet" href="css/style.css" />
        <link type="text/css" rel="stylesheet" href="css/main.css" />
        <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
        <title>Student Information System</title>
    </head>
    <body>
        <div id="container">
            <div id="banner">
                <!-- banner -->
                <img src="img/gear.svg" id="bannerIcon" />
                Student Information System
            </div>
            <nav id="menu" class="box">
                <!-- menu -->
                <a class="btnStandby" href="main.php">Student Info</a>
                <a class="btnActived">Change Email</a>
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
                <form action="updateemail.php" method="post">
                    <table>
                        <tr><td class="field">Current email</td><td><?php echo $_SESSION["email"]; ?></td></tr>
                        <tr><td class="field">New email</td><td><input type="text" name="newEmail" id="newEmail" value="<?php echo $newEmail; ?>"/><span id="msg" class="msg err"> <?php echo $err; ?></span></td></tr>
                        <tr><td></td><td><input type="submit" value="Update" onclick="javascript: return checkEmail()"/></td></tr>                    
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>













