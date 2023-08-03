<?php
session_start();
if ($_SESSION["user"]["user_role"] == 2) {
    include_once "../head.php";
} elseif ($_SESSION["user"]["user_role"] == 3) {
    include_once "../Trainers/trainer_head.php";
} else {
    header("Location:../login/logout.php");
}

include_once "shedule.php";

$s = new Schedule;


if (isset($_GET["did"]))
{
	$schedule_id=$_GET["did"];
	$s->delete_schedule($schedule_id);
}

$data=$s->get_all_schedule();

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
                                            <h4> Manage Schedules</h4>
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
                                            <?php
                                            echo "
                        <table id='basic-btn' class='table table-striped table-bordered nowrap'>
    <table class='table'>
        <thead>
            <tr>
                <th>Schedule ID</th>
                <th>Schedule Name</th>
            
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
       
            ";
                                            foreach ($data as $item) {

                                                echo " 

                <tr>
                <td>$item->schedule_id</td>
                <td> $item->schedule_name</td>
           
  <td>
  <a class='table_icons' href='view_schedule.php?s_id=$item->schedule_id' title='View'><button class='table_btn btn btn-out btn-primary btn-square '><i class='tb_i fa-1x fa fa-eye'></i></button></a>
  <a class='table_icons' href='edit_schedule.php?s_id=$item->schedule_id' title='Edit'><button class='table_btn btn btn-out btn-success btn-square'><i class='tb_i fa-1x fa fa-edit'></i></button></a>
  <button onclick='delete_schedule($item->schedule_id)' class='table_btn btn btn-out btn-danger btn-square'><i class='tb_i fa-1x fa fa-trash'></button></i>
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

</div>

















<!-- ------------------------------------------------------------------------------------------- -->

<?php
include_once "../foot.php"
?>

<script>



function delete_schedule(d) {
    if (confirm("Arw you sure you want to delete schedule " + d)) {
        window.location.href = "manage_schedule.php?did=" + d;
    }
}

</script>