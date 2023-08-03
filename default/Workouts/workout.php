<?php
include_once "../config.php";


class workout
{
    public $workout_id;
    public $workout_name;
    public $workout_category;
    public $workout_target;
    public $workout_video_url;
    public $workout_status;
    public $workout_datetime;
    public $workout_image;






    private $db;

    function __construct()
    {

        $this->db = new mysqli(host, un, password, db);
    }





    function insert_workout()
    {
        $sql = "INSERT INTO workout (workout_id, workout_name, workout_category, workout_target, workout_video_url)
            VALUES ('$this->workout_id', '$this->workout_name', '$this->workout_category', '$this->workout_target', '$this->workout_video_url')";

        $this->db->query($sql);
        $w_id = $this->db->insert_id;

        $fileExtension = strtolower(pathinfo($_FILES["workout_image"]["name"], PATHINFO_EXTENSION));
        $newFileName = "$w_id-0.$fileExtension";
        $destination = "../workouts/workout_images/$newFileName";

        move_uploaded_file($_FILES["workout_image"]["tmp_name"], $destination);



        // echo $sql;

        return $w_id;
    }

//---------------------------------------------------------------------------------

    function edit_workout($workout_id)
    {
        $sql = "UPDATE `workout` SET `workout_name`='$this->workout_name',
        `workout_category`='$this->workout_category',`workout_target`='$this->workout_target',
        `workout_video_url`='$this->workout_video_url'
        
         WHERE  workout_id = $workout_id";
        $this->db->query($sql);
        echo $sql;



        $fileExtension = strtolower(pathinfo($_FILES["workout_image"]["name"], PATHINFO_EXTENSION));
        $newFileName = trim($workout_id) . "-0." . $fileExtension;
        $newFileName = preg_replace('/\s+/', '', $newFileName);
        $destination = "../workouts/workout_images/$newFileName";
        
        move_uploaded_file($_FILES["workout_image"]["tmp_name"], $destination);
        
    }
//-------------------------------------------------------------------------

    function delete_workout($workout_id)
    {

        $sql = "UPDATE workout SET workout_status='deleted'
	            WHERE workout_id = $workout_id";

        $this->db->query($sql);
    }

    function get_all_workout()
    {

        $sql = "SELECT * FROM `workout` WHERE `workout_status` = 'active'";

        $res = $this->db->query($sql);
        $all_workout = [];

        while ($row = $res->fetch_array()) {

            $w = new workout();

            $w->workout_id = $row["workout_id"];
            $w->workout_name = $row["workout_name"];
            $w->workout_category = $row["workout_category"];
            $w->workout_target = $row["workout_target"];
            $w->workout_video_url = $row["workout_video_url"];
            $w->workout_status = $row["workout_status"];
            $w->workout_datetime = $row["workout_datetime"];

            $all_workout[] = $w;
        }
        return $all_workout;
    }


    function get_workout_by_id($workout_id)
    {

        $sql = "SELECT * FROM `workout` WHERE `workout_status` = 'active' AND  workout_id = '$workout_id'";


        $res = $this->db->query($sql);
        $row = $res->fetch_array();

        // echo $sql;


        $this->workout_id = $row["workout_id"];
        $this->workout_name = $row["workout_name"];
        $this->workout_category = $row["workout_category"];
        $this->workout_target = $row["workout_target"];
        $this->workout_video_url = $row["workout_video_url"];
        $this->workout_status = $row["workout_status"];
        $this->workout_datetime = $row["workout_datetime"];


        return $this;
    }
}
