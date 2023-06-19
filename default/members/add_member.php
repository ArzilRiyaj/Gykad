<?php

include_once "member.php"; // include member class

$m = new member(); // create member object

if (isset($_POST["member_fname"])) {

    $m->member_fname = $_POST["member_fname"];
    $m->member_sname = $_POST["member_sname"];
    $m->member_dob = $_POST["member_dob"];
    $m->member_age = $_POST["member_age"];
    $m->member_membership = $_POST["member_membership"];
    $m->member_ptrainer = $_POST["member_ptrainer"];
    $m->member_email = $_POST["member_email"];
    $m->member_phone_number = $_POST["member_phone_number"];
    $m->member_address = $_POST["member_address"];

    $m->insert_member(); // call function to add member 
    header("Location:add_member.php?s=yes");
}




//===========================

include_once "../head.php";

// ---------------------------------------------------------------



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
                                            <!-- <h4>Add New Member</h4> -->
                                            <h4>Edit Member</h4>

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

                                            <form method="POST" action="add_member.php" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="row">

                                                            <div class="form-group col-md-6">
                                                                <label for="firstName">First Name:</label>
                                                                <input type="text" class="form-control" name="member_fname" id="firstName" placeholder="Enter  first name" required>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="lastName">Last Name:</label>
                                                                <input type="text" class="form-control" name="member_sname" id="lastName" placeholder="Enter  last name">
                                                            </div>

                                                        </div>

                                                        <div class="form-group">
                                                            <label for="dob">Date of Birth:</label>
                                                            <input type="date" class="form-control" name="member_dob" id="member_dob" onchange="calculateAge();" max="2005-12-31">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="age">Age:</label>
                                                            <input type="number" class="form-control" name="member_age" id="member_age" placeholder="Enter  age">
                                                        </div>

                                                        <div class="form-group ">
                                                            <label for="lastName">NIC NO:</label>
                                                            <input type="text" class="form-control" name="member_nic" id="member_nic" placeholder="Enter NIC NO" pattern="[0-9]{10}">
                                                            <!-- <span style="color: red;">Member with this NIC NO already registered</span> -->
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="membership">Membership:</label>
                                                            <select class="form-control" id="membership" name="member_membership">
                                                                <option value="">Select membership type</option>
                                                                <option value="basic">Basic</option>
                                                                <option value="premium">Premium</option>
                                                                <option value="pro">Pro</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="trainer">Personal Trainer:</label>
                                                            <select class="form-control" id="trainer" name="member_ptrainer">
                                                                <option value="">Select personal trainer</option>
                                                                <option value="trainer1">Trainer 1</option>
                                                                <option value="trainer2">Trainer 2</option>
                                                                <option value="trainer3">Trainer 3</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="email">Email:</label>
                                                            <input type="email" class="form-control" id="email" name="member_email" placeholder="Enter your email">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="phone">Phone Number:</label>
                                                            <input type="tel" class="form-control" id="phone" name="member_phone_number" placeholder="Enter your phone number">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="address">Address:</label>
                                                            <input type="text" class="form-control" id="address" name="member_address" placeholder="Enter your address">
                                                        </div>
                                                        

                                                        <div class="form-group">
                                                            <label for="photo">Photo</label>
                                                            <input type="file" class="form-control" id="member_photo" name="member_photo">
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
        title: "DELETED!",
        text: "Trainer Successfully Deleted",
        icon: "warning",
        button: "Ok",
      });

    
    </script>';
}
?>

<script>


    function calculateAge() {

        var m_dob = document.getElementById('member_dob');
        var m_age = document.getElementById('member_age');

        var dob = new Date(m_dob.value);
        var today = new Date();

        var age = today.getFullYear() - dob.getFullYear();
        var monthDiff = today.getMonth() - dob.getMonth();

        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
            age--;
        }

        m_age.value = age;
    }



    
    // Call the function to calculate and display the age initially
    calculateAge();


    // --

    // function test(){
    //     alert("Are You Sure You Want To Delete This Trainer")
    // }
    // test()
</script>