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
                                            <!-- <h4>Manage Members</h4> -->
                                            <h4>Income Report</h4>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <!-- <div class="page-header-breadcrumb">
                                        <ul class="breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="index-1.htm"> <i class="feather icon-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Widget</a> </li>
                                        </ul>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <!-- Page-header end -->

                        <div class="page-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <!-- <h5>All Members </h5> -->

                                            <div class="card-header-right">
                                                <ul class="list-unstyled card-option">
                                                    <li><i class="feather icon-maximize full-card"></i></li>
                                                    <li><i class="feather icon-minus minimize-card"></i></li>

                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-block">
                                            <div class="container">
                                            <form>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="from-date">From Date:</label>
            <input type="date" class="form-control" id="from-date" placeholder="Select From Date">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="to-date">To Date:</label>
            <input type="date" class="form-control" id="to-date" placeholder="Select To Date">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="membership">Membership:</label>
            <select class="form-control" id="membership">
              <option value="">Select Membership</option>
              <option value="silver">Silver</option>
              <option value="gold">Gold</option>
              <option value="platinum">Platinum</option>
              <option value="bronze">Bronze</option>
            </select>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="trainer">Personal Trainer:</label>
            <select class="form-control" id="trainer">
              <option value="">Select Trainer</option>
              <option value="kumar">Kumar</option>
              <option value="perera">Perera</option>
              <option value="fernando">Fernando</option>
              <option value="gunawardena">Gunawardena</option>
            </select>
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Generate Report</button>
    </form>
    <br>
    <br>
    <br>
                                                <div class="dt-responsive table-responsive">
                                                    <!-- <table id="basic-btn" class="table table-striped table-bordered nowrap"> -->

                                                        <!-- <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>NIC NO</th>
                                                                <th>Membership</th>
                                                                <th>Personal Trainer</th>
                                                                <th>Phone NO</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            <tr>
                                                                <td>Jane Smith</td>
                                                                <td>987602364V</td>
                                                                <td>Silver</td>
                                                                <td>Kumar</td>
                                                                <td>077 469 8226</td>
                                                                <td>
                                                                    <a class="table_icons" href="member_profile.php" title="View"><button class="table_btn btn btn-out btn-primary btn-square "><i class="tb_i fa-1x fa fa-eye"></i></button></a>
                                                                    <a class="table_icons" href="#" title="Edit"><button class="table_btn btn btn-out btn-success btn-square"><i class="tb_i fa-1x fa fa-edit"></i></button></a>
                                                                    <a class="table_icons" href="#" title="Delete"><button class="table_btn btn btn-out btn-danger btn-square"><i class="tb_i fa-1x fa fa-trash"></button></i></a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>John Doe</td>
                                                                <td>756159646V</td>
                                                                <td>Gold</td>
                                                                <td>Smith</td>
                                                                <td>088 765 4321</td>
                                                                <td>
                                                                    <a class="table_icons" href="member_profile.php" title="View"><button class="table_btn btn btn-out btn-primary btn-square "><i class="tb_i fa-1x fa fa-eye"></i></button></a>
                                                                    <a class="table_icons" href="#" title="Edit"><button class="table_btn btn btn-out btn-success btn-square"><i class="tb_i fa-1x fa fa-edit"></i></button></a>
                                                                    <a class="table_icons" href="#" title="Delete"><button class="table_btn btn btn-out btn-danger btn-square"><i class="tb_i fa-1x fa fa-trash"></button></i></a>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>Emily Johnson</td>
                                                                <td>838616946V</td>
                                                                <td>Platinum</td>
                                                                <td>Anderson</td>
                                                                <td>099 876 5432</td>
                                                                <td>
                                                                    <a class="table_icons" href="member_profile.php" title="View"><button class="table_btn btn btn-out btn-primary btn-square "><i class="tb_i fa-1x fa fa-eye"></i></button></a>
                                                                    <a class="table_icons" href="#" title="Edit"><button class="table_btn btn btn-out btn-success btn-square"><i class="tb_i fa-1x fa fa-edit"></i></button></a>
                                                                    <a class="table_icons" href="#" title="Delete"><button class="table_btn btn btn-out btn-danger btn-square"><i class="tb_i fa-1x fa fa-trash"></button></i></a>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>Michael Brown</td>
                                                                <td>958649616V</td>
                                                                <td>Bronze</td>
                                                                <td>Johnson</td>
                                                                <td>066 543 2109</td>
                                                                <td>
                                                                    <a class="table_icons" href="member_profile.php" title="View"><button class="table_btn btn btn-out btn-primary btn-square "><i class="tb_i fa-1x fa fa-eye"></i></button></a>
                                                                    <a class="table_icons" href="#" title="Edit"><button class="table_btn btn btn-out btn-success btn-square"><i class="tb_i fa-1x fa fa-edit"></i></button></a>
                                                                    <a class="table_icons" href="#" title="Delete"><button class="table_btn btn btn-out btn-danger btn-square"><i class="tb_i fa-1x fa fa-trash"></button></i></a>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>Sarah Wilson</td>
                                                                <td>965547956V</td>
                                                                <td>Silver</td>
                                                                <td>Thomas</td>
                                                                <td>077 890 1234</td>
                                                                <td>
                                                                    <a class="table_icons" href="member_profile.php" title="View"><button class="table_btn btn btn-out btn-primary btn-square "><i class="tb_i fa-1x fa fa-eye"></i></button></a>
                                                                    <a class="table_icons" href="#" title="Edit"><button class="table_btn btn btn-out btn-success btn-square"><i class="tb_i fa-1x fa fa-edit"></i></button></a>
                                                                    <a class="table_icons" href="#" title="Delete"><button class="table_btn btn btn-out btn-danger btn-square"><i class="tb_i fa-1x fa fa-trash"></button></i></a>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>David Wilson</td>
                                                                <td>972269846V</td>
                                                                <td>Gold</td>
                                                                <td>Johnson</td>
                                                                <td>088 012 3456</td>
                                                                <td>
                                                                    <a class="table_icons" href="member_profile.php" title="View"><button class="table_btn btn btn-out btn-primary btn-square "><i class="tb_i fa-1x fa fa-eye"></i></button></a>
                                                                    <a class="table_icons" href="#" title="Edit"><button class="table_btn btn btn-out btn-success btn-square"><i class="tb_i fa-1x fa fa-edit"></i></button></a>
                                                                    <a class="table_icons" href="#" title="Delete"><button class="table_btn btn btn-out btn-danger btn-square"><i class="tb_i fa-1x fa fa-trash"></button></i></a>
                                                                </td>
                                                            </tr>
                                                            <tr>
    <td>Robert Johnson</td>
    <td>857609265V</td>
    <td>Silver</td>
    <td>Smith</td>
    <td>077 123 4567</td>
    <td>
        <a class="table_icons" href="member_profile.php" title="View"><button class="table_btn btn btn-out btn-primary btn-square "><i class="tb_i fa-1x fa fa-eye"></i></button></a>
        <a class="table_icons" href="#" title="Edit"><button class="table_btn btn btn-out btn-success btn-square"><i class="tb_i fa-1x fa fa-edit"></i></button></a>
        <a class="table_icons" href="#" title="Delete"><button class="table_btn btn btn-out btn-danger btn-square"><i class="tb_i fa-1x fa fa-trash"></button></i></a>
    </td>
