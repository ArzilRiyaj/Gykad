<?php
session_start();
if ($_SESSION["user"]["user_role"] == 2) {
    include_once "../head.php";
} elseif ($_SESSION["user"]["user_role"] == 1) {
    include_once "../members/member_head.php";
} else {
    header("Location:../login/logout.php");
}

include_once "../Payment/payment.php";

$p = new payment();

$pay = $p->get_payment_by_id($_GET['p_id']);

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
                                            <h4>View Payment </h4>
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
                                            <h5>Payment Info </h5>

                                            <div class="card-header-right">
                                                <ul class="list-unstyled card-option">
                                                    <li><i class="feather icon-maximize full-card"></i></li>
                                                    <li><i class="feather icon-minus minimize-card"></i></li>

                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-block">
                                            <!-- Invoice card start -->

                                            <div class="card-block">
                                                <div class="row invoive-info">

                                                    <div class="col-md-4 col-sm-6">

                                                        <table class="table table-responsive invoice-table invoice-order table-borderless">
                                                            <tbody>
                                                                <tr>
                                                                    <th>Mane :</th>
                                                                    <td> <?= $pay->payment_member_name  ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Date :</th>
                                                                    <td><?= $pay->payment_date  ?></td>
                                                                </tr>

                                                                <tr>
                                                                    <th>Invoice Id :</th>
                                                                    <td>
                                                                    <?= $pay->payment_id  ?>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="table-responsive">
                                                            <table class="table  invoice-detail-table">
                                                                <thead>
                                                                    <tr class="thead-default">
                                                                        <th>Package</th>

                                                                        <th>Amount</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                          
                                                                            <p><?= $pay->package_name  ?></p>
                                                                        </td>

                                                                        <td>RS   <?= $pay->payment_amount  ?></td>

                                                                    </tr>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <table class="table table-responsive invoice-table invoice-total">
                                                            <tbody>

                                                                <tr class="text-info">
                                                                    <td>
                                                                        <hr>
                                                                        <h5 class="text-primary">Total :</h5>
                                                                    </td>
                                                                    <td>
                                                                        <hr>
                                                                        <h5 class="text-primary">Rs <?= $pay->payment_amount  ?></h5>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="row text-center">
                                                    <div class="col-sm-12 invoice-btn-group text-center">
                                                    <a href="print_invoice.php?p_id= <?= $pay->payment_id  ?>" target="_blank" class="btn btn-primary btn-print-invoice m-b-10 btn-sm waves-effect waves-light m-r-20" >Print</a>
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

<?php
include_once "../foot.php"
?>