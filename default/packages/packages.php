<?php
include_once "../config.php";

class package
{

    public $package_id;
    public $package_name;
    public $package_duration;
    public $package_price;
    public $package_description;
    public $package_status;
    public $package_reg_time;


    private $db;

    function __construct()
    {

        $this->db = new mysqli(host, un, password, db);
    }


    function insert_package()
    {
        $sql = " INSERT INTO package (package_id,package_name, package_duration, package_price, package_description)
        VALUES ('$this->package_id', '$this->package_name', '$this->package_duration', '$this->package_price','$this->package_description')";

        $this->db->query($sql);
        $p_id = $this->db->insert_id;




        return $p_id;
    }


    // -------------------------------------

    function update_package()
    {
    }


    // -----------------


    function delete_package(){

    }

    // --------------------------------


    function get_all_active_package(){
        
    }
}
