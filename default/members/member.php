<?php
include_once "../config.php"; // get the variables to establish database connection

class member
{ //create member class


    public $member_id;
    public $member_fname;
    public $member_sname;
    public $member_nic;
    public $member_dob;
    public $member_age;
    public $member_membership;
    public $member_ptrainer;
    public $member_email;
    public $member_phone_number;
    public $member_address;
    public $member_password;
    public $member_status;
    public $member_regtime;

    private $db;

    function __construct()
    {

        $this->db = new mysqli(host, un, password, db); // create database connection 
    }





    // insert a new member to the member table in database
    function insert_member()
    {

        $sql = "INSERT INTO member (member_id,member_fname,  member_sname,member_nic, member_dob, member_age, member_membership, 
                 member_ptrainer, member_email, member_phone_number, member_address)
                VALUES ('$this->member_id','$this->member_fname', '$this->member_sname', '$this->member_nic','$this->member_dob', 
                '$this->member_age', '$this->member_membership', '$this->member_ptrainer', 
                '$this->member_email', '$this->member_phone_number', '$this->member_address')";

        $this->db->query($sql);
        $m_id = $this->db->insert_id;

       

        // move uploaded image to folder
        move_uploaded_file($_FILES["member_photo"]["tmp_name"], "../members/member_images/$m_id-0.jpg");

        return $m_id;
    }



    // --------------------------------------------------------------------------------------------------------------------------------------------



    // update/edit details of member
    function update_member($member_id)
    {

        $sql = "UPDATE member
                SET member_fname = '$this->member_fname',member_sname = '$this->member_sname',
                member_dob = '$this->member_dob', member_age = '$this->member_age', 
                member_membership = '$this->member_membership', member_ptrainer = '$this->member_ptrainer',
                member_email = '$this->member_email',member_phone_number = '$this->member_phone_number',
                member_address = '$this->member_address'
                WHERE member_id = '$member_id'";

        $this->db->query($sql);

        echo $sql;
        move_uploaded_file($_FILES["member_photo"]["tmp_name"], "../members/member_images/$member_id-0.jpg");
    }



// delete a member
    function delete_member($member_id)
    {

        $sql = "UPDATE member SET member_status='deleted'
	            WHERE member_id = $member_id";

        $this->db->query($sql);
    }

// ---------------------------------------------

    function get_all_active_members()
    {

        $sql = "SELECT * FROM `member` WHERE `member_status` = 'active'";
        $res = $this->db->query($sql);


        while ($row = $res->fetch_array()) {

            $m = new member();

            $m->member_id = $row["member_id"];
            $m->member_fname = $row["member_fname"];
            $m->member_sname = $row["member_sname"];
            $m->member_nic = $row["member_nic"];
            $m->member_dob = $row["member_dob"];
            $m->member_age = $row["member_age"];
            $m->member_membership = $row["member_membership"];
            $m->member_ptrainer = $row["member_ptrainer"];
            $m->member_email = $row["member_email"];
            $m->member_phone_number = $row["member_phone_number"];
            $m->member_address = $row["member_address"];
            $m->member_status = $row["member_status"];
            $m->member_regtime = $row["member_regtime"];



            $all_member[] = $m;
        }
        return $all_member;
    }

    function get_member_by_id($member_id)
    {
        $sql = "SELECT * FROM `member` WHERE `member_id` = '$member_id'";
        $res = $this->db->query($sql);
        $row = $res->fetch_array();

        // echo $sql;


        $this->member_id = $row["member_id"];
        $this->member_fname = $row["member_fname"];
        $this->member_sname = $row["member_sname"];
        $this->member_nic = $row["member_nic"];
        $this->member_dob = $row["member_dob"];
        $this->member_age = $row["member_age"];
        $this->member_membership = $row["member_membership"];
        $this->member_ptrainer = $row["member_ptrainer"];
        $this->member_email = $row["member_email"];
        $this->member_phone_number = $row["member_phone_number"];
        $this->member_address = $row["member_address"];
        $this->member_status = $row["member_status"];
        $this->member_regtime = $row["member_regtime"];

        return $this;
    }

// ------------------------------------------------------------------------


function get_members_by_trainer_id($trainer_id){
    $sql = "SELECT * FROM `member` WHERE member_status ='active' AND member_ptrainer ='$trainer_id' ";
    $res = $this->db->query($sql);
    $row = $res->fetch_array();

    // echo $sql;


    $this->member_id = $row["member_id"];
    $this->member_fname = $row["member_fname"];
    $this->member_sname = $row["member_sname"];
    $this->member_nic = $row["member_nic"];
    $this->member_dob = $row["member_dob"];
    $this->member_age = $row["member_age"];
    $this->member_membership = $row["member_membership"];
    $this->member_ptrainer = $row["member_ptrainer"];
    $this->member_email = $row["member_email"];
    $this->member_phone_number = $row["member_phone_number"];
    $this->member_address = $row["member_address"];
    $this->member_status = $row["member_status"];
    $this->member_regtime = $row["member_regtime"];

    return $this;

}




// ---------------------------------------------------------------------

    function no_of_active_members()
    {

        $sql = "SELECT * FROM `member` WHERE `member_status` = 'active'";
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            $num = $result->num_rows;

            return $num;
        } else {

            return false;
        }
    }
}
