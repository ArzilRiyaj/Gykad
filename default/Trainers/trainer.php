<?php
include_once "../config.php";


class trainer
{


    public $trainer_fname;
    public $trainer_sname;
    public $trainer_age;
    public $trainer_email;
    public $trainer_phone_number;
    public $trainer_address;
    public $trainer_status;
    public $trainer_regtime;

    private $db;

    function __construct()
    {

        $this->db = new mysqli(host, un, password, db); // create database connection 
    }


    function insert_trainer()
    {



        $sql = "  INSERT INTO trainers (trainer_fname, trainer_sname, trainer_age, trainer_email, trainer_phone_number, trainer_address, trainer_status, trainer_regtime)
VALUES ('John', 'Doe', 30, 'johndoe@example.com', '1234567890', '123 Main St', 'active', NOW())";
        $this->db->query($sql);
        $this->db->insert_id;

        return true;
    }
}
