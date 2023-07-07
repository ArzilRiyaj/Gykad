<?php
session_start();

include_once "../members/member.php";

$m= new member();

$m->get_all_active_members();

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
                                            <h4>Check In/Check Out Form</h4>

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
                                            <h5>Check In</h5>

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
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="memberId">Member ID</label>
                                                            <input type="text" class="form-control" id="memberId" name="memberId" placeholder="Enter member ID">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="member">Member</label>
                                                            <select class="js-example-basic-single col-sm-12 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                                                <optgroup label="Developer">
                                                                    <option value="AL">Alabama</option>
                                                                    <option value="WY">Wyoming</option>
                                                                </optgroup>
                                                                <optgroup label="Designer">
                                                                    <option value="WY">Peter</option>
                                                                    <option value="WY">Hanry Die</option>
                                                                    <option value="WY">John Doe</option>
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-3">
                                                            <label for="date">Date</label>
                                                            <input type="date" class="form-control" id="check_in_date" name="check_in_date">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="checkInTime">Check-in Time</label>
                                                            <input type="time" class="form-control" id="checkInTime" name="checkInTime">
                                                        </div>

                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                            <button type="reset" class="btn btn-secondary">Reset</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ----------------------------------------------------------------------------- -->

                        <div class="page-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Check Out</h5>

                                            <div class="card-header-right">
                                                <ul class="list-unstyled card-option">
                                                    <li><i class="feather icon-maximize full-card"></i></li>
                                                    <li><i class="feather icon-minus minimize-card"></i></li>

                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-block">
                                            <div class="container">
                                                <div class="container">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Member ID</th>
                                                                <th>Name</th>
                                                                <th>Check-in Time</th>
                                                                <th>Check-out Time</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>John Doe</td>
                                                                <td><input type="time" class="form-control" id="checkInTime1" name="checkInTime1"></td>
                                                                <td><input type="time" class="form-control" id="checkOutTime1" name="checkOutTime1"></td>
                                                                <td><button class="btn btn-primary" onclick="checkOut(1)">Check Out</button></td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>Jane Smith</td>
                                                                <td><input type="time" class="form-control" id="checkInTime2" name="checkInTime2"></td>
                                                                <td><input type="time" class="form-control" id="checkOutTime2" name="checkOutTime2"></td>
                                                                <td><button class="btn btn-primary" onclick="checkOut(2)">Check Out</button></td>
                                                            </tr>
                                                            <!-- Add more rows as needed -->
                                                        </tbody>
                                                    </table>
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


<script>

    function updateCheckInTime() {
        var currentTime = new Date();
        var hours = currentTime.getHours();
        var minutes = currentTime.getMinutes();
        var formattedTime = hours.toString().padStart(2, "0") + ":" + minutes.toString().padStart(2, "0");

        // Set the formatted time as the value of the "checkInTime" input field
        document.getElementById("checkInTime").value = formattedTime;
    }

    // Update the check-in time initially
    updateCheckInTime();

  
    setInterval(updateCheckInTime, 60000);



    // date

    
    var currentDate = new Date();

    
    var year = currentDate.getFullYear();
    var month = currentDate.getMonth() + 1; // Months are zero-based, so we add 1
    var day = currentDate.getDate();

    // Format the date as YYYY-MM-DD
    var formattedDate = year + '-' + addLeadingZero(month) + '-' + addLeadingZero(day);

    // Set the formatted date as the value of the input field
    document.getElementById('check_in_date').value = formattedDate;

    // Helper function to add leading zeros to single-digit numbers
    function addLeadingZero(number) {
        return number < 10 ? '0' + number : number;
    }
</script>