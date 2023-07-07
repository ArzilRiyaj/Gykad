<?php
include_once "../config.php";


class trainer
{

    public $trainer_id;
    public $trainer_fname;
    public $trainer_sname;
    public $trainer_nic;
    public $trainer_email;
    public $trainer_phone_number;
    public $trainer_address;
    public $trainer_status;
    public $trainer_regtime;
    public $trainer_password;

    private $db;

    function __construct()
    {

        $this->db = new mysqli(host, un, password, db);
    }
    // ---------------------------------------------------------

    function insert_trainer()
    {


        $sql = " INSERT INTO trainers (trainer_fname, trainer_sname, trainer_nic, trainer_email, trainer_phone_number, trainer_address )
                 VALUES ('$this->trainer_fname', '$this->trainer_sname', '$this->trainer_nic', '$this->trainer_email', '$this->trainer_phone_number', '$this->trainer_address' )";

        $this->db->query($sql);

        echo $sql;
        return true;
    }

    // --------------------------------------------------------

    function update_trainer($trainer_id)
{
    $sql = "UPDATE trainers
          
            SET trainer_fname = '$this->trainer_fname', trainer_sname = '$this->trainer_sname',
            trainer_nic = '$this->trainer_nic', 
            trainer_email = '$this->trainer_email',
            trainer_phone_number = '$this->trainer_phone_number', trainer_address = '$this->trainer_address'
            WHERE trainer_id = '$trainer_id'";

    $this->db->query($sql);

    echo $sql;
    move_uploaded_file($_FILES["trainer_photo"]["tmp_name"], "../trainers/trainer_images/$trainer_id-0.jpg");
}

    



    // ---------------------------------------

    function delete_trainer( $trainer_id)
    {
        $sql = "UPDATE trainers SET trainer_status='deleted'
        WHERE trainer_id = $trainer_id";

$this->db->query($sql);

    }


    function get_all_trainer()
    {


        $sql = " SELECT * FROM `trainers` WHERE `trainer_status` = 'active'";
        $res = $this->db->query($sql);


        while ($row = $res->fetch_array()) {

            $t = new trainer();

        
       
            $t->trainer_id = $row["trainer_id"];
            $t->trainer_fname = $row["trainer_fname"];
            $t->trainer_sname = $row["trainer_sname"];
            $t->trainer_nic = $row["trainer_nic"];
            $t->trainer_email = $row["trainer_email"];
            $t->trainer_phone_number = $row["trainer_phone_number"];
            $t->trainer_address = $row["trainer_address"];
            $t->trainer_status = $row["trainer_status"];
            $t->trainer_regtime = $row["trainer_regtime"];
            // $t->trainer_password = $row["trainer_password"];
            




            $all_trainer[] = $t;
        }
        return $all_trainer;
    }



    function get_trainer_by_id($trainer_id){
        

        $sql = " SELECT * FROM `trainers` WHERE `trainer_id` = '$trainer_id'";
        $res = $this->db->query($sql);
        $row = $res->fetch_array();

        // echo $sql;


        $this->trainer_id = $row["trainer_id"];
        $this->trainer_fname = $row["trainer_fname"];
        $this->trainer_sname = $row["trainer_sname"];
        $this->trainer_nic = $row["trainer_nic"];
        $this->trainer_email = $row["trainer_email"];
        $this->trainer_phone_number = $row["trainer_phone_number"];
        $this->trainer_address = $row["trainer_address"];
        $this->trainer_status = $row["trainer_status"];
        $this->trainer_regtime = $row["trainer_regtime"];

        return $this;
    }
}
