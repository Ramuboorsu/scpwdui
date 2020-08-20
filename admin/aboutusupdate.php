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
$filename = $_FILES['file']['name'];
$Activity = $_POST['Activity'];

$mainheading = $_POST['mainheading'];
$description = mysqli_real_escape_string($con,$_POST['description']);
  $target_file =  "../images/";
$videoname = $_POST['videoname'];
if($videoname != 'null')
{
if($filename == '')
{
   $sel = mysqli_query($con,"select * from aboutus where id = $id");
   $name = mysqli_fetch_assoc($sel);
   $vdo = $name['video'];
}
else
{
  $target_file = '../images/videos/aboutus/';
  $vdo = $filename;
   $fullname =  $target_file.$filename;
   move_uploaded_file($_FILES['file']['tmp_name'],$fullname);
}
}
else
{
  $vdo = 'null';
}

//echo '<script>alert("'.$id.'");</script>';
  $up = mysqli_query($con,"update aboutus set Activity='$Activity',mainheading='$mainheading',description='$description',video='$vdo' where id='$id'");
 if($up)
{
    echo '<script>alert("Successfully Update");window.location.href="adminaboutus.php";</script>';
  $msg = "successfully Updated";

}
else
{
  $msgerr = "please update and click button otherwise don't click";
}


}

if(isset($_POST['aboutus1']))
 {
//echo "1234";
  $sel = mysqli_query($con,"select * from aboutus where id=1");
while($fet = mysqli_fetch_assoc($sel))
{

$link1 = $fet['link1'];

$link2 = $fet['link2'];
$link3 = $fet['link3'];
$link4 = $fet['link4'];
$link5 = $fet['link5'];

}

 $output_dir = "docs/aboutus/";
  $target_file = $output_dir;

  $filename1 = $_FILES['file1']['name'];
  if($filename1 == '' )
  {
    $filename1 = $link1;
  }
  $filename2 = $_FILES['file2']['name'];
  if($filename2 == '' )
  {
    $filename2 = $link2;
  }
  $filename3 = $_FILES['file3']['name'];
  if($filename3 == '' )
  { 
    $filename3 =$link3;
  }
   $filename4 = $_FILES['file4']['name'];
  if($filename4 == '' )
  { 
    $filename4 =$link4;
  }
$filename5 = $_FILES['file5']['name'];
  if($filename5 == '' )
  { 
    $filename5 =$link5;
  }
 $pathfullname =  $target_file;
  // Upload file
  if(move_uploaded_file($_FILES['file1']['tmp_name'],$pathfullname.$filename1) or move_uploaded_file($_FILES['file2']['tmp_name'],$pathfullname.$filename2) or  move_uploaded_file($_FILES['file3']['tmp_name'],$pathfullname.$filename3) or move_uploaded_file($_FILES['file4']['tmp_name'],$pathfullname.$filename4) or move_uploaded_file($_FILES['file5']['tmp_name'],$pathfullname.$filename5)){
echo '<script>alert("Successfully uploaded");</script>';

           $insert_img = mysqli_query($con,"update aboutus SET link1='$filename1',link2='$filename2',link3='$filename3',link4='$filename4',link5='$filename5' where id=1");
echo '<script>alert("Successfully uploaded");window.location.href="aboutusupdate.php?id=1"</script>';
      
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
  #about{
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
$id = @$_GET['id'];
$sel = mysqli_query($con,"select * from aboutus where id =$id");
while($fet = mysqli_fetch_assoc($sel))
{
$id = $fet['id'];
$Activity = $fet['Activity'];
$mainheading = $fet['mainheading'];
$description = $fet['description'];
$videoname = $fet['video'];
  ?>
                    <form method="post" enctype="multipart/form-data">
                <div class="row">
                <div class="col-md-4">
                    <h6>Activity</h6>
                  
                        <div class="form-group">
                        <input type="hidden" placeholder="Enter id" value="<?php echo $id; ?>" name="id" readonly>
                            <input type="text" class="form-control" placeholder="Activity" value="<?php echo $Activity; ?>" 
        name="Activity">
                        </div>
                
                </div>
        
                <div class="col-md-4">  
                    <h6>Main Heading</h6>
                  
                        <div class="form-group">
                            <input type="text" class="form-control"  placeholder="Main Heading" value="<?php echo $mainheading; ?>" 
    name="mainheading">
                        </div>
                    

                </div>
                <div class="col-md-4">
                    <h6>Video Name</h6>
                  
                        <div class="form-group">
                            <input type="text" class="form-control"  name="videoname" value="<?php echo $videoname; ?>" placeholder="video">
                        </div>
                 

                </div>
                </div>
                <div class="row mt-2">
                    <div class="col-4">
                        <h6>Video</h6>
                        <div class='file-input'>
                            <input type='file' name="file" placeholder="video">
                            <span class='button'>Choose</span>
                            <span class='label' data-js-label>No file selected</label>
                          </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <h6>Description</h6>
                            <textarea class="form-control" id="description" name="description"  rows="3"><?php echo $description; ?></textarea>
                          </div>
                    </div>
                    <div class="col-3">
                        <h6 class="text-white">.</h6>
                    <button class="abt-upload-btn"  type="submit" name="Update" onClick="return updateconfirm()">Upload</button>
                    <button class="abt-cancel-btn ml-4"  formaction="adminaboutus.php" type="submit">Cancel</button>

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