<?php
session_start();
if ($_SESSION["user"]["user_role"] == 2) {


    include_once "../head.php";
} else {
    header("Location:../login/logout.php");
}

include_once "../members/member.php";
include_once "payment.php";

$p = new payment();
$m = new member();

// $data = $p->get_all_payment();

$data = '';
if (isset($_POST["Search"])) {
$data = $p->filter_payment($_POST["attendance_member_id"],$_POST["date"]);
}
$m = new member();


$all = $m->get_all_active_members();



?>

<!-- ------------------------------------------------------------------------ -->




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
                                                <h4>Manage payment</h4>
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
                                                <h5> Filter  </h5>
                                                <div class="card-header-right">
                                                    <ul class="list-unstyled card-option">
                                                        <li><i class="feather icon-maximize full-card"></i></li>
                                                        <li><i class="feather icon-minus minimize-card"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="card-block">

                                            <form method="post" action="manage_payment.php">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="memberDropdown">Select Member</label>
                                    <select class="js-example-basic-single col-sm-12 select2-hidden-accessible" tabindex="-1" aria-hidden="true" id="memberId" name="attendance_member_id">
                                    <option value='-1'>Select Member</option>
                                                                <?php foreach ($all as $item) {
                                                                    if ($item->member_id == $m->member_fname) {
                                                                        echo "<option value='$item->member_id' selected='selected'>$item->member_reg_no $item->member_fname</option>";
                                                                    } else {
                                                                        echo "<option value='$item->member_id'>$item->member_reg_no $item->member_fname</option>";
                                                                    }
                                                                } ?>
                                                            </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="datePicker">Date</label>
                                    <input type="date" class="form-control" id="datePicker" name="date" >
                                </div>
                            </div>
                            <button type="submit" name="Search" class="btn btn-primary">Submit</button>
                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <!-- --------------------- -->

                            <div class="page-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5> </h5>
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
                              <th>Payment ID</th>
                              <th>Member</th>
                              <th>Payment Date</th>
                              <th>Amount</th>
                           
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>";
                          if (isset($_POST['Search'])) {
                          foreach($data as $item){

                            echo " 
                            
                            <tr>
                              <td>$item->payment_id</td>
                              <td>$item->payment_member_reg_no -  $item->payment_member_fname</td>
                              <td>$item->payment_date</td>
                              <td>$item->payment_amount</td>
                           
                              <td>
                              <a class='table_icons' href='view_payment.php?p_id=$item->payment_id' title='View'><button class='table_btn btn btn-out btn-primary btn-square '><i class='tb_i fa-1x fa fa-eye'></i></button></a>
                              <a class='table_icons' href='add_member.php?p_id=$item->payment_id' title='Edit'><button class='table_btn btn btn-out btn-success btn-square'><i class='tb_i fa-1x fa fa-edit'></i></button></a>
                              <button onclick='delete_member($item->payment_id)' class='table_btn btn btn-out btn-danger btn-square'><i class='tb_i fa-1x fa fa-trash'></button></i>
                              </td>
                            </tr> 
                                            

                            ";
                          }
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





<!-- ------------------------------------------------------------------------ -->
<?php
include_once "../foot.php";
?>