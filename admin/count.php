<?php
session_start();
if($_SESSION['userSession'] == '')
{
    //if session not set go back to login page
    header("Location: index.php");
}
//include dbconnect
include("dbconnect.php");
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

</head>

<body>
    <div class="main-wrapper">
    <!-- Header Area Start -->
    <?php include("adminheader.php"); ?>
    <!-- Header Area End -->


    <!-- Main Content Area Start -->
    <div class="container-fluid">
    <section class="main-content-wrapper section_padding_50">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><b>Total No. of Complaints</b></h5>
                <div class="row">
                <div class="col-3">
                    <h6>Received</h6>
                    <?php
include "dbconnect.php";
$selpending = mysqli_query($con,"select count(status) as pending from complaints_form where status='Pending'")or die($con->error);
while($row = mysqli_fetch_assoc($selpending)){
 ?>
                    <a href="pending.php"><div class="count"><?php echo $row['pending']; ?></div></a>
                    <?php
  }
  ?>
                </div>
        
                <div class="col-3">
                    <h6>Disposed Off</h6>
                    <?php
                    $selactive = mysqli_query($con,"select count(status) as active from complaints_form where status='DisposedOff'")or die($con->error);
                    while($row = mysqli_fetch_assoc($selactive)){
                     ?>
                     <a href="active.php"><div class="count"><?php echo $row['active']; ?></div></a>
<?php
                    }
?>

                </div>
                <div class="col-3">
                    <h6>Under Process</h6>
                    <?php
                    $selunder = mysqli_query($con,"select count(status) as underprocess from complaints_form where status='Underprocess'")or die($con->error);
while($row = mysqli_fetch_assoc($selunder)){
 ?>
                     <a href="underprocess.php"><div class="count"><?php echo $row['underprocess']; ?></div></a>
<?php
}
?>
                    
                </div>

                <div class="col-3">
                    <h6>To Be Attended</h6>
                    <?php
                    $seltobe = mysqli_query($con,"select count(status) as tobeattented from complaints_form where status='ToBeAttended'")or die($con->error);
while($row = mysqli_fetch_assoc($seltobe)){
 ?>
                     <a href="tobeattended.php"><div class="count"><?php echo $row['tobeattented']; ?></div></a>
<?php
}
?>
                    
                </div>
            
                </div>

            </div>

            </div>

    
        </div>


    </section>    

    </div>

    <!-- Footer Area Start -->
   <?php include("adminfooter.php");?>
    </div>
    <!--page wrapper-->
</div>
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