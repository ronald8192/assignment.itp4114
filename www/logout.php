<?php
session_start();
if(isset($_SESSION["studid"])){
        session_unset();
        session_destroy();
        header("Location: index.php");
}else{
    header("Location: index.php");
}

?>