<?php
$htmlmsg = "";
$msgstyle = "err";
if(isset($_SESSION["studid"])){
    header("Location: main.php");
    exit();
}
if(isset($_POST["studid"])){
    $studid = mysql_real_escape_string($_POST["studid"]);
    $passwd = $_POST["passwd"];
    $posSpace = strpos("_".$studid," ") or ($posSpace = -1);
    $posSymb1 = strpos("_".$studid,";") or ($posSymb1 = -1);
    $posSymb2 = strpos("_".$studid,"'") or ($posSymb2 = -1);
    if($posSpace == -1 && $posSymb1 == -1 && $posSymb2 == -1){
        if(!$link = mysql_connect("localhost","student","studaccess")){
            die("Connect database fail.");
        } 
        if (!mysql_select_db("SIS", $link)){
            die("Select database fail.");
        }
        $query = "SELECT password FROM student WHERE studid='". $studid ."'";
        if (!$result = mysql_query($query, $link)){
            die("Illegal query");
        }
        if (!$rec = mysql_fetch_array($result)) {
            $studid = "";
            loginFail();
        } else {
            $passwdhash = $rec["password"];
            if(!password_verify($passwd,$passwdhash)){
                loginFail();
            }else{
                $msgstyle = 'info';
                $htmlmsg = 'Login successfully!';
                session_start();
                $_SESSION["studid"] = $studid;
                $_SESSION["from"] = "login";
                session_encode();
                header("Location: main.php?PHPSESSID=". $PHPSESSID);
                exit();
            }
        }
    }else{
        $studid = "";
        loginFail();
    }
    
}else{
    $msgstyle = 'err';
    $htmlmsg = '&nbsp;';
    $studid = "";
}

function loginFail(){
    global $htmlmsg, $msgstyle;
    $htmlmsg = 'Login failure!';
    $msgstyle = 'err';
}
?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script src="js/jq110min.js"></script>
        <script src="js/index.js"></script>
        <link type="text/css" rel="stylesheet" href="css/index.css" />
        <link type="text/css" rel="stylesheet" href="css/style.css" />
        <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
        <title>Student Information System</title>
    </head>
    <body>
        <div id="fakeBody">
            <form action="index.php" method="post">
                <div class="banner">
                    <img src="img/gear.svg" id="bannerIcon" width="70" height="70" />
                    Student Information System
                </div>
                <div class="center box-login" id="box-login">

                    <div class="title">
                        Login
                    </div>
                    <div class="<?php echo $msgstyle; ?> msg" id="msg"> 
                        <?php                             
                            echo $htmlmsg;
                        ?>
                    </div>
                    <div>
                        <input type="text" id="studid" name="studid" class="txtBox" value="<?php echo $studid; ?>" placeholder="Student ID"/>
                        <input type="password" id="passwd" name="passwd" class="txtBox" placeholder="Password"/>
                    </div>
                    <div>
                        <input type="submit" value="Go" id="studLogin" onclick="javascript:return studlogin()"/>
                    </div>
                </div>
            </form>

            <div class="footer">
                Safari | 1680x1050 | Mac OS X
            </div>
        </div>
        
    </body>
</html>
