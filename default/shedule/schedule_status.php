<?php
include_once "../config.php";

class schedule_status
{


    public $schedule_status_id;
    public $schedule_status_schedule;
    public $schedule_status_workout;
    public $schedule_status_member;
    public $schedule_status_reg_date;
    public $schedule_status_workout_status;


    private $db;

    function __construct()
    {

        $this->db = new mysqli(host, un, password, db);
    }



//--------------------------------------------------

    function insert_schedule_status($x)
    {
        $workout_list = 0;
        foreach ($_POST["schedule_status_workout"] as $item) {
            
       $sql= " INSERT INTO `schedule_status`( `schedule_status_schedule`, `schedule_status_workout`, `schedule_status_member`,`schedule_status_workout_status`) 
        VALUES ('$x','" . $_POST['schedule_status_workout'][$workout_list] . "','" . $_POST['schedule_status_workout'][$workout_list] . "','" . $_POST['schedule_status_workout_status'][$workout_list] . "')";

         echo $sql;
         $this->db->query($sql);
         // $sl_id = $this->db->insert_id;

         $workout_list++;
     }

     return true;

    }


}