<?php
include_once "../config.php";

class admin
{

    public $admin_id;
    public $admin_fname;
    public $admin_sname;
    public $admin_nic;
    public $admin_photo;
    public $admin_phone_number;
    public $admin_address;
    public $admin_email;
    public $admin_password;
    public $admin_status;
    public $admin_reg_time;

    private $db;

    function __construct()
    {

        $this->db = new mysqli(host, un, password, db);
    }




    function insert_admin()
{
    $sql = "INSERT INTO admin (admin_fname, admin_sname, admin_nic, admin_photo, admin_phone_number, admin_address, admin_email, admin_password)
            VALUES ('$this->admin_fname', '$this->admin_sname', '$this->admin_nic', '$this->admin_photo', '$this->admin_phone_number', '$this->admin_address', 
            '$this->admin_email', '$this->admin_password')";

    $this->db->query($sql);
    $admin_id = $this->db->insert_id;

    // Move uploaded image to folder
    move_uploaded_file($_FILES["admin_photo"]["tmp_name"], "../admins/admin_images/$admin_id-0.jpg");

    return $admin_id;
}


function get_admin_by_id($admin_id)
{
    $sql = "SELECT * FROM `admin` WHERE `admin_id` = '$admin_id'";
    $res = $this->db->query($sql);
    $row = $res->fetch_array();

    // echo $sql;

    $admin = new Admin();
    $admin->admin_id = $row["admin_id"];
    $admin->admin_fname = $row["admin_fname"];
    $admin->admin_sname = $row["admin_sname"];
    $admin->admin_nic = $row["admin_nic"];
    $admin->admin_photo = $row["admin_photo"];
    $admin->admin_phone_number = $row["admin_phone_number"];
    $admin->admin_address = $row["admin_address"];
    $admin->admin_email = $row["admin_email"];
    $admin->admin_password = $row["admin_password"];
    $admin->admin_status = $row["admin_status"];
    $admin->admin_reg_time = $row["admin_reg_time"];

    return $admin;
}



function update_admin(){
    
}



function get_all_active_admin(){
    $sql = "SELECT * FROM `admin` WHERE `admin_status` = 'active'";
    $res = $this->db->query($sql);

    $all_admin = [];

    while ($row = $res->fetch_array()) {

        $admin = new Admin();
        $admin->admin_id = $row["admin_id"];
        $admin->admin_fname = $row["admin_fname"];
        $admin->admin_sname = $row["admin_sname"];
        $admin->admin_nic = $row["admin_nic"];
        $admin->admin_photo = $row["admin_photo"];
        $admin->admin_phone_number = $row["admin_phone_number"];
        $admin->admin_address = $row["admin_address"];
        $admin->admin_email = $row["admin_email"];
        $admin->admin_password = $row["admin_password"];
        $admin->admin_status = $row["admin_status"];
        $admin->admin_reg_time = $row["admin_reg_time"];


        $all_admin[] =  $admin;
    }
    return $all_admin;
}

}



    ?>