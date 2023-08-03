<?php
session_start();
if ($_SESSION["user"]["user_role"] == 2) {
  include_once "../head.php";
} else {
  header("Location:../login/logout.php");
}

include_once "member.php";
$m = new member();

if (isset($_GET["did"]))
{
	$member_id=$_GET["did"];
	$m->delete_member($member_id);
}


$data = $m->get_all_active_members();





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
                      <h4>Manage Members</h4>


                    </div>
                  </div>
                </div>
                <div class="col-lg-4">

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



                      <div class="dt-responsive table-responsive">
<?php
echo "
                        <table id='basic-btn' class='table table-striped table-bordered nowrap'>

                          <thead>
                            <tr>
                              <th>Name</th>
                              <th>Registration NO</th>
                              <th>Membership</th>
                              <th>Personal Trainer</th>
                              <th>Phone NO</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>";
                          foreach($data as $item){

                            echo " 
                            
                            <tr>
                              <td>$item->member_fname</td>
                              <td>$item->member_reg_no</td>
                              <td>$item->package_name</td>
                              <td>$item->trainer_fname</td>
                              <td>$item->member_phone_number</td>
                              <td>
                              <a class='table_icons' href='member_profile.php?m_id=$item->member_id' title='View'><button class='table_btn btn btn-out btn-primary btn-square '><i class='tb_i fa-1x fa fa-eye'></i></button></a>
                              <a class='table_icons' href='add_member.php?m_id=$item->member_id' title='Edit'><button class='table_btn btn btn-out btn-success btn-square'><i class='tb_i fa-1x fa fa-edit'></i></button></a>
                              <button onclick='delete_member($item->member_id)' class='table_btn btn btn-out btn-danger btn-square'><i class='tb_i fa-1x fa fa-trash'></button></i>
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

</div>



<!-- ------------------------------------------------------------------------------------------- -->

<script>



function delete_member(d) {
    if (confirm("Arw you sure you want to delete " + d)) {
        window.location.href = "manage_member.php?did=" + d;
    }
}

// ---------------------------------------------------------------------
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


<!-- swal({
      title: "Success!",
      text: "Member Successfully Edited",
      icon: "success",
      button: "Ok",
    }); -->