<?php
session_start();
if($_SESSION["user"]["user_role"]==2){


    include_once "../head.php";
}
elseif($_SESSION["user"]["user_role"]==3){

    include_once "../Trainers/trainer_head.php";
}
else{
    header("Location:../login/logout.php");
}

include_once "../members/member.php";

$m = new member();
$mem_in_gym = $m->get_all_members_in_gym_now_by_trainer($_SESSION["user"]["user_id"]);
$m_count = $m->no_of_active_members_trainer_id($_SESSION["user"]["user_id"]);
?>


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
                                            <h6 class="text-white m-b-0">No Of Trainees</h6>
                                        </div>
                                        <div class="col-4 text-left">
                                            <i class="fa fa-users fa-3x "></i>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="card-footer">
                                    <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update : <span id="currentTime"></span></p>
                                </div> -->
                            </div>
                        </div>
                        <!-- <div class="col-xl-4 col-md-6">
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
                        </div> -->
                        <!-- <div class="col-xl-4 col-md-6">
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
                        </div> -->
                    </div>
                    <div class="row">
                        <!--  sale analytics start -->
                        <div class="col-xl-6 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Trainees In Gym</h5>

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

                        <!-- <div class="col-xl-6 col-md-12">
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
                        </div> -->
                      

                        
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