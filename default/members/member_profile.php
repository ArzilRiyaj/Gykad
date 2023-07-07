<?php
include_once "../head.php";
include_once "member.php";

$m = new member();

$A= $m->get_member_by_id($_GET['m_id'])
?>
<!-- ------------------------------------------------------------------------------------------- -->






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
                                        <h4><?=$A->member_fname?> <?=$A->member_sname?> </h4>
                                       
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
                                        <h5>General Details</h5>
                                       
                                        <div class="card-header-right">
                                            <ul class="list-unstyled card-option">
                                                <li><i class="feather icon-maximize full-card"></i></li>
                                                <li><i class="feather icon-minus minimize-card"></i></li>
                                              
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <div class="container mt-5">


                                            <div class="row">
                                                <div class="col-md-4">

                                                  
                                                    <div class="card-body">
                                                        <img src="" class="img-fluid" alt="Member Photo">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">

                                                    <div class="card-body">
                                                        <p class="card-text"><strong>NIC No:</strong> <?=$A->member_nic?> </p>
                                                        <p class="card-text"><strong>Membership:</strong> Gold</p>
                                                        <p class="card-text"><strong>Personal Trainer:</strong> <?=$A->member_ptrainer?> </p>
                                                        <p class="card-text"><strong>Date of Birth:</strong> <?=$A->member_dob?> </p>
                                                    </div>

                                                </div>
                                                <div class="col-md-4">

                                                    <div class="card-body">
                                                        <p class="card-text"><strong>Phone No:</strong> <?=$A->member_phone_number?> </p>
                                                        <p class="card-text"><strong>Email:</strong> <?=$A->member_email?> </p>
                                                        <p class="card-text"><strong>Address:</strong> 1<?=$A->member_address?></p>

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

