<?php
session_start();
if ($_SESSION["user"]["user_role"] == 2) {
    include_once "../head.php";
} elseif ($_SESSION["user"]["user_role"] == 3) {
    include_once "../Trainers/trainer_head.php";
} else {
    header("Location:../login/logout.php");
}

include_once "member.php";
include_once "../Attendence/attendence.php";
include_once "../Payment/payment.php";
$a = new attendance();
$p = new payment();
$m = new member();

$A = $m->get_member_by_id($_GET['m_id']);

$data = $a->get_attendance_member_id($_GET['m_id']);
$pay =  $p->get_payments_by_member_id($_GET['m_id'])
?>
<!-- ------------------------------------------------------------------------------------------- -->

<div class="pcoded-main-container">
    <div class="pcoded-wrapper">

        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <!-- Main-body start -->
                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="row align-items-end">
                                <div class="col-lg-8">
                                    <div class="page-header-title">
                                        <div class="d-inline">
                                            <h4><?= $A->member_fname ?> <?= $A->member_sname ?> </h4>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">

                                </div>
                            </div>
                        </div>
                        <!-- Page-header end -->

                        <div class="page-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>General Details</h5>

                                            <div class="card-header-right">
                                                <ul class="list-unstyled card-option">
                                                    <li><i class="feather icon-maximize full-card"></i></li>
                                                    <li><i class="feather icon-minus minimize-card"></i></li>

                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-block">
                                            <div class="container mt-5">


                                                <div class="row">
                                                    <div class="col-md-4">


                                                        <div class="card-body">
                                                            <img src="../members/member_images/<?= $A->member_id ?>-0.jpg" class="img-fluid" alt="member photo">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">

                                                        <div class="card-body">
                                                            <p class="card-text"><strong>NIC No:</strong> <?= $A->member_nic ?> </p>
                                                            <p class="card-text"><strong>Membership:</strong> Gold</p>
                                                            <p class="card-text"><strong>Personal Trainer:</strong> <?= $A->member_ptrainer ?> </p>
                                                            <p class="card-text"><strong>Date of Birth:</strong> <?= $A->member_dob ?> </p>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-4">

                                                        <div class="card-body">
                                                            <p class="card-text"><strong>Phone No:</strong> <?= $A->member_phone_number ?> </p>
                                                            <p class="card-text"><strong>Email:</strong> <?= $A->member_email ?> </p>
                                                            <p class="card-text"><strong>Address:</strong> 1<?= $A->member_address ?></p>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- ============================================================================== -->

                        <div class="page-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Attendance Report</h5>

                                            <div class="card-header-right">
                                                <ul class="list-unstyled card-option">
                                                    <li><i class="feather icon-maximize full-card"></i></li>
                                                    <li><i class="feather icon-minus minimize-card"></i></li>

                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-block">
                                            <div class="container mt-5">

                                                <div class="dt-responsive table-responsive">
                                                    <?php
                                                    echo "
                        <table id='basic-btn' class='table table-striped table-bordered nowrap'>

                          <thead>
                            <tr>
                              <th>Attendance Id </th>
                              <th>Date</th>
                              <th>In Time</th>
                              <th>Out Time</th>
                              <th> Workout Time</th>
                          
                            </tr>
                          </thead>
                          <tbody>";
                                                    foreach ($data as $item) {
                                                        $checkInTime = new DateTime($item->attendance_check_in_time);
                                                        $checkOutTime = new DateTime($item->attendance_check_out_time);
                                                        $diff = $checkOutTime->diff($checkInTime);
                                                        $timeSpent = $diff->format('%h hours %i minutes');

                                                        echo " 
                            
                            <tr>
                              <td>$item->attendance_id</td>
                              <td>$item->attendance_date</td>
                              <td>$item->attendance_check_in_time</td>
                              <td>$item->attendance_check_out_time</td>
                              <td>$timeSpent</td>
                              
                            </tr> 
                                            

                            ";
                                                    }


                                                    echo "</tbody></table>";

                                                    ?>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>

                        <!-- ================================================= -->

                        <div class="page-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Payment Report</h5>

                                            <div class="card-header-right">
                                                <ul class="list-unstyled card-option">
                                                    <li><i class="feather icon-maximize full-card"></i></li>
                                                    <li><i class="feather icon-minus minimize-card"></i></li>

                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-block">
                                            <div class="container mt-5">

                                                <div class="dt-responsive table-responsive">
                                                    <?php
                                                    echo "
                        <table id='basic-pay' class='table table-striped table-bordered nowrap'>

                          <thead>
                            <tr>
                              <th>Payment Id </th>
                              <th>Date</th>                             
                              <th> Amount</th>
                          
                            </tr>
                          </thead>
                          <tbody>";
                                                    foreach ($pay as $item) {
                                                        echo " 
                            
                            <tr>
                              <td>$item->payment_id </td>
                              <td>$item->payment_date</td>
                              <td>$item->payment_amount </td>
                              
                            </tr>                                        
                            ";
                                                    }
                                                    echo "</tbody></table>";

                                                    ?>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>







                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>


    <?php
    include_once "../foot.php";


    ?>












    <!-- ------------------------------------------------------------------------------------------- -->