<?php
include_once "../config.php";

class assigned_schedule
{

    public $assigned_schedule_id;
    public $assigned_shedule;
    public $assigned_schedule_assigned_by;
    public $assigned_schedule_member;
    public $assigned_schedule_regtime;
    public $assigned_schedule_status;

    public $schedule_name;


    public $db;

    function __construct()
    {

        $this->db = new mysqli(host, un, password, db);
    }


//----------------------------------------------------------------------


function insert_assigned_schedule(){

    $sql ="INSERT INTO assigned_schedule (assigned_schedule_assigned_by,assigned_shedule, assigned_schedule_member)
    VALUES ('$this->assigned_schedule_assigned_by','$this->assigned_shedule', '$this->assigned_schedule_member')";

$this->db->query($sql);

return true;
}

//-------------------------------------------------------------

function get_schedule_by_member_id($mem){

$sql ="SELECT * FROM `assigned_schedule` JOIN schedule On assigned_schedule.assigned_shedule = schedule.schedule_id WHERE`assigned_schedule_status`= 'active' AND `assigned_schedule_member` = '$mem';";
    

$res = $this->db->query($sql);

$all_asw = [];

while ($row = $res->fetch_array()) {

    $as = new assigned_schedule();


$as->assigned_schedule_id = $row["assigned_schedule_id"];
$as->assigned_shedule = $row["assigned_shedule"];
$as->assigned_schedule_assigned_by = $row["assigned_schedule_assigned_by"];
$as->assigned_schedule_regtime = $row["assigned_schedule_regtime"];
$as->assigned_schedule_status = $row["assigned_schedule_status"];

$as->schedule_name =$row["schedule_name"];




$all_asw[] = $as;
}
return $all_asw;

}

}