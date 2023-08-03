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


    // -----------------------------------------------------------------------------

    function update_package($package_id)
    {

        $sql = "UPDATE package
        SET package_name = '$this->package_name', package_duration = '$this->package_duration',
        package_price = '$this->package_price', package_description = '$this->package_description'
        WHERE package_id = '$package_id'";
        $this->db->query($sql);


        // echo $sql;
    }


    // ----------------------------------------------------------------------------


    function delete_package($package_id)
    {
        $sql = "UPDATE package SET package_status='deleted'
        WHERE package_id = $package_id";

        $this->db->query($sql);
    }



    // ------------------------------------------------------------------------------------


    function get_all_active_package()
    {
        $all_package = [];
        $sql = " SELECT * FROM `package` WHERE `package_status` = 'active'";

        $res = $this->db->query($sql);


        while ($row = $res->fetch_array()) {

            $p = new package();

            $p->package_id = $row["package_id"];
            $p->package_name = $row["package_name"];
            $p->package_duration = $row["package_duration"];
            $p->package_description = $row["package_description"];
            $p->package_price = $row["package_price"];
            $p->package_status = $row["package_status"];
            $p->package_reg_time = $row["package_reg_time"];


            $all_package[] = $p;
        }
        return $all_package;
    }

    //-----------------------------------------------------------

    function get_package_by_id($package_id)
    {

        $sql = " SELECT * FROM `package` WHERE `package_status` = 'active' AND package_id = '$package_id'";

        $res = $this->db->query($sql);
        $row = $res->fetch_array();

        // echo $sql;


        $this->package_id = $row["package_id"];
        $this->package_name = $row["package_name"];
        $this->package_duration = $row["package_duration"];
        $this->package_description = $row["package_description"];
        $this->package_price = $row["package_price"];
        $this->package_status = $row["package_status"];
        $this->package_reg_time = $row["package_reg_time"];

        return $this;
    }
}
