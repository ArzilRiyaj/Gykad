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

include_once "workout.php";

$w = new workout();

$workout = $w->get_workout_by_id($_GET['w_id']);

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
                                            <h4><?= $workout->workout_name ?></h4>
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
                                            <h5>About <?= $workout->workout_name ?> </h5>
                                            <div class="card-header-right">
                                                <ul class="list-unstyled card-option">
                                                    <li><i class="feather icon-maximize full-card"></i></li>
                                                    <li><i class="feather icon-minus minimize-card"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-block">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="card-body">

                                                            <img src="../Workouts/workout_images/<?= $workout->workout_id ?>-0.gif" onerror="this.onerror=null;this.src='../Workouts/workout_images/<?= $workout->workout_id ?>-0.png';" class="img-fluid" alt="workout photo">
                                                            <!-- <img src="../Workouts/workout_images/<?= $workout->workout_id ?>-0.gif" onerror="this.onerror=null;this.src='../Workouts/workout_images/<?= $workout->workout_id ?>-0.jpg';" class="img-fluid" alt="workout photo">
                                                            <noscript>
                                                                <img src="../Workouts/workout_images/<?= $workout->workout_id ?>-0.png" class="img-fluid" alt="workout photo">
                                                            </noscript> -->


                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="card-body">
                                                            <p class="card-text"><strong>Workout Category:</strong> <?= $workout->workout_category ?></p>
                                                            <p class="card-text"><strong>Target Muscle Group:</strong> <?= $workout->workout_target ?></p>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="card-body">
                                                            <p class="card-text"><strong>Video:</strong> <a href="<?= $workout->workout_video_url ?>" target="_blank"><button class="btn btn-danger"><i class="icofont icofont-eye-alt"></i>View</button></a></p>
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

</div>
<?php
include_once "../foot.php"
?>