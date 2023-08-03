<?php
session_start();
include_once "workout.php";

$w = new workout();


if (isset($_GET["w_id"])) {
    $w = $w->get_workout_by_id($_GET["w_id"]);
}

if (isset($_POST["workout_name"])) {



    $w->workout_name = $_POST["workout_name"];
    $w->workout_category = $_POST["workout_category"];
    $w->workout_target = $_POST["workout_target"];
    $w->workout_video_url = $_POST["workout_video_url"];

    if (isset($_POST["w_id"])) {
        $w->edit_workout($_POST["w_id"]);
        header("Location:manage_workout.php?e=yes");
    } else {


        $w->insert_workout();
        header("Location:manage_workout.php?s=yes");
    }
}



if ($_SESSION["user"]["user_role"] == 2) {
    include_once "../head.php";
} elseif ($_SESSION["user"]["user_role"] == 3) {
    include_once "../Trainers/trainer_head.php";
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
                                            <h4>
                                                <?php
                                                if (isset($_GET["w_id"])) {
                                                    echo " Edit Workout  ";
                                                } else
                                                    echo "Add New Workout"

                                                ?>
                                            </h4>

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
                                                    <?php
                                                    if (isset($_GET["w_id"])) {
                                                        echo "
                                                        <input type='text' class='form-control' name='w_id' id='w_id'  value='" . $_GET['w_id'] . " '  placeholder='Enter  first name' hidden required>
";
                                                    }
                                                    ?>

                                                    <div class="form-group">
                                                        <label for="workoutName">Workout Name</label>
                                                        <input type="text" class="form-control" id="workout_name" value="<?= $w->workout_name ?>" name="workout_name" placeholder="Enter workout name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="category">Category</label>
                                                        <select class="form-control" id="workout_category" name="workout_category">
                                                            <option <?php if ($w->workout_category == '') { ?> selected="selected" <?php } ?> value="">Select category</option>
                                                            <option <?php if ($w->workout_category == 'Cardio') { ?> selected="selected" <?php } ?> value="Cardio">Cardio</option>
                                                            <option <?php if ($w->workout_category == 'Strength') { ?> selected="selected" <?php } ?> value="Strength">Strength</option>
                                                            <option <?php if ($w->workout_category == 'Yoga') { ?> selected="selected" <?php } ?> value="Yoga">Yoga</option>
                                                            <option <?php if ($w->workout_category == 'Muscle Building') { ?> selected="selected" <?php } ?> value="Muscle Building">Muscle Building</option>


                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="targetMuscleGroup">Target Muscle Group</label>
                                                        <select class="form-control" id="targetMuscleGroup" name="workout_target">
                                                            <option value="">Select target muscle group</option>

                                                            <option <?php if ($w->workout_target == 'Chest') { ?> selected="selected" <?php } ?> value="Chest">Chest</option>
                                                            <option <?php if ($w->workout_target == 'Back') { ?> selected="selected" <?php } ?> value="Chest">Back</option>
                                                            <option <?php if ($w->workout_target == 'Triceps') { ?> selected="selected" <?php } ?> value="Triceps">Triceps</option>
                                                            <option <?php if ($w->workout_target == 'Full Body') { ?> selected="selected" <?php } ?> value="Full Body">Full Body</option>



                                                            <option <?php if ($w->workout_target == 'Legs') { ?> selected="selected" <?php } ?> value="Legs">Legs</option>
                                                            <option <?php if ($w->workout_target == 'Shoulders') { ?> selected="selected" <?php } ?> value="Shoulders">Shoulders</option>
                                                            <option <?php if ($w->workout_target == 'Biceps') { ?> selected="selected" <?php } ?> value="Biceps">Biceps</option>
                                                            <option <?php if ($w->workout_target == 'Abs') { ?> selected="selected" <?php } ?> value="Abs">Abs</option>
                                                            <option <?php if ($w->workout_target == 'Glutes') { ?> selected="selected" <?php } ?> value="Glutes">Glutes</option>
                                                            <option <?php if ($w->workout_target == 'Hamstrings') { ?> selected="selected" <?php } ?> value="Hamstrings">Hamstrings</option>
                                                            <option <?php if ($w->workout_target == 'Quadriceps') { ?> selected="selected" <?php } ?> value="Quadriceps">Quadriceps</option>


                                                        </select>

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="image">Image</label>
                                                        <input type="file" class="form-control-file" id="workout_image" name="workout_image">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="videoUrl">Video URL</label>
                                                        <input type="text" class="form-control" id="videoUrl" name="workout_video_url" value="<?= $w->workout_video_url ?>" placeholder="Enter video URL">
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