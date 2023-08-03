<?php


class attendance
{

    public $attendance_id;
    public $attendance_member_id;
    public $attendance_user_role;
    public $attendance_date;
    public $attendance_check_in_time;
    public $attendance_check_out_time;
    public $attendance_reg_time;
    public $attendance_status;



    private $db;


    function __construct()
    {

        $this->db = new mysqli(host, un, password, db); // create database connection 
    }

    function insert_attendance()
    {

        $sql = " INSERT INTO attendance (attendance_id,attendance_user_role, attendance_member_id, attendance_date, attendance_check_in_time, attendance_check_out_time)
    VALUES ('$this->attendance_id','$this->attendance_user_role', '$this->attendance_member_id', '$this->attendance_date', '$this->attendance_check_in_time', '$this->attendance_check_out_time')";

        $this->db->query($sql);
        $a_id = $this->db->insert_id;

      

        return $a_id;
    }

    function update_attendance($member_id,$out)
    {

        $memberSql = "UPDATE member SET member_current_status='out' WHERE member_id = $member_id";

    $attendanceSql = "UPDATE attendance SET attendance_crt_sts='out',
    attendance_check_out_time ='$out'

     WHERE attendance_member_id = $member_id 
     AND attendance_crt_sts = 'ON GYM'
     AND attendance_user_role = '1' " ;

    $this->db->query($memberSql);
    $this->db->query($attendanceSql);
    }

// ---------------------------------------------------------------------------------
    function update_trainer_attendance($member_id,$out)
    {

        

    $attendanceSql = "UPDATE attendance SET attendance_crt_sts='out',
    attendance_check_out_time ='$out'

     WHERE attendance_member_id = $member_id 
     AND attendance_crt_sts = 'ON GYM'
     AND attendance_user_role = '3' " ;

   
    $this->db->query($attendanceSql);
    }

    // -------------------------------

    function delete_attendance()
    {
    }



function get_attendance_member_id($member){


    $all_att = [];
    $sql ="SELECT * FROM `attendance` WHERE `attendance_member_id` = '$member'";


    $res = $this->db->query($sql);


    while ($row = $res->fetch_array()) {

        $a = new attendance();

        $a->attendance_id = $row["attendance_id"];
        $a->attendance_user_role = $row["attendance_user_role"];
        $a->attendance_member_id = $row["attendance_member_id"];
        $a->attendance_date = $row["attendance_date"];
        $a->attendance_check_in_time = $row["attendance_check_in_time"];
        $a->attendance_check_out_time = $row["attendance_check_out_time"];


        $all_att[] = $a;
    }
    return $all_att;
}


function get_attendance_trainer_id($member){


    $all_att = [];
    $sql ="SELECT * FROM `attendance` 
    WHERE `attendance_member_id` = '$member'
    AND (`attendance_user_role`='3')";


    $res = $this->db->query($sql);


    while ($row = $res->fetch_array()) {

        $a = new attendance();

        $a->attendance_id = $row["attendance_id"];
        $a->attendance_user_role = $row["attendance_user_role"];
        $a->attendance_member_id = $row["attendance_member_id"];
        $a->attendance_date = $row["attendance_date"];
        $a->attendance_check_in_time = $row["attendance_check_in_time"];
        $a->attendance_check_out_time = $row["attendance_check_out_time"];


        $all_att[] = $a;
    }
    return $all_att;
}

}
