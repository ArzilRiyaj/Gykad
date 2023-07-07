<?php
session_start();
if ($_SESSION["user"]["user_role"] == 1) {
    // include_once "../top.php";
    include_once "member_head.php";
} else {
    header("Location:../login/logout.php");
}


?>










<?php

include_once "../foot.php";
?>