</tr>

<tr>
    <td>Lisa Anderson</td>
    <td>956284137V</td>
    <td>Gold</td>
    <td>Wilson</td>
    <td>088 234 5678</td>
    <td>
        <a class="table_icons" href="member_profile.php" title="View"><button class="table_btn btn btn-out btn-primary btn-square "><i class="tb_i fa-1x fa fa-eye"></i></button></a>
        <a class="table_icons" href="#" title="Edit"><button class="table_btn btn btn-out btn-success btn-square"><i class="tb_i fa-1x fa fa-edit"></i></button></a>
        <a class="table_icons" href="#" title="Delete"><button class="table_btn btn btn-out btn-danger btn-square"><i class="tb_i fa-1x fa fa-trash"></button></i></a>
    </td>
</tr>

<tr>
    <td>Michael Smith</td>
    <td>749305672V</td>
    <td>Platinum</td>
    <td>Davis</td>
    <td>099 345 6789</td>
    <td>
        <a class="table_icons" href="member_profile.php" title="View"><button class="table_btn btn btn-out btn-primary btn-square "><i class="tb_i fa-1x fa fa-eye"></i></button></a>
        <a class="table_icons" href="#" title="Edit"><button class="table_btn btn btn-out btn-success btn-square"><i class="tb_i fa-1x fa fa-edit"></i></button></a>
        <a class="table_icons" href="#" title="Delete"><button class="table_btn btn btn-out btn-danger btn-square"><i class="tb_i fa-1x fa fa-trash"></button></i></a>
    </td>
