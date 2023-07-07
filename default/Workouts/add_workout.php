<?php
include_once "workout.php";

$w = new workout();


if (isset($_POST["workout_name"])) {



    $w->workout_name = $_POST["workout_name"]; 
    $w->workout_category = $_POST["workout_category"]; 
    $w->workout_target = $_POST["workout_target"];
    $w->workout_video_url = $_POST["workout_video_url"];
 
    if(isset($_POST["w_id"])){
        $w->edit_workout($_POST["w_id"]);
        header("Location:manage_member.php?e=yes"); 
    }
    else{


    $w->insert_workout(); 
    // header("Location:add_trainers.php?s=yes");
    }
}


include_once "../head.php";
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
                                            <h4>Add New Workout</h4>

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


                                            <div class="card-header-right">
                                                <ul class="list-unstyled card-option">
                                                    <li><i class="feather icon-maximize full-card"></i></li>
                                                    <li><i class="feather icon-minus minimize-card"></i></li>

                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-block">
                                            <div class="container">
                                                <form method="POST" action="add_workout.php" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <label for="workoutName">Workout Name</label>
                                                        <input type="text" class="form-control" id="workout_name" name="workout_name" placeholder="Enter workout name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="category">Category</label>
                                                        <select class="form-control" id="workout_category" name="workout_category">
                                                            <option value="">Select category</option>
                                                            <option value="Cardio">Cardio</option>
                                                            <option value="Strength">Strength</option>
                                                            <option value="Yoga">Yoga</option>

                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="targetMuscleGroup">Target Muscle Group</label>
                                                        <select class="form-control" id="targetMuscleGroup" name="workout_target">
                                                            <option value="">Select target muscle group</option>
                                                            <option value="Chest">Chest</option>
                                                            <option value="Back">Back</option>
                                                            <option value="Legs">Legs</option>

                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="image">Image</label>
                                                        <input type="file" class="form-control-file" id="workout_image" name="workout_image">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="videoUrl">Video URL</label>
                                                        <input type="text" class="form-control" id="videoUrl" name="workout_video_url" placeholder="Enter video URL">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                    <button type="reset" class="btn btn-secondary">Reset</button>
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



<!-- ------------------------------------------------------------------------------------------- -->

<?php
include_once "../foot.php"
?>