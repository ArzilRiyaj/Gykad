<?php
include_once "../config.php"; // get the variables to establish database connection

class member
{ //create member class


    public $member_id;
    public $member_reg_no;
    public $member_fname;
    public $member_sname;
    public $member_gender;
    public $member_nic;
    public $member_dob;
    public $member_age;
    public $member_membership;

    public $member_ptrainer;
    public $trainer_fname;
    public $member_email;
    public $member_phone_number;
    public $member_address;
    public $member_password;
    public $member_current_status;
    public $member_status;
    public $member_regtime;

    public $package_name;
    public $attendance_check_in_time;
    public $attendance_check_out_time;

    private $db;

    function __construct()
    {

        $this->db = new mysqli(host, un, password, db); // create database connection 
    }





    // insert a new member to the member table in database
    function insert_member()
    {

        $sql = "INSERT INTO member (member_id, member_reg_no, member_fname,  member_sname, member_gender, member_nic, member_dob, member_age, member_membership, 
                 member_ptrainer, member_email, member_phone_number, member_address)
                VALUES ('$this->member_id','$this->member_reg_no','$this->member_fname','$this->member_sname', '$this->member_gender' , '$this->member_nic','$this->member_dob', 
                '$this->member_age', '$this->member_membership', '$this->member_ptrainer', 
                '$this->member_email', '$this->member_phone_number', '$this->member_address')";

        $this->db->query($sql);
        $m_id = $this->db->insert_id;

        // echo $sql;

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

