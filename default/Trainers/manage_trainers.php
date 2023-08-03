<?php
session_start();
if ($_SESSION["user"]["user_role"] == 2) {
  include_once "../head.php";
} else {
  header("Location:../login/logout.php");
}


include_once "trainer.php";

$t = new trainer();




if (isset($_GET["did"]))
{
	$trainer_id=$_GET["did"];
	$t->delete_trainer($trainer_id);
}
$data =$t->get_all_trainer();
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
                                            <h4>Manage Trainers </h4>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="page-header-breadcrumb">
                                        <ul class="breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="index-1.htm"> <i class="feather icon-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Manage Trainer</a> </li>
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
                                            <div class="container">

                                            <?php
echo "
                                                <table id='basic-btn' class='table table-striped'>
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>NIC NO</th>
                                                            <th>Email</th>

                                                            <th>Phone NO</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>


                                                    ";
                                                    foreach($data as $item){

                                                        echo " 

                                                        <tr>
                                                            <td>$item->trainer_fname</td>
                                                            <td>$item->trainer_nic</td>
                                                            <td>$item->trainer_email</td>

                                                            <td>$item->trainer_phone_number</td>
                                                            <td>
                                                                <a class='table_icons' href='trainer_profile.php?t_id=$item->trainer_id' title='View'><button class='table_btn btn btn-out btn-primary btn-square '><i class='tb_i fa-1x fa fa-eye'></i></button></a>
                                                                <a class='table_icons' href='add_trainers.php?t_id=$item->trainer_id' title='Edit'><button class='table_btn btn btn-out btn-success btn-square'><i class='tb_i fa-1x fa fa-edit'></i></button></a>
                                                                <button onclick='delete_trainer($item->trainer_id)' class='table_btn btn btn-out btn-danger btn-square'><i class='tb_i fa-1x fa fa-trash'></button></i>
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

</div>



<!-- ------------------------------------------------------------------------------------------- -->

<?php
include_once "../foot.php"
?>



<script>


function delete_trainer(d) {
    if (confirm("Arw you sure you want to delete " + d)) {
        window.location.href = "manage_trainers.php?did=" + d;
    }
}
</script>