<?php
session_start();

include_once "packages.php";
include_once "../members/member.php";

$p = new package();
$m = new member();

$no = $m->no_of_members_using_package($_GET['p_id']);

$pack = $p->get_package_by_id($_GET['p_id']);





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
                                            <h4><?= $pack->package_name ?></h4>
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
                                            <div class="row">
                                                <div class="col-md-4">


                                                    <div class="card-body">
                                                        <p class="card-text"><strong>Active Subscription :</strong> <?= $no ?> </p>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">

                                                    <div class="card-body">
                                                        <p class="card-text"><strong>Price:</strong> <?= $pack->package_price  ?> </p>


                                                    </div>

                                                </div>
                                                <div class="col-md-4">

                                                    <div class="card-body">


                                                    </div>
                                                </div>
                                            </div>
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

                                            <div class="row">
                                                <div class="col-md-6">


                                                    <div class="card-body">
                                                        <div class="card-header">
                                                            <h5>Male Female Count</h5>

                                                        </div>
                                                        <div class="card-block">
                                                            <div id="chart3_pie"></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">

                                                    <div class="card-body">

                                                        <div class="card-header">
                                                            <h5>Age Count</h5>


                                                            <div class="card-block">
                                                                <div id="chart4111"></div>
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
</div>

</div>



<!-- ------------------------------------------------------------------------------------------- -->

<?php
include_once "../foot.php"
?>



<script>
    var data1Value = <?= $m->get_male_members_count($_GET['p_id']) ?>;
    var female = <?= $m->get_female_members_count($_GET['p_id']) ?>;


    console.log(data1Value); // Log the value to the console

    var chart = c3.generate({
        bindto: '#chart3_pie',
        data: {
            columns: [
                ['MALE', data1Value],
                ['FEMALE', female],

            ],
            type: 'pie',
        },
        color: {
            pattern: ['#1ABC9C', '#4C5667', '#00C232', '#AB8CE4']
        },
        pie: {
            label: {
                format: function(value, ratio, id) {
                    return value; // Display values as numbers
                }
            }
        }
    });


    /*Combination Chart*/


    var age_14_18 = <?= $m->no_of_members_using_package_15_18($_GET['p_id']); ?>;
    var age_18_20 = <?= $m->no_of_members_using_package_18_20($_GET['p_id']); ?>;
    var age_20_25 = <?= $m->no_of_members_using_package_20_25($_GET['p_id']); ?>;
    var age_25_30 = <?= $m->no_of_members_using_package_25_30($_GET['p_id']); ?>;
    var age_30_35 = <?= $m->no_of_members_using_package_30_35($_GET['p_id']); ?>;
    var age_35_40 = <?= $m->no_of_members_using_package_35_40($_GET['p_id']); ?>;

    var chart = c3.generate({
        bindto: '#chart4111',
        data: {
            columns: [
                ['15-18', age_14_18],
                ['18-20', age_18_20],
                ['20-25', age_20_25],
                ['25-30', age_25_30],
                ['30-35', age_30_35],
                ['35-40', age_35_40],
            ],
            type: 'bar',
            colors: {
                data1: '#00C292',
                data2: '#4C5667',
                data3: '#03A9F3',
                data4: '#AB8CE4',
                data5: '#a3aebd',
                data6: '#FEC107'
            },
            types: {
                // data3: 'spline',
                // data4: 'line',
                // data6: 'area',
            },
            groups: [
                // ['data1', 'data2']
            ]
        },
        axis: {
            y: {
                tick: {
                    format: d3.format('d')
                }
            }
        }
    });
</script>