<?php
include_once "../config.php"; // get the variables to establish database connection

class member
{ //create member class


    public $member_id;
    public $member_fname;
    public $member_sname;
    public $member_dob;
    public $member_age;
    public $member_membership;
    public $member_ptrainer;
    public $member_email;
    public $member_phone_number;
    public $member_address;

    private $db;

    function __construct()
    {

        $this->db = new mysqli(host, un, password, db); // create database connection 
    }

    //other codes go here



    // insert a new member to the member table in database
    function insert_member()
    {

        $sql = "INSERT INTO member (member_fname, member_sname, member_dob, member_age, member_membership, 
            member_ptrainer, member_email, member_phone_number, member_address)
            VALUES ('$this->member_fname', '$this->member_sname', '$this->member_dob', 
            $this->member_age, '$this->member_dob'), '$this->member_membership', '$this->member_ptrainer', 
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
        move_uploaded_file($_FILES["member_photo"]["tmp_name"], "../members/member_images/$member_id-0.jpg");
    }



    // delete a member
    function delete_member($member_id)
    {

        $sql = "UPDATE member SET member_status='deleted'
	            WHERE member_id = $member_id";

        $this->db->query($sql);
    }




}
