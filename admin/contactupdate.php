<?php
session_start();
if($_SESSION['userSession'] == '')
{
    //if session not set go back to login page
    header("Location: index.php");
}
//include dbconnect
include("dbconnect.php");

if(isset($_POST["Update"]))
{ 

 $id = $_POST['id'];
$heading =  mysqli_real_escape_string($con,$_POST['heading']);
$details =  mysqli_real_escape_string($con,$_POST['details']);
  $up = mysqli_query($con,"update contactus set Details='$details' where id='$id'");

 if($up)
{
    echo '<script>alert("successfully Updated");
    window.location.href="contactupdate.php";</script>';
  $msg = "successfully Updated";
}
else
{
  $msgerr = "please update and click button otherwise don't click";
}


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
<!--script for confirmation-->
<script src="js/confirmmsg.js"></script>
     <!--icons-->
     <script src='https://kit.fontawesome.com/a076d05399.js'></script>
     <!--ckeditor-->
     <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
</head>

<body>
    <div class="main-wrapper">
    <style>
  #contact{
     color:black;
 }
    </style>
    <!-- Header Area Start -->
   <?php include("adminheader.php");?>
    <!-- Header Area End -->


    <!-- Main Content Area Start -->
    <div class="container-fluid mb-70">
    <section class="main-content-wrapper section_padding_50">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><b>About us Update</b></h5>
 <?php
 //getting data from db of about us
 $sel = mysqli_query($con,"select * from contactus where id =1");
 while($fet = mysqli_fetch_assoc($sel))
 {
 $id = $fet['id'];
 $detail = $fet['Details'];
 
   ?>
                    <form method="post" enctype="multipart/form-data">
                <div class="row">
                <div class="col-md-4">
                    <h6>Heading</h6>
                  
                        <div class="form-group">
                        <input type="hidden" placeholder="Enter id" value="<?php echo $id; ?>" name="id" readonly>
                            <input type="text" class="form-control" placeholder="Enter Heading" value="Contact Details" name="heading">
                        </div>
                
                </div>
                <div class="col-4">
                        <div class="form-group">
                            <h6>Details</h6>
                            <textarea class="form-control" id="description" name="details"  rows="3"><?php echo $detail; ?></textarea>
                          </div>
                    </div>
                    <div class="col-3">
                        <h6 class="text-white">.</h6>
                    <button class="abt-upload-btn"  type="submit" name="Update" onClick="return updateconfirm()">Upload</button>
                    <button class="abt-cancel-btn ml-4"  formaction="adminhome.php" type="submit">Cancel</button>

                    </div>
                    

                </div>
               
                </div>
               
</form>
<?php
}
?>


            </div>

            </div>

    
        </div>

        <!-- Catagory Posts Area End -->
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
    <!--Datatable-->
    <script>
        $(document).ready( function () {
        $('#zero_config').DataTable();
    } );

//ckeditor
CKEDITOR.replace( 'description',{
                    removePlugins: 'elementspath',
                    
                });

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