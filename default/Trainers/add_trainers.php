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
                                            <h4>Add New Trainer</h4>
                                            
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
                                            <form>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="row">

                                                            <div class="form-group col-md-6">
                                                                <label for="firstName">First Name:</label>
                                                                <input type="text" class="form-control" id="firstName" placeholder="Enter your first name">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="lastName">Last Name:</label>
                                                                <input type="text" class="form-control" id="lastName" placeholder="Enter your last name">
                                                            </div>

                                                        </div>
                                                        <div class="form-group">
                                                            <label for="nicNumber">NIC Number</label>
                                                            <input type="text" class="form-control" id="nicNumber" name="nicNumber" placeholder="Enter NIC number">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="photo">Photo</label>
                                                            <input type="file" class="form-control-file" id="photo" name="photo">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="telephone">Telephone Number</label>
                                                            <input type="tel" class="form-control" id="telephone" name="telephone" placeholder="Enter telephone number">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="address">Address</label>
                                                            <input type="text" class="form-control" id="address" name="address" placeholder="Enter address">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="email">Email</label>
                                                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label for="password">Password</label>
                                                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Submit</button>
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