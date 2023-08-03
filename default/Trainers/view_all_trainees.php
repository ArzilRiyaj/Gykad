<?php
session_start();
if ($_SESSION["user"]["user_role"] == 3) {
    include_once "trainer_head.php";
} else {
    header("Location:../login/logout.php");
}

include_once "../members/member.php";
$m = new member();

$data=$m->get_members_by_trainer_id($_SESSION["user"]["user_id"]);


// var_dump($data)
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
                                                <h4>Trainees</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="page-header-breadcrumb">
                                            <ul class="breadcrumb-title">
                                                <li class="breadcrumb-item">
                                                    <a href="index-1.htm"> <i class="feather icon-home"></i> </a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="#!">Widget</a> </li>
                                            </ul>
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
                                                            <th>Member Reg Id</th>
                                                            <th>Name</th>
                                                            <th>ACTION</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>


                                                    ";
                                                    foreach($data as $item){

                                                        echo " 

                                                        <tr>
                                                        <td>$item->member_reg_no</td>
                                                            <td>$item->member_fname</td>
                                                            
                                                            <td>
                                                                <a class='table_icons' href='../members/member_profile.php?m_id=$item->member_id' title='View'><button class='table_btn btn btn-out btn-primary btn-square '><i class='tb_i fa-1x fa fa-eye'></i></button></a>
                                                              
                                                            </td>
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



 

<?php
include_once "../foot.php"
?>