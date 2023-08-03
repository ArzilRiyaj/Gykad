<?php
session_start();
include_once "trainer.php";
include_once "../Login/login.php";

$t = new trainer();

$lg_member = new login();




if (isset($_POST["trainer_fname"])) {


    $t->trainer_fname = $_POST["trainer_fname"];
    $t->trainer_sname = $_POST["trainer_sname"];
    $t->trainer_nic = $_POST["trainer_nic"];
    $t->trainer_email = $_POST["trainer_email"];
    $t->trainer_phone_number = $_POST["trainer_phone_number"];
    $t->trainer_address = $_POST["trainer_address"];
    $t->trainer_reg_no = $t->trainer_reg_no();

   
    $lg_member->user_name = $_POST["trainer_fname"];
    $lg_member->user_email = $_POST["trainer_email"];
    $lg_member->user_role = "3";
    $lg_member->user_password = $_POST["trainer_password"];

    
    if(isset($_POST["t_id"])){
        $t->update_trainer($_POST["t_id"]);
        header("Location:manage_trainers.php?e=yes"); 
    }
    else{
    $result =  $t->insert_trainer(); 
    $lg_member->insert_login($result);

    // echo $result;

     header("Location:add_trainers.php?s=yes");
    }
}


if (isset($_GET["t_id"])) {
    $t = $t->get_trainer_by_id($_GET["t_id"]);
}





if($_SESSION["user"]["user_role"]==2){


    include_once "../head.php";
}
elseif($_SESSION["user"]["user_role"]==3){

    include_once "../Trainers/trainer_head.php";
}
else{
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
                                        <h4>
                                                <?php
                                                if (isset($_GET["t_id"])) {
                                                    echo "Edit Trainer  ";
                                                } else
                                                    echo "Add New Trainer"

                                                ?></h4>

                                         
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

                                            <div class="card-header-right">
                                                <ul class="list-unstyled card-option">
                                                    <li><i class="feather icon-maximize full-card"></i></li>
                                                    <li><i class="feather icon-minus minimize-card"></i></li>

                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-block">
                                            <form method="POST" action="add_trainers.php" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                        <?php
                                                        if(isset($_GET["t_id"])){
                                                            echo"
                                                        <input type='text' class='form-control' name='t_id' id='t_id'  value='".$_GET['t_id'] ." '   hidden required>
";}
                                                        ?>
                                                            <div class="form-group col-md-6">
                                                                <label for="firstName">First Name:</label>
                                                                <input type="text" class="form-control" id="firstName" name="trainer_fname"  value="<?= $t->trainer_fname ?>"  placeholder="Enter your first name" required>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="lastName">Last Name:</label>
                                                                <input type="text" class="form-control" id="lastName" name="trainer_sname" value="<?= $t->trainer_sname ?>"  placeholder="Enter your last name">
                                                            </div>

                                                        </div>
                                                        <div class="form-group">
                                                            <label for="nicNumber">NIC Number</label>
                                                            <input type="text" class="form-control" id="nicNumber" name="trainer_nic" value="<?= $t->trainer_nic ?>" placeholder="Enter NIC number">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="photo">Photo</label>
                                                            <input type="file" class="form-control-file" id="trainer_photo"  name="trainer_photo">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="telephone">Telephone Number</label>
                                                            <input type="tel" class="form-control" id="telephone" name="trainer_phone_number" value="<?= $t->trainer_phone_number ?>"  placeholder="Enter telephone number">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="address">Address</label>
                                                            <input type="text" class="form-control" id="address" name="trainer_address" value="<?= $t->trainer_address ?>"  placeholder="Enter address">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="email">Email</label>
                                                            <input type="email" class="form-control" id="email" name="trainer_email" value="<?= $t->trainer_email ?>"  placeholder="Enter email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="password">Password</label>
                                                            <input type="password" class="form-control" id="trainer_password" value="<?= $t->trainer_password ?>"  name="trainer_password" placeholder="Enter password">
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
include_once "../foot.php";



if (isset($_GET['s'])) {


    echo '<script>
    swal({
        title: "Success!",
        text: "Trainer Successfully Added",
        icon: "success",
        button: "Ok",
    }).then(function() {
        window.location.href = "manage_trainers.php";
      });
    

    
    </script>';
}

?>

