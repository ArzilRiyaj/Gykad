<?php
session_start();


include_once "payment.php";
include_once "../members/member.php";

$m = new member();
$all = $m->get_all_active_members();

$p = new payment();


if (isset($_POST["attendance_member_id"])) {

    $p->payment_member = $_POST["attendance_member_id"];
    $p->payment_amount = $_POST["payment_amount"];
    $p->payment_date = $_POST["payment_date"];
    $p->payment_managed_by = '1';
    $p->insert_payment();
    header("Location:add_payment.php?s=yes");
}


if ($_SESSION["user"]["user_role"] == 2) {


    include_once "../head.php";
} else {
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
                                            <h4>Add Payment </h4>
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
                                            <h5>Payment Form</h5>
                                            <div class="card-header-right">
                                                <ul class="list-unstyled card-option">
                                                    <li><i class="feather icon-maximize full-card"></i></li>
                                                    <li><i class="feather icon-minus minimize-card"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-block">
                                            <form action="add_payment.php" method="POST">
                                                <div class="form-group">
                                                    <label for="member">Member</label>
                                                    <select class="js-example-basic-single col-sm-12 select2-hidden-accessible" tabindex="-1" aria-hidden="true" id="memberId" name="attendance_member_id" onchange=" get_amt()">
                                                        <option value="-1">Select Member</option>
                                                        <?php foreach ($all as $item) {
                                                            if ($item->member_id == $m->member_fname) {
                                                                echo "<option value='$item->member_id' selected='selected'>$item->member_reg_no $item->member_fname</option>";
                                                            } else {
                                                                echo "<option value='$item->member_id'>$item->member_reg_no $item->member_fname</option>";
                                                            }
                                                        } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="paymentDate">Payment Date</label>
                                                    <input type="date" class="form-control" id="paymentDate" name="payment_date" required>
                                                </div>
                                                <!-- <div class="form-group">
                                                    <label for="paymentDate">For Month</label>
                                                    <input type="text" class="form-control" id="paymentDate1" name="payment_date" required>                                                </div> -->
                                                <div class="form-group">
                                                    <label for="amount">Amount</label>
                                                    <input type="text" class="form-control" id="amount" name="payment_amount" placeholder="Enter payment amount" onkeypress="return isNumber(event)" required>
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
if (isset($_GET['s'])) {


    echo '<script>
    swal({
        title: "Success!",
        text: "Payment Successfully Added",
        icon: "success",
        button: "Ok",
    }).then(function() {
        window.location.href = "manage_payment.php";
      });
    

    
    </script>';
}


?>

<script>
    function isNumber(event) {
        var charCode = event.which ? event.which : event.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            event.preventDefault();
            return false;
        }
        return true;
    }



    function get_amt() {
        let x = $("#memberId").val();
        // alert(x);

        
        $.get("../ajax/ajax.php?type=payment_amount&ee=" + x, "", function(data) {
            console.log(data);
            var tmp = JSON.parse(data);
            console.log(tmp.package_price);

           
            $("#amount").val(tmp.package_price);
        });
    }


    
   
</script>