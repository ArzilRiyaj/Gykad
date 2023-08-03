<?php
session_start();
include_once "workout.php";

if ($_SESSION["user"]["user_role"] == 2) {
    include_once "../head.php";
} elseif($_SESSION["user"]["user_role"] == 3){
    include_once "../Trainers/trainer_head.php";
}

else {
    header("Location:../login/logout.php");
}
$w = new workout();
if (isset($_GET["did"]))
{
	$workout_id=$_GET["did"];
	$w->delete_workout($workout_id);
}
$data=$w->get_all_workout();




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
                                                <h4>Manage Workouts</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                      
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
                                                <h5>Workout List</h5>
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
                                            <table class='table table-striped'>
        <thead>
          <tr>
            <th>Workout Name</th>
            <th>Category</th>
            <th>Target Muscle Group</th>
            <th>Action</th>

          </tr>
        </thead>
        <tbody>";
        foreach($data as $item){

            echo " 
          <tr>
            <td>$item->workout_name</td>
            <td> $item->workout_category</td>
            <td> $item->workout_target</td>
            <td ><a class='table_icons' href='view_workout.php?w_id=$item->workout_id' title='View'><button class='table_btn btn btn-out btn-primary btn-square '><i class='tb_i fa-1x fa fa-eye'></i></button></a>
                              <a class='table_icons actionButtons' href='add_workout.php?w_id=$item->workout_id' title='Edit'><button class='table_btn btn btn-out btn-success btn-square'><i class='tb_i fa-1x fa fa-edit'></i></button></a>
                          <button onclick='delete_workout($item->workout_id)' class='table_btn btn btn-out btn-danger btn-square'><i class='tb_i fa-1x fa fa-trash'></button></i></td>
          </tr>
       
         ";
        }
         echo "</tbody></table>"; 
        
          ?>                                  </div>
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

    if (isset($_GET['s'])) {


        echo '<script>
        swal({
            title: "Success!",
            text: "Workout Successfully Added",
            icon: "success",
            button: "Ok",
          });
    
        
        </script>';
    }
    ?>



<script>
    var actionButtons = document.querySelectorAll('.actionButtons');
    var userRole = "<?php echo $_SESSION['user']['user_role']; ?>";

    if (userRole === '3') {
        for (var i = 0; i < actionButtons.length; i++) {
            actionButtons[i].style.display = 'none';
        }
    }


    function delete_workout(d) {
    if (confirm("Arw you sure you want to delete workout " + d)) {
        window.location.href = "manage_workout.php?did=" + d;
    }
}
    
</script>
