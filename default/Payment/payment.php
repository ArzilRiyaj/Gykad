<?php
include_once "../config.php";

class payment
{

    public $payment_id;

    public $payment_member;
    public $payment_amount;
    public $payment_date;
    public $payment_managed_by;
    public $payment_status;
    public $payment_reg_time;

    public $payment_member_reg_no;
    public $payment_member_fname;


    public $package_id;
    public $package_price;

    public $payment_member_name;
    public $package_name;

    public $total_amount;

    public $amount;
    private $db;

    function __construct()
    {

        $this->db = new mysqli(host, un, password, db);
    }



    function insert_payment()
    {

        $sql = "INSERT INTO `payment`(`payment_id`, `payment_member`, `payment_amount`, `payment_date`, `payment_managed_by`)
         VALUES ('$this->payment_id','$this->payment_member','$this->payment_amount','$this->payment_date','$this->payment_managed_by')";


        $this->db->query($sql);
        $p_id = $this->db->insert_id;
        return $p_id;

        echo $sql;
    }

    //----------------------------------------

    function get_all_payment()
    {

        $sql = "SELECT * FROM `payment` JOIN member ON member.member_id = payment.payment_member";
        $res = $this->db->query($sql);

        $all_payment = [];

        while ($row = $res->fetch_array()) {

            $p = new payment();

            $p->payment_id = $row["payment_id"];
            $p->payment_date = $row["payment_date"];
            $p->payment_amount = $row["payment_amount"];
            $p->payment_member_reg_no = $row["member_reg_no"];
            $p->payment_member_fname = $row["member_fname"];




            $all_payment[] = $p;
        }
        return $all_payment;
    }


    //-----------------------------------------------------------------------------
    function filter_payment($m_id, $_date)
    {
        $w = "WHERE payment_status ='active'  ";
        if ($m_id != -1) {
            $w = $w . "AND member_id = '$m_id'";
        }
        if ($_date != '') {
            $w = $w . " AND payment_date ='$_date'";
        }
        $sql = "SELECT * FROM `payment` JOIN member ON member.member_id = payment.payment_member
       " . $w;
        $res = $this->db->query($sql);

        $all_payment = [];

        while ($row = $res->fetch_array()) {

            $p = new payment();

            $p->payment_id = $row["payment_id"];
            $p->payment_date = $row["payment_date"];
            $p->payment_amount = $row["payment_amount"];
            $p->payment_member_reg_no = $row["member_reg_no"];
            $p->payment_member_fname = $row["member_fname"];




            $all_payment[] = $p;
        }
        return $all_payment;
    }

    //-------------------------------------------------------------------------
    function get_payments_by_member_id($member)
    {

        $sql = "SELECT * FROM `payment` WHERE`payment_member`= '$member' ";
        $res = $this->db->query($sql);
        $all_payment = [];

        while ($row = $res->fetch_array()) {

            $p = new payment();

            $p->payment_id = $row["payment_id"];
            $p->payment_date = $row["payment_date"];
            $p->payment_amount = $row["payment_amount"];
            // $p->payment_member_reg_no = $row["member_reg_no"];

            $all_payment[] = $p;
        }
        return $all_payment;
    }

    //----------------------------------------------------------------------------
    function get_payment_amt_by_member_id($mem)
    {

        $sql = "SELECT * FROM `package` JOIN member ON member.member_membership = package.package_id 
        WHERE member.member_id = '$mem'";


        $res = $this->db->query($sql);
        $row = $res->fetch_array();

        // echo $sql;


        $this->package_id = $row["package_id"];
        $this->package_price = $row["package_price"];

        return $this;
    }


    //----------------------------------------------------------------------------
    function get_payment_by_id($p_id)
    {

        $sql = "SELECT * FROM `payment`
        JOIN member ON member.member_id = payment.payment_member 
JOIN package ON member.member_membership = package.package_id
        WHERE `payment_id`= '$p_id'";

        $res = $this->db->query($sql);
        $row = $res->fetch_array();

        // echo $sql;

        $this->payment_id = $row["payment_id"];

        $this->payment_amount = $row["payment_amount"];
        $this->payment_date = $row["payment_date"];
        $this->payment_member_name = $row["member_fname"];
        $this->package_name = $row["package_name"];

        return $this;
    }


    //----------------------------------------------------

    function get_member_payment_status_by_month()
    {
    }


    //-------------------------------------------------------------



    function get_payment_by_date_range($from_date, $to_date)
    {

        $sql = "SELECT * FROM `payment`
        WHERE `payment_date` = '$from_date'
           OR (`payment_date` BETWEEN '$from_date' AND '$to_date')";
        // echo $sql;

        $res = $this->db->query($sql);
        $all_payment = [];

        while ($row = $res->fetch_array()) {

            $p = new payment();

            $p->payment_id = $row["payment_id"];
            $p->payment_date = $row["payment_date"];
            $p->payment_amount = $row["payment_amount"];



            $all_payment[] = $p;
        }
        return $all_payment;
    }


    function get_total_income($from_date, $to_date)
    {

        $sql = "SELECT SUM(payment_amount) AS total_amount FROM `payment`
        WHERE `payment_date` = '$from_date'
           OR (`payment_date` BETWEEN '$from_date' AND '$to_date')";

        $res = $this->db->query($sql);
        $row = $res->fetch_array();



        $this->total_amount = $row["total_amount"];



        return $this;
    }


    function get_members_not_payed_in_a_month($q,$w)
    {

        $sql = "SELECT *
        FROM member
        LEFT JOIN payment ON member.member_id = payment.payment_member
        AND payment.payment_date BETWEEN '$q' AND '$w'
        JOIN package ON package.package_id = member.member_membership
        WHERE payment.payment_member IS NULL OR payment.payment_date IS NULL;
        
        ";

// AND member.member_regtime < 'start_date'
// payment.payment_member IS NULL 
        // $sql= "SELECT *
        // FROM member
        // LEFT JOIN payment ON member.member_id = payment.payment_member
        // JOIN package ON package.package_id = member.member_membership
        // WHERE payment.payment_member IS NULL AND payment.payment_date BETWEEN '$start_date' AND '$end_date'";

        $res = $this->db->query($sql);
        $all_payment = [];
echo $sql;
        while ($row = $res->fetch_array()) {

            $p = new payment();

            $p->payment_id = $row["payment_id"];
            $p->payment_date = $row["payment_date"];
            $p->amount = $row["package_price"];

            $p->payment_member_name = $row["member_fname"];
            $p->payment_member_reg_no = $row["member_reg_no"];


            $all_payment[] = $p;
        }
        return $all_payment;
    }
}
