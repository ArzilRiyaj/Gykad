<?php
session_start();
include_once "packages.php";
$p = new package();

if($_SESSION["user"]["user_role"]==2){


    include_once "../head.php";
}
else{
    header("Location:../login/logout.php");
}


$p->get_all_active_package();

?>





<?php
include_once "../foot.php"
?>