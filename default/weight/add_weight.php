<?php
session_start();
if ($_SESSION["user"]["user_role"] == 2) {
    include_once "../head.php";
} elseif ($_SESSION["user"]["user_role"] == 1) {
    include_once "../members/member_head.php";
} else {
    header("Location:../login/logout.php");
}

include_once "weight.php";

$w = new weight();

if (isset($_POST["weight_kg"])) {


    $w->weight_kg = $_POST["weight_kg"];
    $w->weight_date = $_POST["weight_date"];
    $w->weight_member = $_SESSION["user"]["user_id"];

    if (isset($_POST["w_id"])) {
        $w->update_weight($_POST["w_id"]);
        // header("Location:manage_packages.php?e=yes"); 
    } else {
        $w->insert_weight();
        // header("Location:add_trainers.php?s=yes");
    }
}
$weight = $w->get_average_weight_by_month($_SESSION["user"]["user_id"]);


var_dump($weight);
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
                                            <h4>My Weight Progress </h4>
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
                                            <h5></h5>
                                            <div class="card-header-right">
                                                <ul class="list-unstyled card-option">
                                                    <li><i class="feather icon-maximize full-card"></i></li>
                                                    <li><i class="feather icon-minus minimize-card"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-block">
                                            <form method="POST" action="add_weight.php">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="dateInput" class="form-label">Date</label>
                                                            <input type="date" class="form-control" id="dateInput" name="weight_date" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="weightInput" class="form-label">Weight</label>
                                                            <input type="number" class="form-control" id="weightInput" name="weight_kg" step="0.01" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <input type="text" class="form-control"  id="weight_member" name="weight_member" hidden> -->

                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="page-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5></h5>
                                            <div class="card-header-right">
                                                <ul class="list-unstyled card-option">
                                                    <li><i class="feather icon-maximize full-card"></i></li>
                                                    <li><i class="feather icon-minus minimize-card"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-block">
                                            <div class="col-md-12 ">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Weight Progress</h5>

                                                    </div>
                                                    <div class="card-block">
                                                        <div id="weight"></div>
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
include_once "../foot.php";
?>

<script>
    var age_18_20 = <?= $w->get_average_weight_by_month($_SESSION["user"]["user_id"]); ?>;
    const keysArray = [];
    const valuesArray = [];

    for (const key in age_18_20) {
        if (age_18_20.hasOwnProperty(key)) {
            keysArray.push(key);
            valuesArray.push(age_18_20[key]);
        }
    }

    console.log(keysArray); 
    console.log(valuesArray);
    valuesArray.unshift('Weight');


    var chart = c3.generate({

        bindto: '#weight',
        data: {
            columns: [
                valuesArray,

            ],

            type: 'bar',
            colors: {

                data4: '#AB8CE4',

            },
            types: {
                Weight: 'line',
            },
        },
        axis: {
            x: {
                type: 'category',
                categories: keysArray,

                // categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            }
        }
    });
</script>