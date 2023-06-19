<?php
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
                                                <form>
                                                    <div class="form-group">
                                                        <label for="workoutName">Workout Name</label>
                                                        <input type="text" class="form-control" id="workoutName" name="workoutName" placeholder="Enter workout name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="category">Category</label>
                                                        <select class="form-control" id="category" name="category">
                                                            <option value="">Select category</option>
                                                            <option value="Cardio">Cardio</option>
                                                            <option value="Strength">Strength</option>
                                                            <option value="Yoga">Yoga</option>

                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="targetMuscleGroup">Target Muscle Group</label>
                                                        <select class="form-control" id="targetMuscleGroup" name="targetMuscleGroup">
                                                            <option value="">Select target muscle group</option>
                                                            <option value="Chest">Chest</option>
                                                            <option value="Back">Back</option>
                                                            <option value="Legs">Legs</option>

                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="image">Image</label>
                                                        <input type="file" class="form-control-file" id="image" name="image">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="videoUrl">Video URL</label>
                                                        <input type="text" class="form-control" id="videoUrl" name="videoUrl" placeholder="Enter video URL">
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