<?php
session_start();
include_once "packages.php";
$p = new package();

if ($_SESSION["user"]["user_role"] == 2) {
    include_once "../head.php";
} elseif($_SESSION["user"]["user_role"] == 3){
    include_once "../Trainers/trainer_head.php";
}

else {
    header("Location:../login/logout.php");
}

if (isset($_GET["did"]))
{
	$package_id=$_GET["did"];
	$p->delete_package($package_id);
}

$data = $p->get_all_active_package();

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
                                            <h4>Manage Packages</h4>
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
                                            <h5>Packages</h5>
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
                        <table id='basic-btn' class='table table-striped table-bordered nowrap'>
                                                <thead>
                                                    <tr>
                                                        <th>Package ID</th>
                                                        <th>Package Name</th>
                                                       
                                                        <th>Package Price</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>

                                                ";
                                            foreach ($data as $item) {

                                                echo " 
                                                <tbody>
                                                    <tr>
                                                        <td>$item->package_id</td>
                                                        <td>$item->package_name </td>
                                                      
                                                        <td>$item->package_price</td>
                                                        <td> <a class='table_icons' href='view_package.php?p_id=$item->package_id' title='View'><button class='table_btn btn btn-out btn-primary btn-square '><i class='tb_i fa-1x fa fa-eye'></i></button></a>
                                                        <a class='table_icons actionButtons' href='add_packages.php?p_id=$item->package_id' title='Edit'><button class='table_btn btn btn-out btn-success btn-square'><i class='tb_i fa-1x fa fa-edit'></i></button></a>
                                                        <button onclick='delete_package($item->package_id)' class=' actionButtons table_btn btn btn-out btn-danger btn-square'><i class='tb_i fa-1x fa fa-trash'></button></i></td>
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

<script>
   var actionButtons = document.querySelectorAll('.actionButtons');
    var userRole = "<?php echo $_SESSION['user']['user_role']; ?>";

    if (userRole === '3') {
        for (var i = 0; i < actionButtons.length; i++) {
            actionButtons[i].style.display = 'none';
        }
    }


function delete_package(d) {
    if (confirm("Arw you sure you want to delete " + d)) {
        window.location.href = "manage_packages.php?did=" + d;
    }
}

</script>