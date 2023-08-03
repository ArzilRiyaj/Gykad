<?php
session_start();

include_once "../members/member.php";
include_once "attendence.php";

$m = new member();
$a = new attendance();





// var_dump($_GET['uid']);
if (isset($_POST["attendance_member_id"])) {

    $a->attendance_member_id = $_POST["attendance_member_id"];

    $a->attendance_date = $_POST["attendance_date"];
    $a->attendance_check_in_time = $_POST["attendance_check_in_time"];
    $a->attendance_user_role = 1;



    if (isset($_GET["uid"])) {
   

    }
       
     else {
        $a->insert_attendance();
        $m->update_member_current_status($_POST["attendance_member_id"]);
        header("Location:manage_attendence.php?e=yes");
    }
}


if (isset($_POST["attendance_check_out_time"])) {
    $uid = $_POST["uid"];

    $out_time = $_POST["attendance_check_out_time"];
    $a->update_attendance($uid,$out_time);
}

$all = $m->get_all_active_members();


$data = $m->get_all_members_in_gym_now();

if ($_SESSION["user"]["user_role"] == 2) {


    include_once "../head.php";
} else {
    header("Location:../login/logout.php");
}






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
                                            <h4>Check In/Check Out Form</h4>

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
                                            <h5>Check In</h5>

                                            <div class="card-header-right">
                                                <ul class="list-unstyled card-option">
                                                    <li><i class="feather icon-maximize full-card"></i></li>
                                                    <li><i class="feather icon-minus minimize-card"></i></li>

                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-block">
                                            <div class="container">
                                                <form method="POST" action="manage_attendence.php">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="memberId">Member ID</label>
                                                            <select class="js-example-basic-single col-sm-12 select2-hidden-accessible" tabindex="-1" aria-hidden="true" id="memberId" name="attendance_member_id">
                                                                <?php foreach ($all as $item) {
                                                                    if ($item->member_id == $m->member_fname) {
                                                                        echo "<option value='$item->member_id' selected='selected'>$item->member_reg_no $item->member_fname</option>";
                                                                    } else {
                                                                        echo "<option value='$item->member_id'>$item->member_reg_no $item->member_fname</option>";
                                                                    }
                                                                } ?>
                                                            </select>
                                                        </div>
                                                        <!-- <div class="form-group col-md-6">
                                                            <label for="member">Member Name</label>
                                                            <select class="js-example-basic-single col-sm-12 select2-hidden-accessible" tabindex="-1" aria-hidden="true" id="memberName">
                                                                <?php foreach ($all as $item) {
                                                                    if ($item->member_id == $m->member_fname) {
                                                                        echo "<option value='$item->member_id' selected='selected'>$item->member_fname</option>";
                                                                    } else {
                                                                        echo "<option value='$item->member_id'>$item->member_fname</option>";
                                                                    }
                                                                } ?>
                                                            </select>
                                                        </div> -->
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-3">
                                                            <label for="date">Date</label>
                                                            <input type="date" class="form-control" id="attendance_date" name="attendance_date">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="attendance_check_in_time">Check-in Time</label>
                                                            <input type="time" class="form-control" id="attendance_check_in_time" name="attendance_check_in_time">
                                                        </div>

                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                            <button type="reset" class="btn btn-secondary">Reset</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ----------------------------------------------------------------------------- -->

                        <div class="page-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Check Out</h5>

                                            <div class="card-header-right">
                                                <ul class="list-unstyled card-option">
                                                    <li><i class="feather icon-maximize full-card"></i></li>
                                                    <li><i class="feather icon-minus minimize-card"></i></li>

                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-block">
                                            <div class="container">
                                                <?php
                                                echo " 
                                                <table class='table table-striped table-bordered nowrap'>
                                                    <thead>
                                                        <tr>
                                                            <th>Member ID</th>
                                                            <th>Name</th>
                                                            <th>Check-in Time</th>
                                                            <th>Check-out Time</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>";
                                                       


                                                    if ($data !== null) {
                                                        echo "<form action='manage_attendence.php' method='POST'>";
                                                        foreach ($data as $item) {
                                                            echo " 
                                                                <tr>
                                                                    <td>$item->member_reg_no</td>
                                                                    <td>$item->member_fname</td>
                                                                    <td><input type='time' class='form-control' value='" . date('H:i', strtotime($item->attendance_check_in_time)) . "' id='attendance_check_in_time1' name='attendance_check_in_time1' readonly></td>
                                                                    <td><input type='time' class='form-control' id='attendance_check_out_time' name='attendance_check_out_time'></td>
                                                                    <td><button type='submit' class='btn btn-primary' name='submit'>Check Out</button></td>
                                                                     <input type='hidden' name='uid' value='$item->member_id'>
                                                                </tr>";
                                                        }
                                                        echo "</form>";
                                                    } else {
                                                        echo "No data available.";
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
    function updateattendance_check_in_time() {
        var currentTime = new Date();
        var hours = currentTime.getHours();
        var minutes = currentTime.getMinutes();
        var formattedTime = hours.toString().padStart(2, "0") + ":" + minutes.toString().padStart(2, "0");

        
        document.getElementById("attendance_check_in_time").value = formattedTime;
        document.getElementById("attendance_check_out_time").value = formattedTime;
    }

   
    updateattendance_check_in_time();


    setInterval(updateattendance_check_in_time, 60000);



    //------------------------------------------ date


    function getCurrentDate() {
            const currentDate = new Date();
            const year = currentDate.getFullYear();
            const month = (currentDate.getMonth() + 1).toString().padStart(2, "0");
            const day = currentDate.getDate().toString().padStart(2, "0");
            return `${year}-${month}-${day}`;
        }

        document.getElementById('attendance_date').value = getCurrentDate();
    


</script>