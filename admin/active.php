<?php
session_start();
if($_SESSION['userSession'] == '')
{
    //if session not set go back to login page
    header("Location: index.php");
}
//include dbconnect
include("dbconnect.php");
if(isset($_GET['p']))
{
    $id =$_GET['id'];
    $update = mysqli_query($con,"update `complaints_form` set status='Pending' where `id` = '$id'")or die($con->error);
  }else if(isset($_GET['u']))
  {
    $id =$_GET['id'];
    $update = mysqli_query($con,"update `complaints_form` set status='Underprocess' where `id` = '$id'")or die($con->error);
  }else if(isset($_GET['t'])){
    $id =$_GET['id'];
    $update = mysqli_query($con,"update `complaints_form` set status='ToBeAttended' where `id` = '$id'")or die($con->error);
  }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
     <!-- This page plugin CSS -->
     <link href="./css/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Title  -->
    <title>SCPWD ADMIN</title>

    <!-- Favicon  -->
    <link rel="icon" href="#">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

    <!-- Responsive CSS -->
    <link href="css/responsive.css" rel="stylesheet">
     <!--icons-->
     <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <!--script for confirmation-->
<script src="js/confirmmsg.js"></script>
<style>
    #zero_config {
max-width: 600px;
margin: 0 auto;
}
#zero_config th, td {
white-space: nowrap;
}
</style>

</head>

<body>
     <!-- style for active class -->
     <style>
  #navbarDropdown2{
     color:black;
 }
    </style>
     <!-- End style for active class -->
    <!-- Header Area Start -->
    <?php include("adminheader.php"); ?>
    <!-- Header Area End -->

    <!-- Main Content Area Start -->
    <section class="main-content-wrapper section_padding_50">
     

        <!-- Catagory Posts Area End -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- basic table -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <center><h5 class="card-title"><b>Disposed Off Grievance</b></h5></center>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                <thead>
                                    <tr>
                                    <th>Id</th>
                <th>Date</th>
                <th>Un_id</th>
                <th>Name</th>
                <th>Age</th>
                <th>Sex</th>
                <th>Permenant_address</th>
                <th>Correspondence_Address</th>
                <th>District</th>
                <th>Contact_No.</th>
                <th>Disability Type</th>
                <th>Disability Certificate No.</th>
                <th>Disability Percentage</th>
                <th>Disability Proof</th>
                <th>Issuing Authority </th>
                <th>Valid Upto</th>
                <th>W.O/S.O/D.O</th>
                <th>Complaint Description</th>
                <th>Supplementory Proof</th>
                <th>Respondent Name</th>
                <th>Respondent Address</th>
                <th>Status</th>
                <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
        $cnt =1;
$sel = mysqli_query($con,"select * from complaints_form where status='DisposedOff'");
while($fet = mysqli_fetch_assoc($sel))
{
$id = $fet['id'];
$date = $fet['date'];
$unid = $fet['unid'];
$name = $fet['name'];
$age = $fet['age'];
$sex = $fet['sex'];
$permadd = $fet['perm_address'];
$cadd = $fet['correspondence_address'];
$dist = $fet['district'];
$contact = $fet['contact_no'];
$distype = $fet['disability_type'];
$discertificate = $fet['disability_certificate_no'];
$dispercent = $fet['disability_percentage'];
$disproof = $fet['disability_proof'];
$issueautho = $fet['issuing_authority'];
$valid = $fet['valid_upto'];
$belongsto = $fet['belongsto'];
$compdesc = $fet['complaint_description'];
$supproof = $fet['supplementary_proof'];
$resname = $fet['respondent_name'];
$resaddress = $fet['respondent_address'];
$status = $fet['status'];
?>
            <tr>
                <!-- <td><?php  $id; ?></td> -->
                <td><?php echo $cnt; ?></td>
                <td><?php echo $date; ?></td>
                <td><?php echo $unid; ?></td>
                <td><?php echo $name; ?></td>
                <td><?php echo $age; ?></td>
                <td><?php echo $sex; ?></td>
                <td><?php echo $permadd; ?></td>
                <td><?php echo $cadd; ?></td>
                <td><?php echo $dist; ?></td>
                <td><?php echo $contact; ?></td>
                <td><?php echo $distype; ?></td>
                <td><?php echo $discertificate; ?></td>
                <td><?php echo $dispercent; ?></td>
                <td><a href="../dwsc_complaints/public/grivance/<?php echo $disproof; ?>" download style="color:blue"><?php echo $disproof; ?></a></td>
                <td><?php echo $issueautho; ?></td>
                <td><?php echo $valid; ?></td>
                <td><?php echo $belongsto; ?></td>
                <td><?php echo $compdesc; ?></td>
                <td><a href="../dwsc_complaints/public/grivance/<?php echo $supproof; ?>" download style="color:blue"><?php echo $supproof; ?></a></td>
                <td><?php echo $resname; ?></td>
                <td><?php echo $resaddress; ?></td>
                <td><?php echo $status; ?></td>
                <td><a href="active.php?p=pending&id=<?php echo $id;?>" class="btn btn-primary" onclick="return updateconfirm()">Pending</a>
 <a href="active.php?u=underprocess&id=<?php echo $id; ?>" class="btn btn-danger" onclick="return updateconfirm()">Under Process</a>
<a href="active.php?t=tobeattended&id=<?php echo $id;?>" class="btn btn-primary" onclick="return updateconfirm()">To Be Attended</a></td>
              
            </tr>
            <?php
            $cnt++;
}
?>
                                </tbody>
                               
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
    </section>
    



    <!-- Footer Area Start -->
   <?php include("adminfooter.php"); ?>
    <!-- Footer Area End -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!--data tables-->
    <script src="./js/jquery.dataTables.js"></script>
    <script src="./js/jquery.dataTables.min.js"></script>
    <!--Datatable-->
    <script>
        $(document).ready( function () {
        $('#zero_config').DataTable();
    } );
    </script>
    <!--file choosen css-->
    <script>
        var inputs = document.querySelectorAll('.file-input')

for (var i = 0, len = inputs.length; i < len; i++) {
  customInput(inputs[i])
}

function customInput (el) {
  const fileInput = el.querySelector('[type="file"]')
  const label = el.querySelector('[data-js-label]')
  
  fileInput.onchange =
  fileInput.onmouseout = function () {
    if (!fileInput.value) return
    
    var value = fileInput.value.replace(/^.*[\\\/]/, '')
    el.className += ' -chosen'
    label.innerText = value
  }
}
    </script>
    
</body>

</html>