</tr> -->

<!-- Add more rows following the same pattern -->


                                                        <!-- </tbody>
                                                    </table> -->
                                                    

                                                    <table id="basic-btn" class="table table-striped table-bordered nowrap">
      <thead>
        <tr>
          <th>Member Name</th>
          <th>Member ID</th>
          <th>Membership</th>
          <th>Payed Amount</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Jane Smith</td>
          <td>GYM0044</td>
          <td>Gold</td>
          <td>RS 2500</td>
        </tr>
        <tr>
          <td>John Doe</td>
          <td>GYM0123</td>
          <td>Gold</td>
          <td>RS 2500</td>
        </tr>
        <tr>
          <td>Emily Johnson</td>
          <td>GYM0278</td>
          <td>Gold</td>
          <td>RS 2500</td>
        </tr>
        <tr>
          <td>Michael Brown</td>
          <td>GYM0365</td>
          <td>Gold</td>
          <td>RS 2500</td>
        </tr>
        <tr>
          <td>Sarah Wilson</td>
          <td>GYM0412</td>
          <td>Gold</td>
          <td>RS 2500</td>
        </tr>
        <tr>
          <td>David Wilson</td>
          <td>GYM0551</td>
          <td>Gold</td>
          <td>RS 2500</td>
        </tr>
        <tr>
          <td>Emma Roberts</td>
          <td>GYM0673</td>
          <td>Gold</td>
          <td>RS 2500</td>
        </tr>
        <tr>
          <td>Christopher Lee</td>
          <td>GYM0710</td>
          <td>Gold</td>
          <td>RS 2500</td>
        </tr>
        <tr>
          <td>Megan Taylor</td>
          <td>GYM0892</td>
          <td>Gold</td>
          <td>RS 2500</td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <th colspan="3">Total Payed Amount</th>
          <th id="total-amount"></th>
        </tr>
      </tfoot>
    </table>
  </div>

  <script>
    // Calculate and update total payed amount
    var payedAmounts = document.querySelectorAll("tbody td:nth-child(4)");
    var totalAmountElem = document.getElementById("total-amount");
    var totalAmount = 0;

    payedAmounts.forEach(function (amountElem) {
      var amount = parseInt(amountElem.innerText.match(/\d+/)[0]);
      totalAmount += amount;
    });

    totalAmountElem.innerText = "RS " + totalAmount;
  </script>

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

<script>
    $(document).ready(function() {
        $('#table34').DataTable({
            "searching": true,
            "lengthChange": true,

            "iDisplayLength": 10,
            //"pageLength": 40,
            "scrollX": true,
            "paging": true,
            "info": true,
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],


        })
    });
</script>

<?php
include_once "../foot.php"
?>