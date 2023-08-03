<?php
session_start();
if ($_SESSION["user"]["user_role"] == 2) {
    include_once "../head.php";
} elseif ($_SESSION["user"]["user_role"] == 3) {
    include_once "../Trainers/trainer_head.php";
} elseif ($_SESSION["user"]["user_role"] == 1) {
    include_once "../members/member_head.php";
} else {
    header("Location:../login/logout.php");
}

include_once "shedule.php";
include_once "schedule_list.php";
include_once "../Trainers/trainer.php";
include_once "../members/member.php";
include_once "assigned_schedule.php";

$m = new member();
$s = new Schedule();
$sl = new schedule_list();
$t = new trainer();
$as = new assigned_schedule();




if (isset($_POST["as_schedule_id"])) {


    $as->assigned_schedule_assigned_by = $_SESSION["user"]["user_id"];
    $as->assigned_schedule_member = $_POST["as_schedule_id"];
    $as->assigned_shedule = $_GET['s_id'];

    $as->insert_assigned_schedule();
}


$shedule = $s->get_schedule_by_id($_GET['s_id']);
$li = $sl->get_Schedule_List_by_schedule_id($_GET['s_id']);

$mem = $m->get_members_by_trainer_id($_SESSION["user"]["user_id"]);


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
                                            <h4> <?= $shedule->schedule_name ?></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="page-header-breadcrumb">

                                    </div>
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
                                        <h5>Workouts </h5>
                                        <div class="card-header-right">
                                            <ul class="list-unstyled card-option">
                                                <li><i class="feather icon-maximize full-card"></i></li>
                                                <li><i class="feather icon-minus minimize-card"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-block">


                                        <div class="table-responsive">
                                            <?php
                                            echo "
                        <table id='basic-btn' class='table table-striped table-bordered nowrap'>
    <thead>
      <tr>
        <th>Workout</th>
        <th>Weight (Kg)</th>
        <th>Sets</th>
        <th>Reps</th>
        <th>Description</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    ";
                                            foreach ($li as $item) {

                                                echo " 
                            
      <tr>
        <td>$item->workout_name</td>
        <td>$item->schedule_list_weight</td>
        <td>$item->schedule_list_sets</td>
        <td>$item->schedule_list_reps</td>
        <td>$item->schedule_list_dis</td>
        <td><a class='table_icons' href='../Workouts/view_workout.php?w_id=$item->schedule_list_workout' title='View'><button class='table_btn btn btn-out btn-primary btn-square '><i class='tb_i fa-1x fa fa-eye'></i></button></a></td>
      </tr>
     
      ";
                                            }


                                            echo "</tbody></table>";

                                            ?>
                                        </div>


                                    </div>

                                    <div id="assign" class="">
                                        <div class="row">
                                            <div class="col-sm-12">


                                                <div class="card-block">

                                                    <form class="form-horizontal" action="view_schedule.php?s_id= <?= $shedule->schedule_id ?>" method="POST">
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 control-label" for="assignTo">Assign To:</label>
                                                            <div class="col-sm-10">
                                                                <select class="js-example-basic-single col-sm-12 select2-hidden-accessible" tabindex="-1" aria-hidden="true" id="memberId" name="as_schedule_id">
                                                                    <?php foreach ($mem as $item) {
                                                                        if ($item->member_id == $m->member_fname) {
                                                                            echo "<option value='$item->member_id' selected='selected'>$item->member_reg_no - $item->member_fname</option>";
                                                                        } else {
                                                                            echo "<option value='$item->member_id'>$item->member_reg_no - $item->member_fname  </option>";
                                                                        }
                                                                    } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <!-- Add more form fields here -->
                                                        <div class="form-group row">
                                                            <div class="col-sm-10 offset-sm-2">
                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                            </div>
                                                        </div>
                                                    </form>

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
</div>

</div>









<!-- ------------------------------------------------------------------------------------------- -->

<?php
include_once "../foot.php"
?>


<script>
    var userRole = "<?php echo $_SESSION['user']['user_role']; ?>";
    var assignDiv = document.getElementById("assign");
    if (userRole === "1" ||userRole === "2" ) {
        assignDiv.style.display = 'none';
    }
</script>
