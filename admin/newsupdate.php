<?php
session_start();
if($_SESSION['userSession'] == '')
{
    //if session not set go back to login page
    header("Location: index.php");
}
//include dbconnect
include("dbconnect.php");
$uid = @$_GET['id'];
if(isset($_POST["Update"]))
{ 

 $id = $_POST['id'];
  $mainheading = $_POST['mainheading'];
$description = $_POST['description'];
$imgcontent = $_POST['imgcontent'];
$filename = $_FILES['file']['name'];

$videoname = $_POST['videoname'];
if($videoname != 'null')
{
if($filename == '')
{
   $sel = mysqli_query($con,"select * from resources_text where id = $id");
   $name = mysqli_fetch_assoc($sel);
   $vdo = $name['video'];
}
else
{
  $target_file =  "../images/videos/news/";
  $vdo = $filename;
   $fullname =  $target_file.$filename;
   move_uploaded_file($_FILES['file']['tmp_name'],$fullname);
}
}
else
{
  $vdo = 'null';
}

  $up = mysqli_query($con,"update newsEvents set mainHeading='$mainheading',description='$description',imgcontent='$imgcontent',video='$vdo' where aid='$id'");

 if($up)
{
    echo '<script>alert("successfully Updated");window.location.href="newsEvents.php";</script>';
  $msg = "successfully Updated";

}
else
{
  $msgerr = "please update and click button otherwise don't click";
}


}

