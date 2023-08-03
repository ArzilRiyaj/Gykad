<?php
session_start();

if ($_SESSION["user"]["user_role"] == 2) {
    include_once "../head.php";
} elseif ($_SESSION["user"]["user_role"] == 3) {
    include_once "../Trainers/trainer_head.php";
} else {
    header("Location:../login/logout.php");
}



include_once "../Workouts/workout.php";
include_once "../shedule/shedule.php";
include_once "../shedule/schedule_list.php";

$s = new schedule();
$w = new Workout();
$sl = new schedule_list();

$workouts = $w->get_all_workout();



if (isset($_GET["s_id"])) {

    $s = $s->get_schedule_by_id($_GET["s_id"]);
}

if (isset($_POST["submit"])) {


    $s->schedule_trainer = $_SESSION["user"]["user_id"];

    $s->schedule_name = $_POST["schedule_name"];



    $s->update_schedule($_POST["s_id"]);
   $sl->insert_schedule_list($_POST["s_id"]);




}

$scl = $sl->get_Schedule_List_by_schedule_id($_GET["s_id"]);




?>
<!-- -------------------------------------------------------------------------------- -->
<style>
    .borderless-input {
        border: none;
        outline: none;
    }
</style>



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
                                            <h4>Edit Schedule</h4>
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
                                            <h5>Workout List</h5>
                                            <div class="card-header-right">
                                                <ul class="list-unstyled card-option">
                                                    <li><i class="feather icon-maximize full-card"></i></li>
                                                    <li><i class="feather icon-minus minimize-card"></i></li>

                                                </ul>
                                            </div>
                                        </div>



                                        <div class="card-block">
                                            <div class="dt-responsive table-responsive">
                                                <form method="POST" action="edit_schedule.php?s_id=<?= $s->schedule_id  ?> " id="f_id">
                                                    <div class="container">
                                                        <div class="row">


                                                            <?php
                                                            if (isset($_GET["s_id"])) {
                                                                echo "
                                                        <input type='text' class='form-control' name='s_id' id='s_id'  value='" . $_GET['s_id'] . " '  placeholder='Enter  first name' hidden required>
";
                                                            }
                                                            ?>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">

                                                                    <label for="workout">Workout</label>
                                                                    <select class="form-control" id="workout" name="workout" required>
                                                                        <option>Select Workout</option>
                                                                        <?php foreach ($workouts as $item) {
                                                                            if ($item->workout_id == $w->workout_id)
                                                                                echo "<option value='$item->workout_id' selected='selected'>$item->workout_name </option>";
                                                                            else
                                                                                echo "<option value='$item->workout_id' >$item->workout_name </option>";
                                                                        } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="weight">Weight (Kg)</label>
                                                                    <input type="text" class="form-control" id="weight" onkeypress="return isNumber(event)">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="sets">Sets</label>
                                                                    <input type="text" class="form-control" id="sets" onkeypress="return isNumber(event)">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="reps">Reps</label>
                                                                    <input type="text" class="form-control" id="reps" name="reps" onkeypress="return isNumber(event)">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="description">Description</label>
                                                                    <textarea class="form-control" id="dis" name="description" rows="3"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="reps">Schedule Name</label>
                                                                    <input type="text" class="form-control" value="<?= $s->schedule_name  ?> " name="schedule_name" id="schedule_name" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="button" class="btn btn-primary" name="addprbtn" id="add_prbtn">ADD</button>
                                                    </div>
                                                    <hr>
                                                    <table class="table">

                                                        <thead>
                                                            <tr>
                                                                <th>*</th>
                                                                <th>Workout</th>
                                                                <th>Weight (Kg)</th>
                                                                <th>Sets</th>
                                                                <th>Reps / Time</th>

                                                                <th>Description</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id='schedule_tbody'>
                                                            <tr>
                                                                <?php foreach ($scl as $item) :  ?>
                                                                    <td>*</td>
                                                                    <td><input type='text' name='' value='<?= $item->workout_name ?>' class='borderless-input' readonly>
                                                                        <input type='text' value='<?= $item->schedule_list_workout ?>' name='schedule_list_workout[]' class='borderless-input' hidden readonly>
                                                                    </td>
                                                                    <td><input type='text' value='<?= $item->schedule_list_weight ?>' name='schedule_list_weight[]' class='borderless-input'></td>
                                                                    <td><input type='text' value='<?= $item->schedule_list_reps ?>' name='schedule_list_sets[]' class='borderless-input'></td>
                                                                    <td><input type='text' value='<?= $item->schedule_list_reps ?>' name='schedule_list_reps[]' class='borderless-input'></td>
                                                                    <td><textarea class='form-control borderless-input' id='description' name='schedule_list_dis[]' rows='3'><?= $item->schedule_list_dis ?></textarea></td>
                                                                    <td><button type='button' class='btn btn-sm btn-danger remove-row' onclick="remove_workout(<?= $item->schedule_list_id ?>)">Remove</button></td>
                                                            </tr>
                                                        <?php endforeach;  ?>
                                                        </tbody>
                                                    </table>
                                            </div>

                                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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


<!-- ------------------------------------------------------------------------------------------- -->

<?php
include_once "../foot.php"
?>


<script>



function remove_workout($x) {
        let x = $x;
        // alert(x);

        
        $.get("../ajax/ajax.php?type=remove_workout_from_list&ee=" + x, "", function(data) {
           
        });

        $(document).ready(function() {
    
    $('.remove-row').click(function() {
        $(this).closest('tr').remove();
    });
});
    }







    $("#add_prbtn").click(function() {
        add_workout_to_list();
        clear_products()
        validateWorkout()
    });




    function add_workout_to_list() {
        var workout = $("#workout option:selected").val();
        var workout1 = $("#workout option:selected").text();
        var weight = $("#weight").val();
        var sets = $("#sets").val();
        var reps = $("#reps").val();
        var dis = $('#dis').val();

        var newRow = $("<tr>\
        <td>*</td>\
        <td><input type='text' name='' value='" + workout1 + "' class='borderless-input' readonly>\
        <input type='text' name='schedule_list_workout[]' value='" + workout + "' class='borderless-input' hidden readonly></td>\
        <td><input type='text' value='" + weight + "' name='schedule_list_weight[]' class='borderless-input'></td>\
        <td><input type='text' value='" + sets + "' name='schedule_list_sets[]' class='borderless-input'></td>\
        <td><input type='text' value='" + reps + "' name='schedule_list_reps[]' class='borderless-input'></td>\
        <td><textarea class='form-control borderless-input' id='description' name='schedule_list_dis[]' rows='3'>" + dis + "</textarea></td>\
        <td><button type='button' class='btn btn-sm btn-danger remove-row'>Remove</button></td>\
    </tr>");


        newRow.find('.remove-row').click(function() {
            $(this).closest('tr').remove();
        });

        $("#schedule_tbody").append(newRow);
    }



    function isNumber(event) {
        var charCode = event.which ? event.which : event.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            event.preventDefault();
            return false;
        }
        return true;
    }



    function clear_products() {

        $("#workout option:selected").val();

        $("#weight").val("");
        $("#sets").val("");
        $("#reps").val("");


    }


    //     function validateWorkout() {
    //     var workout = $("#workout value:selected").val();
    //     if (!workout) {
    //         alert("Please select a workout.");
    //     }  


    // }
</script>