<?php
session_start();
if ($_SESSION["user"]["user_role"] == 2) {
    include_once "../head.php";
} else {
    header("Location:../login/logout.php");
}

include_once "../Login/login.php";
include_once "admin.php";

$a = new admin();

$lg_member = new login();



if (isset($_GET["admin_id"])) {
    $a = $a->get_admin_by_id($_GET["admin_id"]);
}



if (isset($_POST["admin_fname"])) {

   

    $a->admin_fname = $_POST["admin_fname"];
    $a->admin_sname = $_POST["admin_sname"];
    $a->admin_nic = $_POST["admin_nic"];
    $a->admin_phone_number = $_POST["admin_phone_number"];
    $a->admin_address = $_POST["admin_address"];
    $a->admin_email = $_POST["admin_email"];
    $a->admin_password = $_POST["admin_password"];


  

    $lg_member->user_name = $_POST["admin_fname"];
    $lg_member->user_email = $_POST["admin_email"];
    $lg_member->user_role = "2";
    $lg_member->user_password = $_POST["admin_password"];

    if (isset($_POST["admin_id"])) {
        $a->admin_id = $_POST["admin_id"];
        $a->update_admin($_POST["admin_id"]);
      
    } else {
        $result = $a->insert_admin();
        $lg_member->insert_login( $result);
        // header("Location:manage_admin.php?s=yes");
    }
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
                                            <h4>Add Admin</h4>
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
                                            <h5>Admin Form</h5>
                                            <div class="card-header-right">
                                                <ul class="list-unstyled card-option">
                                                    <li><i class="feather icon-maximize full-card"></i></li>
                                                    <li><i class="feather icon-minus minimize-card"></i></li>

                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-block">
                                            <form method="POST" action="add_admin.php" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <?php
                                                            if (isset($_GET["admin_id"])) {
                                                                echo "
                <input type='text' class='form-control' name='admin_id' id='admin_id' value='" . $_GET['admin_id'] . "' hidden required>
            ";
                                                            }
                                                            ?>
                                                            <div class="form-group col-md-6">
                                                                <label for="firstName">First Name:</label>
                                                                <input type="text" class="form-control" id="firstName" name="admin_fname" value="<?= $a->admin_fname ?>" placeholder="Enter your first name" required>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="lastName">Last Name:</label>
                                                                <input type="text" class="form-control" id="lastName" name="admin_sname" value="<?= $a->admin_sname ?>" placeholder="Enter your last name">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="nicNumber">NIC Number:</label>
                                                            <input type="text" class="form-control" id="nicNumber" name="admin_nic" value="<?= $a->admin_nic ?>" placeholder="Enter NIC number">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="photo">Photo:</label>
                                                            <input type="file" class="form-control-file" id="admin_photo" name="admin_photo">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="telephone">Telephone Number:</label>
                                                            <input type="tel" class="form-control" id="telephone" name="admin_phone_number" value="<?= $a->admin_phone_number ?>" placeholder="Enter telephone number">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="address">Address:</label>
                                                            <input type="text" class="form-control" id="address" name="admin_address" value="<?= $a->admin_address ?>" placeholder="Enter address">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="email">Email:</label>
                                                            <input type="email" class="form-control" id="email" name="admin_email" value="<?= $a->admin_email ?>" placeholder="Enter email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="password">Password:</label>
                                                            <input type="password" class="form-control" id="admin_password" value="<?= $a->admin_password ?>" name="admin_password" placeholder="Enter password">
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
<!-- ------------------------------------------------------------------------ -->
<?php
include_once "../foot.php";

?>