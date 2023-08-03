<?php
session_start();

if ($_SESSION["user"]["user_role"] == 2) {


    include_once "../head.php";
} else {
    header("Location:../login/logout.php");
}


include_once "../Payment/payment.php";
$p = new payment();;


$data = '';
$tot = '';
if (isset($_POST["Search"])) {
    $data = $p->get_payment_by_date_range($_POST["fromDate"], $_POST["toDate"]);
    $tot=$p->get_total_income($_POST["fromDate"], $_POST["toDate"]);
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
                                            <h4>Income Report </h4>
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
                                            <h5>Filter </h5>
                                            <div class="card-header-right">
                                                <ul class="list-unstyled card-option">
                                                    <li><i class="feather icon-maximize full-card"></i></li>
                                                    <li><i class="feather icon-minus minimize-card"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-block">



                                            <div class="container mt-5">
                                                <div class="row ">
                                                    <div class="col-md-12">
                                                        <form method="POST" action="monthly_income_report.php">
                                                            <div class="form-row">
                                                                <div class="form-group col">
                                                                    <label for="fromDate">From :</label>
                                                                    <input type="date" class="form-control" id="fromDate" name="fromDate">
                                                                </div>
                                                                <div class="form-group col">
                                                                    <label for="toDate">To :</label>
                                                                    <input type="date" class="form-control" id="toDate" name="toDate">
                                                                </div>
                                                            </div>
                                                            <button type="submit" name="Search" class="btn btn-primary">Submit</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>







                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <!-- ------------ -->


                        <div class="page-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5></h5>
                                            <div class="card-header-right">
                                                <ul class="list-unstyled card-option">
                                                    <li><i class="feather icon-maximize full-card"></i></li>
                                                    <li><i class="feather icon-minus minimize-card"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-block">




                                        <div class="dt-responsive table-responsive">
<?php
echo "
                        <table id='basic-btn' class='table table-striped table-bordered nowrap'>

                          <thead>
                            <tr>
                              <th>Payment ID</th>
                            
                              <th>Payment Date</th>
                              <th>Amount</th>
                           
                           
                            </tr>
                          </thead>
                          <tbody>";
                          if (isset($_POST['Search'])) {
                          foreach($data as $item){

                            echo " 
                            
                            <tr>
                              <td>$item->payment_id</td>
                          
                              <td>$item->payment_date</td>
                              <td>$item->payment_amount</td>
                           
                             
                            </tr> 
                                            

                            ";
                          }
                        }
                        if (isset($_POST['Search'])) {
                          echo "</tbody>
                          <tfoot>
                          <tr>
                              <th colspan='2'>Totals:</th>
                              <th>$tot->total_amount</th>
                          
                              
                              
                      </tr>";
                        }
                        echo "   </tfoot>
                          </table>"; 

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



<!-- ------------------------------------------------------------------------------------------- -->

<?php
include_once "../foot.php"
?>