<?php


	$t=$_GET["type"];
	$t();


function payment_amount(){

    include_once("../Payment/payment.php");
    $p = new payment();
   $x = $p->get_payment_amt_by_member_id($_GET["ee"]);
   echo json_encode($x);
}


function remove_workout_from_list(){
    include_once ("../shedule/schedule_list.php");
    $sl=  new schedule_list();

    $sl->remove_workout_from_list($_GET["ee"]);



}












    ?>