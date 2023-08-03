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

$pay =$p->get_payments_by_member_id($_SESSION["user"]["user_id"]);


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
                                            <h4>Payment History</h4>
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
                                            <h5>Payment</h5>
                                            <div class="card-header-right">
                                                <ul class="list-unstyled card-option">
                                                    <li><i class="feather icon-maximize full-card"></i></li>
                                                    <li><i class="feather icon-minus minimize-card"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-block">

                                            <div class="container mt-5">

                                                <div class="dt-responsive table-responsive">
                                                    <?php
                                                    echo "
<table id='basic-pay' class='table table-striped table-bordered nowrap'>

<thead>
<tr>
<th>Payment Id </th>
<th>Date</th>                             
<th> Amount</th>

</tr>
</thead>
<tbody>";
                                                    foreach ($pay as $item) {
                                                        echo " 

<tr>
<td>$item->payment_id </td>
<td>$item->payment_date</td>
<td>$item->payment_amount </td>

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

</div>





<?php

include_once "../foot.php";
?>