if(isset($_POST['news']))
 {

  $sel = mysqli_query($con,"select * from newsEvents where aid=$uid");
while($fet = mysqli_fetch_assoc($sel))
{

$image1 = $fet['image'];

$image2 = $fet['image2'];

}

 $output_dir = "../images/news/";
  $target_file = $output_dir;

  $filename1 = $_FILES['file1']['name'];
  //echo $filename1;
  if($filename1 == '' )
  {
    $filename1 = $image1;
  }

  if($uid == 2)
  {
  $filename2 = $_FILES['file2']['name'];
  if($filename2 == '' )
  {
    $filename2 = $image2;
  }
  }
  else
  {
    $filename2 = '';
  }

 $pathfullname =  $target_file;
  // Upload file
   if($uid == 2)
  {
  if(move_uploaded_file($_FILES['file1']['tmp_name'],$pathfullname.$filename1) or move_uploaded_file($_FILES['file2']['tmp_name'],$pathfullname.$filename2)){

           $insert_img = mysqli_query($con,"update newsEvents SET image='$filename1',image2='$filename2' where aid=$uid");
           if($insert_img)
           {
echo '<script>alert("Successfully uploaded");window.location.href="newsupdate.php?id='.$uid.'"</script>';
}
      
          }
           else{
            echo '<script>alert("Please Select File and Upload");window.location.href="newsupdate.php?id='.$uid.'";</script>';
          }
           
}
else
{
   if(move_uploaded_file($_FILES['file1']['tmp_name'],$pathfullname.$filename1) ){

           $insert_img = mysqli_query($con,"update newsEvents SET image='$filename1'where aid=$uid");
           if($insert_img)
           {
echo '<script>alert("Successfully uploaded");window.location.href="newsupdate.php?id='.$uid.'"</script>';
}
      
          }
           else{
            echo '<script>alert("Please Select File and Upload");window.location.href="newsupdate.php?id='.$uid.'";</script>';
          }
           
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
<!--ckeditor-->
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
</head>

<body>
    <div class="main-wrapper">
    <!-- style for active class -->
    <style>
  #newsevents{
     color:black;
 }
    </style>
     <!-- End style for active class -->
    <!-- Header Area Start -->

        <?php include("adminheader.php"); ?>
    <!-- Header Area End -->


    <!-- Main Content Area Start -->
    <div class="container-fluid mb-70">
    <section class="main-content-wrapper section_padding_50">
        <div class="container-fluid">
        <?php if($uid != 4)
{
?>  
            <div class="card">
 
                <div class="card-body">
                    <h5 class="card-title"><b>Add News Images</b></h5>
                    <?php

$sel = mysqli_query($con,"select * from newsEvents where aid=$uid");
while($fet = mysqli_fetch_assoc($sel)){
  $id = $fet['aid'];
$image1 = $fet['image'];
$image2 = $fet['image2'];

}
?>
                    <form method="post" enctype="multipart/form-data">
                <div class="row">

                <div class="col-4">
                    <h6>Image 1</h6>
                    <div class='file-input'>
                        <input type="file"  type="file" name="file1" id="file">
                        <span class='button'>Choose</span>
                        <span class='label' data-js-label>No file selected</label>
                      </div>
                </div>
                <?php if($uid == 2)
{
?>
                <div class="col-4">
                    <h6>Image 2</h6>
                    <div class='file-input'>
                        <input type="file" name="file2">
                        <span class='button'>Choose</span>
                        <span class='label' data-js-label>No file selected</label>
                      </div>

                </div>
                <?php
}
?>
             
            
               
                    <div class="col-4">
                        <button type="submit" name='news' class="btn-upload" id="headerupdate-btn">Upload</button>
                        
                    </div>
                
                    </div>
                   
            </div>
            </form>
            </div>

    
        </div>
        <?php
}
?>
<br>
        <!--Header content list-->

        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><b>News/Events Update</b></h5>
<?php
//code to get details from database

$id = @$_GET['id'];
$sel = mysqli_query($con,"select * from newsEvents where aid =$id");
while($fet = mysqli_fetch_assoc($sel))
{
$id = $fet['aid'];
$mainheading = $fet['mainHeading'];
$description = $fet['description'];
$image = $fet['image'];
$image2 = $fet['image2'];
$imgcontent = $fet['imgcontent'];
$videoname = $fet['video'];

  ?>
                    <form method="post" enctype="multipart/form-data">
                <div class="row">
                <div class="col-4">
                    <h6>Main Heading</h6>
               
                        <div class="form-group">
                        <input type="hidden" placeholder="Enter id" value="<?php echo $id; ?>" name="id" readonly>
                            <input type="text"  id="mainheadingtext" type="text" placeholder="Enter Main Heading" value="<?php echo $mainheading; ?>" 
        name="mainheading" required class="form-control">
                        </div>
                 
                </div>
        
        
           
        
                <div class="col-4">
                    <h6>Video Name</h6>
                    
                   
                        <div class="form-group">
                            <input type="text"  id="mainheadingtext" name="videoname" value="<?php echo $videoname; ?>" placeholder="video" class="form-control">
                        </div>
                

                </div>
           
                <div class="col-4">
            <h6>Video</h6>
        
                <div class="form-group">
                    <input type="file"  type="file" placeholder="UserName" name="file" class="form-control">
                </div>
        
        </div>
                </div>


<br>
    <!--2nd row for images and text-->
    <div class="row">
      
        <div class="col-4">
                    <h6>Description</h6>
                    
                  
                        <div class="form-group">
                        <textarea class="form-control" id="description" name="description"  rows="3"><?php echo $description; ?></textarea>
                        </div>
                 

                </div>
                <div class="col-4">
                    <h6>Image Content</h6>
                    
                  
                        <div class="form-group">
                        <textarea class="form-control" id="imgcontent" name="imgcontent"  rows="3"><?php echo $imgcontent; ?></textarea>
                        </div>
                 

                </div>

        <div class="col-4">
            <button type="submit" name="Update" class="btn-upload"  onClick="return updateconfirm()"  id="headerupdate-btn" >Update</button>
            <button type="submit"  formaction="newsEvents.php" class="btn-upload" id="headercancel-btn">Cancel</button>
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

    //ckeditor
CKEDITOR.replace( 'description',{
                    removePlugins: 'elementspath',
                    
                });

                CKEDITOR.replace( 'imgcontent',{
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