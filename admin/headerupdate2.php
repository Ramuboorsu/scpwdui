<?php
session_start();
if($_SESSION['userSession'] == '')
{
    //if session not set go back to login page
    header("Location: index.php");
}
//include dbconnect
include("dbconnect.php");
if(isset($_POST['insert']))
 {

  $sel = mysqli_query($con,"select * from headerfooter");
while($fet = mysqli_fetch_assoc($sel))
{

$image1 = $fet['image1'];

$image2 = $fet['image2'];
$image3 = $fet['image3'];

$image4 = $fet['image4'];

$image5 = $fet['image5'];
}

  // echo $_FILES['file1']['name'];  
 $output_dir = "../images/banner/";
 $output_dir2 = "../images/";
  $target_file = $output_dir;

  $filename1 = $_FILES['file1']['name'];
  if($filename1 == '' )
  {
    $filename1 = $image1;
  }
  $filename2 = $_FILES['file2']['name'];
  if($filename2 == '' )
  {
    $filename2 = $image2;
  }
  $filename3 = $_FILES['file3']['name'];
  if($filename3 == '' )
  { 
    $filename3 =$image3;
  }
  $filename4 = $_FILES['file4']['name'];
  if($filename4 == '' )
  {
    $filename4 =$image4;
  }
  $filename5 = $_FILES['file5']['name'];
  if($filename5 == '' )
  {
    $filename5 = $image5;
  }

 $pathfullname =  $target_file;
   $pathfullname2 = $output_dir2;
  // Upload file
  if(move_uploaded_file($_FILES['file1']['tmp_name'],$pathfullname.$filename1) or move_uploaded_file($_FILES['file2']['tmp_name'],$pathfullname2.$filename2) or  move_uploaded_file($_FILES['file3']['tmp_name'],$pathfullname2.$filename3) or move_uploaded_file($_FILES['file4']['tmp_name'],$pathfullname2.$filename4) or  move_uploaded_file($_FILES['file5']['tmp_name'],$pathfullname.$filename5 )){

           $insert_img = mysqli_query($con,"update headerfooter SET image1='$filename1',image2='$filename2',image3='$filename3',image4='$filename4',image5='$filename5'");
           if( $insert_img)
           {
echo '<script>alert("Image Uploaded");</script>';
}
      
          }
           else{
            echo '<script>alert("Please Select Files and Upload");window.location.href="headerupdate2.php";</script>';
          }


           

} 

