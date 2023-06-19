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
                                                            <input type="text" class="form-control" id="member" name="member" placeholder="Enter member name">
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-3">
                                                            <label for="date">Date</label>
                                                            <input type="date" class="form-control" id="date" name="date">
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
    // Function to update the check-in time field with the current time
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

    // Update the check-in time every minute
    setInterval(updateCheckInTime, 60000);
</script>