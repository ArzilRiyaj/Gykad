<?php
session_start();
if ($_SESSION["user"]["user_role"] == 2) {
    include_once "../head.php";
} elseif ($_SESSION["user"]["user_role"] == 3) {
    include_once "../Trainers/trainer_head.php";
}elseif ($_SESSION["user"]["user_role"] == 1) {
    include_once "../members/member_head.php";
}  else {
    header("Location:../login/logout.php");
}

include_once "../members/member.php";
include_once "../Attendence/attendence.php";

$a = new attendance();
$m = new member();

$m = $m->get_member_by_id($_SESSION["user"]["user_id"]);


$data= $a->get_attendance_member_id($m->member_id);

echo $_SESSION["user"]["user_id"];

?>





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
                                                <h4>Attendence Report</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="page-header-breadcrumb">
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Page-header end -->

                            <div class="page-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5></h5>
                                                <div class="card-header-right">
                                                    <ul class="list-unstyled card-option">
                                                        <li><i class="feather icon-maximize full-card"></i></li>
                                                        <li><i class="feather icon-minus minimize-card"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="card-block">
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
                              <th>Workout Time</th>
                          
                            </tr>
                          </thead>
                          <tbody>";
                          foreach($data as $item){
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
                   
                </div>
            </div>
        </div>

    </div>

















<?php
include_once "../foot.php"
?>