if(isset($_POST['update']))
 {
//   echo '<script>alert("text updated");</script>';
//   $text1 = mysql_real_escape_string($_POST['text1']);


// $text3 = mysql_real_escape_string($_POST['text3']);

// $text4 = mysql_real_escape_string($_POST['text4']);

// $text5 = mysql_real_escape_string($_POST['text5']);

  $text1 = mysqli_real_escape_string($con,$_POST['text1']);


$text3 =mysqli_real_escape_string($con,$_POST['text2']);

$text4 =mysqli_real_escape_string($con,$_POST['text3']);

$text5 = mysqli_real_escape_string($con,$_POST['text4']);

// echo '<script>alert("'.$text1.'");</script>';
// echo '<script>alert("'.$text3.'");</script>';
// echo '<script>alert("'.$text4.'");</script>';
// echo '<script>alert("'.$text5.'");</script>';

           $insert_txt = mysqli_query($con,"update headerfooter SET text1='$text1',text3='$text3',text4='$text4',text5='$text5'");
           if($insert_txt)
           {
echo '<script>alert("Successfully Updated");window.location.href="headerupdate2.php";</script>';
}
else
{
  echo '<script>alert("Updation Failed");window.location.href="headerupdate2.php";</script>';
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
    <!--confirm msg -->
    <script src="js/confirmmsg.js"></script>
     <!--icons-->
     <script src='https://kit.fontawesome.com/a076d05399.js'></script>

</head>

<body>
    <div class="main-wrapper">
    <!-- Header Area Start -->

        <?php include("adminheader.php"); ?>
    <!-- Header Area End -->


    <!-- Main Content Area Start -->
    <div class="container-fluid mb-70">
    <section class="main-content-wrapper section_padding_50">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><b>Add Header Images</b></h5>
                    <form method="post" enctype='multipart/form-data'>
                <div class="row">
                   
                <div class="col-4">
                    <h6>Image 1</h6>
                    <div class='file-input'>
                        <input type="file" name="file1">
                        <span class='button'>Choose</span>
                        <span class='label' data-js-label>No file selected</label>
                      </div>
                </div>
        
                <div class="col-4">
                    <h6>Image 2</h6>
                    <div class='file-input'>
                        <input type="file" name="file2">
                        <span class='button'>Choose</span>
                        <span class='label' data-js-label>No file selected</label>
                      </div>

                </div>
                <div class="col-4">
                    <h6>Image 3</h6>
                    <div class='file-input'>
                        <input type="file" name="file3">
                        <span class='button'>Choose</span>
                        <span class='label' data-js-label>No file selected</label>
                      </div>
                    
                </div>
            
                </div>
<br>
                <div class="row">
                    <div class="col-4">
                        <h6>Image 4</h6>
                        <div class='file-input'>
                            <input type="file" name="file4">
                            <span class='button'>Choose</span>
                            <span class='label' data-js-label>No file selected</label>
                          </div>
                    </div>
            
                    <div class="col-4">
                        <h6>Image 5</h6>
                        <div class='file-input'>
                            <input type="file" name="file5">
                            <span class='button'>Choose</span>
                            <span class='label' data-js-label>No file selected</label>
                          </div>
    
                    </div>
                    <div class="col-4">
                        <button type="submit" name="insert" class="btn-upload" id="headerupdate-btn" type="button">Upload</button>
                        
                    </div>
                
                    </div>

            </div>
            </form>
            </div>

    
        </div>

<br>
        <!--Header content list-->

        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><b>Header Content List</b></h5>
                    <?php
//code to get details from database
$sel = mysqli_query($con,"select * from headerfooter");
while($fet = mysqli_fetch_assoc($sel))
{
$id = $fet['id'];
$image1 = $fet['image1'];
$text1 = $fet['text1'];
$image2 = $fet['image2'];
$image3 = $fet['image3'];
$text2 = $fet['text3'];
$image4 = $fet['image4'];
$text3 = $fet['text4'];
$image5 = $fet['image5'];
$text4 = $fet['text5'];
  ?>
                    <form method="post">
                <div class="row">
                <div class="col-4">
                    <h6>Text 1</h6>
               
                        <div class="form-group">
                            <input type="text"  placeholder="Enter Text Here" value="<?php echo $text1; ?>" name="text1" class="form-control">
                        </div>
                 
                </div>
        
                <div class="col-4">
                    <h6>Text 2</h6>
                    
                  
                        <div class="form-group">
                            <input type="text"  placeholder="Enter Text Here" value="<?php echo $text2; ?>" name="text2" class="form-control">
                        </div>
                 

                </div>
           
        
                <div class="col-4">
                    <h6>Text 3</h6>
                    
                   
                        <div class="form-group">
                            <input type="text"  placeholder="Enter Text Here" value="<?php echo $text3; ?>" name="text3" class="form-control">
                        </div>
                

                </div>
           

                </div>


<br>
    <!--2nd row for images and text-->
    <div class="row">
        <div class="col-4">
            <h6>Text 4</h6>
        
                <div class="form-group">
                    <input type="text"  placeholder="Enter Text Here" value="<?php echo $text4; ?>" name="text4" class="form-control">
                </div>
        
        </div>

        <div class="col-4">
            <button type="submit" name="update" class="btn-upload"  onClick="return updateconfirm()"  id="headerupdate-btn" >Update</button>
            <button type="submit"  formaction="adminhome.php" class="btn-upload" id="headercancel-btn">Cancel</button>
        </div>

    
   
    
        </div>
        </form>
        <?php
        }
        ?>
            </div>

            </div>

    
        </div>

    </section>    

    </div>

    <!-- Footer Area Start -->
    <footer class="footer-area bg-img background-overlay">
     
        <!-- Bottom Footer Area -->
        <div class="bottom-footer-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="copywrite-text">
                            <p>
Copyright &copy;<script>document.write(new Date().getFullYear());</script>
©State Commissioner for Persons with Disabilities, Government of Telangana. All rights reserved.
</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
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