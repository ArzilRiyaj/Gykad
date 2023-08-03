<?php
include_once "../config.php";

class schedule_list
{


    public $schedule_list_id;
    public $schedule_list_scd_id;
    public $schedule_list_workout;
    public $schedule_list_weight;
    public $schedule_list_sets;
    public $schedule_list_reps;
    public $schedule_list_dis;
    public $schedule_list_reg_time;
    public $schedule_list_status;

    public $workout_name;


    public $db;

    function __construct()
    {

        $this->db = new mysqli(host, un, password, db);
    }


    //----------------------------------------------------------------------


    function insert_schedule_list($sh_id)
    {
        $workout_list = 0;

        foreach ($_POST["schedule_list_workout"] as $item) {
            $sql = "INSERT INTO `schedule_list` (`schedule_list_scd_id`, `schedule_list_workout`, `schedule_list_weight`, `schedule_list_sets`, `schedule_list_reps`, `schedule_list_dis`)
                    VALUES ('$sh_id', '" . $_POST['schedule_list_workout'][$workout_list] . "', '" . $_POST['schedule_list_weight'][$workout_list] . "', '" . $_POST['schedule_list_sets'][$workout_list] . "', '" . $_POST['schedule_list_reps'][$workout_list] . "', '" . $_POST['schedule_list_dis'][$workout_list] . "')";

            // echo $sql;
            $this->db->query($sql);
            // $sl_id = $this->db->insert_id;

            $workout_list++;
        }

        return true;
    }

    // ---------------------------------------
    function test($s_id)
    {

        $sql = "INSERT INTO `schedule_list`(`schedule_list_id`, `schedule_list_scd_id`, `schedule_list_workout`, `schedule_list_weight`, `schedule_list_sets`, `schedule_list_reps`, `schedule_list_dis`, `schedule_list_reg_time`, `schedule_list_status`)
         VALUES ('[schedule_list_id-1]','$s_id','[schedule_list_workout-3]','$this->schedule_list_weight','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]')";
        $this->db->query($sql);
        $p_id = $this->db->insert_id;




        return $p_id;
    }

    // ----------------------------------------------------


    function get_Schedule_List_by_schedule_id($s_id)
    {

        $sql = " SELECT * FROM `schedule_list`
    JOIN workout ON schedule_list.schedule_list_workout = workout.workout_id 
    WHERE `schedule_list_status`= 'active' 
    AND `schedule_list_scd_id` =$s_id;";

        $res = $this->db->query($sql);


        // echo $sql;

        $all_workout = [];
        while ($row = $res->fetch_array()) {

            $sl = new schedule_list();



            $sl->schedule_list_id = $row["schedule_list_id"];
            $sl->schedule_list_scd_id = $row["schedule_list_scd_id"];
            $sl->schedule_list_workout = $row["schedule_list_workout"];
            $sl->workout_name = $row["workout_name"];

            $sl->schedule_list_weight = $row["schedule_list_weight"];
            $sl->schedule_list_sets = $row["schedule_list_sets"];
            $sl->schedule_list_reps = $row["schedule_list_reps"];
            $sl->schedule_list_dis = $row["schedule_list_dis"];
            $sl->schedule_list_reg_time = $row["schedule_list_reg_time"];
            $sl->schedule_list_status = $row["schedule_list_status"];


            $all_workout[] = $sl;
        }
        return $all_workout;
    }


    function remove_workout_from_list($s_id)
    {


        $sql = "  UPDATE `schedule_list` SET `schedule_list_status` = 'removed' 
  WHERE `schedule_list_id` = '$s_id'";
        echo $sql;
        $this->db->query($sql);
    }


    // function remove_workout_from_list($s_id, $w_id) {
    //     $sql = "UPDATE `schedule_list` SET `schedule_list_status` = 'removed' 
    //             WHERE `schedule_list_scd_id` = '$s_id' AND `schedule_list_scd_id` = '$w_id'";

    //     // Assuming you have a database connection, execute the query here
    //     $this->db->query($sql);

    //     // Assuming the update is successful
    //     $response = array('success' => true, 'message' => 'Workout removed successfully');
    //     header('Content-Type: application/json'); // Set the response header to JSON
    //     echo json_encode($response);
    // }





}
