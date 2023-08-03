<?php
include_once "../config.php";

class schedule
{


    public $schedule_id;
    public $schedule_name;
    public $schedule_trainer;
    public $schedule_status;
    public $schedule_reg_time;


    private $db;

    function __construct()
    {

        $this->db = new mysqli(host, un, password, db);
    }



//--------------------------------------------------

    function insert_schedule()
    {

        $sql = "INSERT INTO `schedule`(`schedule_id`, `schedule_name`, `schedule_trainer`) 
        VALUES ('$this->schedule_id','$this->schedule_name','$this->schedule_trainer')";
        $this->db->query($sql);
        $s_id = $this->db->insert_id;


// echo $sql;

        return $s_id;
    }

//-----------------------------------------------

function delete_schedule($s){
    
    $sql="UPDATE  `schedule` SET schedule_status = 'deleted'
    WHERE schedule_id = '$s'";

    $this->db->query($sql);
}


//-------------------------------------------------


function update_schedule($s){
    $sql="UPDATE  `schedule` SET schedule_name = '$this->schedule_name'
    WHERE schedule_id = '$s'";

echo $sql;
    $this->db->query($sql);

}


//---------------------------------------------

function get_all_schedule(){

    $sql = " SELECT * FROM `schedule` WHERE `schedule_status` = 'active'";

    $res = $this->db->query($sql);

    $all_schedule = [];

    while ($row = $res->fetch_array()) {

        $s = new schedule();

      
        $s->schedule_id = $row["schedule_id"];
        $s->schedule_name = $row["schedule_name"];
        $s->schedule_trainer = $row["schedule_trainer"];
        $s->schedule_reg_time = $row["schedule_reg_time"];
      
      



        $all_schedule[] = $s;
    }
    return $all_schedule;
}


//-------------------------------------------------------------------------------
function get_schedule_by_id($s_id){


$sql="SELECT * FROM `schedule` WHERE `schedule_status` = 'active' AND schedule_id = '$s_id'";



$res = $this->db->query($sql);
$row = $res->fetch_array();

// echo $sql;


$this->schedule_id = $row["schedule_id"];
$this->schedule_name = $row["schedule_name"];
$this->schedule_trainer = $row["schedule_trainer"];
$this->schedule_reg_time = $row["schedule_reg_time"];

return $this;




}






}