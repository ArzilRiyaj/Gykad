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





function insert_workout() {
    $sql = "INSERT INTO workout (workout_id, workout_name, workout_category, workout_target, workout_video_url)
            VALUES ('$this->workout_id', '$this->workout_name', '$this->workout_category', '$this->workout_target', '$this->workout_video_url')";
   
   $this->db->query($sql);
   $w_id = $this->db->insert_id;

   $fileExtension = strtolower(pathinfo($_FILES["workout_image"]["name"], PATHINFO_EXTENSION));
   $newFileName = "$w_id-0.$fileExtension";
   $destination = "../workouts/workout_images/$newFileName";

move_uploaded_file($_FILES["workout_image"]["tmp_name"], $destination);
       // File uploaded successfully


   echo $sql;

   return $w_id;
}



function edit_workout(){
    
}


function delete_workout(){

}

function get_all_workout(){

    $sql= "SELECT * FROM `workout` WHERE `workout_status` = 'active'";

    $res = $this->db->query($sql);


    while ($row = $res->fetch_array()) {

        $w = new workout();

        $w->workout_id = $row["workout_id"];
     



        $all_workout[] = $w;
    }
    return $all_workout;

}

}