        // echo $sql;
        move_uploaded_file($_FILES["member_photo"]["tmp_name"], "../members/member_images/$member_id-0.jpg");
    }



    // delete a member----------------------------------------------
    function delete_member($member_id)
    {

        $sql = "UPDATE member SET member_status='deleted'
	            WHERE member_id = $member_id";

        $this->db->query($sql);
    }

    // ---------------------------------------------

    function get_all_active_members()
    {

        $sql = "SELECT * FROM `member` 
        JOIN trainers ON member.member_ptrainer = trainers.trainer_id
        JOIN package ON member.member_membership = package.package_id
                 WHERE `member_status` = 'active'";
        $res = $this->db->query($sql);

        $all_member = [];

        while ($row = $res->fetch_array()) {

            $m = new member();

            $m->member_id = $row["member_id"];
            $m->member_reg_no = $row["member_reg_no"];
            $m->member_fname = $row["member_fname"];
            $m->member_sname = $row["member_sname"];
            $m->member_nic = $row["member_nic"];
            $m->member_dob = $row["member_dob"];
            $m->member_age = $row["member_age"];
            $m->member_membership = $row["member_membership"];
            $m->package_name = $row["package_name"];
            $m->member_ptrainer = $row["member_ptrainer"];
            $m->trainer_fname = $row["trainer_fname"];
            $m->member_email = $row["member_email"];
            $m->member_phone_number = $row["member_phone_number"];
            $m->member_address = $row["member_address"];
            $m->member_status = $row["member_status"];
            $m->member_regtime = $row["member_regtime"];



            $all_member[] = $m;
        }
        return $all_member;
    }

    // --------------------------------------------------------------






    // ------------------------------------------------------
    function get_member_by_id($member_id)
    {
        $sql = "SELECT * FROM `member` WHERE `member_id` = '$member_id'";
        $res = $this->db->query($sql);
        $row = $res->fetch_array();

        // echo $sql;


        $this->member_id = $row["member_id"];
        $this->member_reg_no = $row["member_reg_no"];
        $this->member_fname = $row["member_fname"];
        $this->member_sname = $row["member_sname"];
        $this->member_nic = $row["member_nic"];
        $this->member_dob = $row["member_dob"];
        $this->member_gender = $row["member_gender"];
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


    function get_members_by_trainer_id($trainer_id)
    {
        $sql = "SELECT * FROM `member` WHERE member_status ='active' AND member_ptrainer ='$trainer_id' ";
        $res = $this->db->query($sql);


        // echo $sql;

        $all_member = [];
        while ($row = $res->fetch_array()) {

            $m = new member();

            $m->member_id = $row["member_id"];
            $m->member_reg_no = $row["member_reg_no"];
            $m->member_fname = $row["member_fname"];
            $m->member_sname = $row["member_sname"];
            $m->member_nic = $row["member_nic"];
            $m->member_dob = $row["member_dob"];
            $m->member_age = $row["member_age"];
            $m->member_membership = $row["member_membership"];
            // $m->package_name = $row["package_name"];
            $m->member_ptrainer = $row["member_ptrainer"];
            // $m->trainer_fname = $row["trainer_fname"];
            $m->member_email = $row["member_email"];
            $m->member_phone_number = $row["member_phone_number"];
            $m->member_address = $row["member_address"];
            $m->member_status = $row["member_status"];
            $m->member_regtime = $row["member_regtime"];



            $all_member[] = $m;
        }
        return $all_member;
    }
    // ----------------------------------------------------------------------


    function member_reg_no()
    {

        $sql = "SELECT COUNT(*) AS count FROM member";
        $result = $this->db->query($sql);
        while ($row = $result->fetch_array()) {

            $count = $row["count"];
        }

        $count = $count + 1;

        $count = sprintf("%04d", $count); 
        $code = 'GYK' . $count;
        return  $code;
    }

    // ---------------------------------------------------------------------

    function update_member_current_status($member_id)
    {

        $sql = "UPDATE member
        SET member_current_status = 'ON GYM'
        WHERE member_id = '$member_id'";

        $this->db->query($sql);
    }

    // ---------------------------------------------------------------------
    function get_all_members_in_gym_now()
    {

        $all_member = [];
        $sql = "SELECT * FROM `member`JOIN attendance ON member.member_id = attendance.attendance_member_id
            AND member_current_status = 'ON GYM'
            AND attendance_crt_sts = 'ON GYM'
            AND attendance_user_role = '1'
            WHERE `member_status` = 'active'";
        $res = $this->db->query($sql);


        while ($row = $res->fetch_array()) {

            $m = new member();

            $m->member_id = $row["member_id"];
            $m->member_reg_no = $row["member_reg_no"];
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
            $m->attendance_check_in_time = $row["attendance_check_in_time"];
            $m->attendance_check_out_time = $row["attendance_check_out_time"];

            $all_member[] = $m;
        }
        return $all_member;
    }

 // ---------------------------------------------------------------------
 function get_all_members_in_gym_now_by_trainer($trainer)
 {

     $all_member = [];
     $sql = "SELECT * FROM `member`JOIN attendance ON member.member_id = attendance.attendance_member_id
         AND member_current_status = 'ON GYM'
         AND attendance_crt_sts = 'ON GYM'
         AND attendance_user_role = '1'
         WHERE `member_status` = 'active'
         AND member_ptrainer = '$trainer' ";
     $res = $this->db->query($sql);


     while ($row = $res->fetch_array()) {

         $m = new member();

         $m->member_id = $row["member_id"];
         $m->member_reg_no = $row["member_reg_no"];
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
         $m->attendance_check_in_time = $row["attendance_check_in_time"];
         $m->attendance_check_out_time = $row["attendance_check_out_time"];

         $all_member[] = $m;
     }
     return $all_member;
 }






    // ---------------------------------------------------------------------
    function no_of_members_in_gym_now()
    {

        $sql = "SELECT * FROM `member` WHERE member_status ='active' AND member_current_status ='ON GYM' ";
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            $num = $result->num_rows;

            return $num;
        } else {

            return 0;
        }
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

       // ---------------------------------------------------------------------

       function no_of_active_members_trainer_id($trainer)
       {
   
           $sql = "SELECT * FROM `member` WHERE `member_status` = 'active' AND member_ptrainer=  '$trainer'";
           $result = $this->db->query($sql);
   
           if ($result->num_rows > 0) {
               $num = $result->num_rows;
   
               return $num;
           } else {
   
               return 0;
           }
       }

    // ------------------------------------------------------------------------
    function no_of_members_using_package($package_id)
    {
        $sql = "SELECT * FROM `member` WHERE `member_status` = 'active' AND member_membership = '$package_id'";
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            $num = $result->num_rows;

            return $num;
        } else {

            return false;
        }
    }


      // ------------------------------------------------------------------------
      function no_of_members_using_package_15_18($package_id)
      {
          $sql = "SELECT * FROM `member` WHERE `member_status` = 'active' AND member_membership = '$package_id'
           AND member_age  BETWEEN '14 'AND '18'";
          $result = $this->db->query($sql);
  
          if ($result->num_rows > 0) {
              $num = $result->num_rows;
  
              return $num;
          } else {
  
              return 0;
          }
      }
  // ------------------------------------------------------------------------
  function no_of_members_using_package_20_25($package_id)
  {
      $sql = "SELECT * FROM `member` WHERE `member_status` = 'active' AND member_membership = '$package_id'
       AND member_age  BETWEEN '20 'AND '25'";
      $result = $this->db->query($sql);

      if ($result->num_rows > 0) {
          $num = $result->num_rows;

          return $num;
      } else {

          return 0;
      }
  }
 // ------------------------------------------------------------------------
 function no_of_members_using_package_25_30($package_id)
 {
     $sql = "SELECT * FROM `member` WHERE `member_status` = 'active' AND member_membership = '$package_id'
      AND member_age  BETWEEN '25 'AND '30'";
     $result = $this->db->query($sql);

     if ($result->num_rows > 0) {
         $num = $result->num_rows;

         return $num;
     } else {

         return 0;
     }
 }

  // ------------------------------------------------------------------------
  function no_of_members_using_package_30_35($package_id)
  {
      $sql = "SELECT * FROM `member` WHERE `member_status` = 'active' AND member_membership = '$package_id'
       AND member_age  BETWEEN '30 'AND '35'";
      $result = $this->db->query($sql);
 
      if ($result->num_rows > 0) {
          $num = $result->num_rows;
 
          return $num;
      } else {
 
          return 0;
      }
  }
   // ------------------------------------------------------------------------
   function no_of_members_using_package_35_40($package_id)
   {
       $sql = "SELECT * FROM `member` WHERE `member_status` = 'active' AND member_membership = '$package_id'
        AND member_age  BETWEEN '35 'AND '40'";
       $result = $this->db->query($sql);
  
       if ($result->num_rows > 0) {
           $num = $result->num_rows;
  
           return $num;
       } else {
  
           return 0;
       }
   }
 
      // ------------------------------------------------------------------------
      function no_of_members_using_package_18_20($package_id)
      {
          $sql = "SELECT * FROM `member` WHERE `member_status` = 'active' AND member_membership = '$package_id'
           AND member_age  BETWEEN '18 'AND '20'";
          $result = $this->db->query($sql);
  
          if ($result->num_rows > 0) {
              $num = $result->num_rows;
  
              return $num;
          } else {
  
              return 0;
          }
      }

    // -----------------------------------------------

    function get_male_members_count($package_id)
    {
        $sql = "SELECT * FROM `member` WHERE `member_status` = 'active'
        AND member_gender ='Male'
         AND member_membership = '$package_id'";
        $result = $this->db->query($sql);

        if ($result->num_rows >= 0) {
            $num = $result->num_rows;

            return $num;
        } else {

            return false;
        }
    }

    // ----------------------------------------------------------
    function get_female_members_count($package_id)
    {

        $sql = "SELECT * FROM `member` WHERE `member_status` = 'active'
        AND member_gender ='Female'
         AND member_membership = '$package_id'";
        $result = $this->db->query($sql);

        if ($result->num_rows >= 0) {
            $num = $result->num_rows;

            return $num;
        } else {

            return false;
        }
    }
}
