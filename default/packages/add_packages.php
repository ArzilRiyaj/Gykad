<?php
session_start();
include_once "packages.php";
$p = new package();

if (isset($_GET["p_id"])) {
    $p = $p->get_package_by_id($_GET["p_id"]);
}
    

if (isset($_POST["package_name"])) {


    $p->package_name = $_POST["package_name"];
    // $p->package_duration = $_POST["package_duration"];
    $p->package_price = $_POST["package_price"];
    $p->package_description = $_POST["package_description"];


    if(isset($_POST["p_id"])){
       $p->update_package($_POST["p_id"]);
        header("Location:manage_packages.php?e=yes"); 
    }
    else{
    $p->insert_package(); 
    header("Location:manage_packages.php?s=yes");
    }
}



if($_SESSION["user"]["user_role"]==2){


    include_once "../head.php";
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
                                                if (isset($_GET["p_id"])) {
                                                    echo " Edit Package  ";
                                                } else
                                                    echo "Add New Package"

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
                                            <h5>Add New Package</h5>
                                            <div class="card-header-right">
                                                <ul class="list-unstyled card-option">
                                                    <li><i class="feather icon-maximize full-card"></i></li>
                                                    <li><i class="feather icon-minus minimize-card"></i></li>
                                             
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-block">
                                            <form method="POST" action="add_packages.php">

                                            <?php
                                                        if(isset($_GET["p_id"])){
                                                            echo"
                                                        <input type='text' class='form-control' name='p_id' id='m_id'  value='".$_GET['p_id'] ." '  placeholder='Enter  first name' hidden required>
";}
                                                        ?>
                                                <div class="form-group">
                                                    <label for="package_name">Package Name</label>
                                                    <input type="text" class="form-control" id="package_name" name="package_name" value="<?= $p->package_name ?>" placeholder="Enter package name" required>
                                                </div>
                                                <!-- <div class="form-group">
                                                    <label for="package_duration">Package Duration</label>
                                                    <input type="number" class="form-control" id="package_duration" name="package_duration"  value="<?= $p->package_duration ?>" placeholder="Enter package duration in days" required>
                                                </div> -->
                                                <div class="form-group">
                                                    <label for="package_price">Package Price</label>
                                                    <input type="number" class="form-control" id="package_price" name="package_price" value="<?= $p->package_price ?>" placeholder="Enter package price" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="package_description">Package Description</label>
                                                    <textarea class="form-control" id="package_description" name="package_description"  rows="3" placeholder="Enter package description" required> <?= $p->package_description ?></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Add Package</button>
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