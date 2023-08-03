<?php
include_once "../config.php";

class weight
{

    public $weight_id;
    public $weight_date;
    public $weight_kg;
    public $weight_member;
   


    private $db;

    function __construct()
    {

        $this->db = new mysqli(host, un, password, db);
    }


    function insert_weight(){

        $sql= "INSERT INTO weight (weight_member,weight_date, weight_kg)
        VALUES  ('$this->weight_member','$this->weight_date', '$this->weight_kg')";
         $this->db->query($sql);
         $w_id = $this->db->insert_id;
 
 
 
 
         return $w_id;
    }

    function update_weight(){

    }

    
    // --------------------------------------------------------------------------------------------------

    function get_average_weight_by_month($mem) {
        $sql = "SELECT DATE_FORMAT(weight_date, '%Y-%m') AS month, AVG(weight_kg) AS average_weight
                FROM weight
                WHERE weight_member = '$mem'
                GROUP BY DATE_FORMAT(weight_date, '%Y-%m')";
    
        $res = $this->db->query($sql);
    
        $average_weights = array();
        while ($row = $res->fetch_assoc()) {
            $average_weights[$row["month"]] = floatval($row["average_weight"]);
        }
    
        return json_encode($average_weights);
        
    }
    


    

}
