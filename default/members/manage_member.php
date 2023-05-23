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
                                            <h4>Manage Members</h4>

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
                                            <h5>All Members </h5>

                                            <div class="card-header-right">
                                                <ul class="list-unstyled card-option">
                                                    <li><i class="feather icon-maximize full-card"></i></li>
                                                    <li><i class="feather icon-minus minimize-card"></i></li>

                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-block">
                                            <div class="container">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>NIC NO</th>
                                                            <th>Membership</th>
                                                            <th>Personal Trainer</th>
                                                            <th>Phone NO</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>John Doe</td>
                                                            <td>123456789</td>
                                                            <td>Gold</td>
                                                            <td>Yes</td>
                                                            <td>555-1234</td>
                                                            <td>
                                                                <a href="#" title="View"><i class="fas fa-eye"></i></a>
                                                                <a href="#" title="Edit"><i class="fas fa-edit"></i></a>
                                                                <a href="#" title="Delete"><i class="fas fa-trash"></i></a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Jane Smith</td>
                                                            <td>987654321</td>
                                                            <td>Silver</td>
                                                            <td>No</td>
                                                            <td>555-5678</td>
                                                            <td>
                                                                <a class="table_icons" href="member_profile.php" title="View"><button class="table_btn btn btn-out btn-primary btn-square "><i class="tb_i fa-1x fa fa-eye"></i></button></a>
                                                                <a class="table_icons" href="#" title="Edit"><button class="table_btn btn btn-out btn-success btn-square"><i class="tb_i fa-1x fa fa-edit"></i></button></a>
                                                                <a class="table_icons" href="#" title="Delete"><button class="table_btn btn btn-out btn-danger btn-square"><i class="tb_i fa-1x fa fa-trash"></button></i></a>
                                                            </td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                </table>
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