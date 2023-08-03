<?php
session_start();
if ($_SESSION["user"]["user_role"] == 2) {


    include_once "../head.php";
} else {
    header("Location:../login/logout.php");
}

include_once "../members/member.php";
include_once "../Trainers/trainer.php";

$t = new trainer();
$m = new Member();


$trainers_in_gym = $t->get_all_trainers_in_gym_now();
$count_trainers_in_gym =$t->no_of_trainers_in_gym_now();

$m_count = $m->no_of_active_members();
$mem_in_gym = $m->get_all_members_in_gym_now();
$mem_in_gym_now = $m->no_of_members_in_gym_now();
// $data = $m->get_all_active_members();

// print_r($mem_in_gym)
?>

<!-- ------------------------------------------------------------------------------------ -->

<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-body">
                    <div class="row">
                        <!-- task, page, download counter  start -->
                        <div class="col-xl-4 col-md-6">
                            <div class="card bg-c-green update-card">
                                <div class="card-block">
                                    <div class="row align-items-end">
                                        <div class="col-8">
                                            <h3 class="text-white"><?= $m_count ?></h3>
                                            <h6 class="text-white m-b-0">Active Members</h6>
                                        </div>
                                        <div class="col-4 text-left">
                                            <i class="fa fa-users fa-3x "></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update : <span id="currentTime"></span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="card bg-c-green update-card">
                                <div class="card-block">
                                    <div class="row align-items-end">
                                        <div class="col-8">
                                            <h3 class="text-white"><?= $mem_in_gym_now ?></h3>
                                            <h6 class="text-white m-b-0">Members In Gym Now</h6>

                                        </div>
                                        <div class="col-4 text-right">
                                            <i class="fa fa-users fa-3x "></i>


                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update : <span id="currentTime1"></span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="card bg-c-green update-card">
                                <div class="card-block">
                                    <div class="row align-items-end">
                                        <div class="col-8">
                                            <h3 class="text-white"><?= $count_trainers_in_gym?></h3>
                                            <h6 class="text-white m-b-0">Trainers In Gym Now</h6>
                                        </div>
                                        <div class="col-4 text-right">
                                            <i class="fa fa-user fa-3x"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update : <span id="currentTime2"></span></p>
                                </div>
                            </div>
                        </div>
                       

                        <!--  sale analytics start -->
                        <div class="col-xl-6 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Members In Gym</h5>

                                    <div class="card-header-right">
                                        <ul class="list-unstyled card-option">
                                            <li><i class="feather icon-maximize full-card"></i></li>
                                            <li><i class="feather icon-minus minimize-card"></i>
                                        </ul>


                                    </div>
                                </div>
                                <div class="card-block">
                                    <div id="sales-analytics" style="height: 265px;">


                                        <?php

                                        echo "
                        <table class='table table-striped table-bordered nowrap'>

                          <thead>
                            <tr>
                              <th>Name</th>
                              <th>Member ID</th>
                              
                            </tr>
                          </thead>
                          <tbody>";

                                        foreach ($mem_in_gym as $item) {
                                            echo "
                                          

                                            <tr>
                                            <td>$item->member_fname</td>
                                            <td>$item->member_reg_no</td>
                                       
                                           
                                          </tr> 
                                            ";
                                        }
                                        echo "</tbody></table>";


                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Trainers In Gym</h5>

                                    <div class="card-header-right">
                                        <ul class="list-unstyled card-option">
                                            <li><i class="feather icon-maximize full-card"></i></li>
                                            <li><i class="feather icon-minus minimize-card"></i>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div id="sales-analytics" style="height: 265px;">


                                    <?php

                                    echo "
                        <table class='table table-striped table-bordered nowrap'>

                          <thead>
                            <tr>
                              <th>Name</th>
                              <th>Trainer ID</th>
                              
                            </tr>
                          </thead>
                          <tbody>";

                                    foreach ($trainers_in_gym as $item) {
                                        echo "
                                          

                                            <tr>
                                            <td>$item->trainer_fname</td>
                                            <td>$item->trainer_reg_no</td>
                                       
                                           
                                          </tr> 
                                            ";
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
</div>
</div>
</div>

<!-- ------------------------------------------------------------------------------------------- -->

<?php
include_once "../foot.php"
?>


<script>
    function setCurrentTime() {
        var now = new Date();
        var hours = now.getHours();
        var minutes = now.getMinutes();
        var seconds = now.getSeconds();


        if (hours < 10) {
            hours = '0' + hours;
        }
        if (minutes < 10) {
            minutes = '0' + minutes;
        }
        if (seconds < 10) {
            seconds = '0' + seconds;
        }

        var currentTime = hours + ':' + minutes + ':' + seconds;

        
        var h1Tag = document.getElementById('currentTime');
        h1Tag.textContent = currentTime;

        var h1Tag1 = document.getElementById('currentTime1');
        h1Tag1.textContent = currentTime;

        var h1Tag2 = document.getElementById('currentTime2');
        h1Tag2.textContent = currentTime;
    }


    setCurrentTime();

    // Update the current time every second
    // setInterval(setCurrentTime, 1000);
</script>