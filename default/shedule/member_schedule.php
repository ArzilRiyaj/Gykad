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

include_once "assigned_schedule.php";

$as = new assigned_schedule();

$data = $as->get_schedule_by_member_id($_SESSION["user"]["user_id"]);

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
                                                <h4>Schedules</h4>
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
                                                <h5>Schedules </h5>
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
                              <th>Schedule ID</th>
                              <th>Schedule Name </th>
                          
                             
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>";
                          foreach($data as $item){

                            echo " 
                            
                            <tr>
                              <td>$item->assigned_shedule</td>
                              <td>$item->schedule_name</td>
                         
                              
                              <td>
                              <a class='table_icons' href='view_schedule.php?s_id=$item->assigned_shedule' title='View'><button class='table_btn btn btn-out btn-primary btn-square '><i class='tb_i fa-1x fa fa-eye'></i></button></a>
                           
                              </td>
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





<!-- ------------------------------------------------------------------------------------------- -->

<?php
include_once "../foot.php";


?>