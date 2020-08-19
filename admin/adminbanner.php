<?php
//Session check 
session_start();
if($_SESSION['userSession'] == '')
{
    //if session not set go back to login page
    header("Location: index.php");
}
//include dbconnect
include("dbconnect.php");
//image upload code
if(isset($_POST['submit']))
{
  $output_dir = "../images/banner/";
 $filename = $_FILES['file']['name'];
 $fullname = $output_dir.$filename;
 if(move_uploaded_file($_FILES['file']['tmp_name'],$fullname))
 {
$insert_img = mysqli_query($con,"insert into `adds` SET `image_name`='".$filename."',`image_path`='".$fullname."'")or die($con->error);
if($insert_img)
{
  echo '<script>alert("Successfully Uploaded");</script>';
 }
}
}

if(isset($_POST['delete'])){
    $id = $_POST['id'];
        $del = mysqli_query($con,"delete from adds where id = $id");
        if($del)
        {
            echo '<script>alert("Successfully Deleted");window.location.href="adminbanner.php";</script>';
    
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
     <!--icons-->
     <script src='https://kit.fontawesome.com/a076d05399.js'></script>
     <!--script for confirmation-->
    <script src="js/confirmmsg.js"></script>
</head>

<body>
    <!-- style for active class -->
    <style>
  #banner{
     color:black;
 }
    </style>
     <!-- End style for active class -->
    <!-- Header Area Start -->
    <?php include("adminheader.php"); ?>
    <!-- Header Area End -->


    <!-- Main Content Area Start -->
    <section class="main-content-wrapper section_padding_50">
        <div class="container-fluid">
            <h5><b>Add Banner</b></h5>
            <form method="post" enctype='multipart/form-data'>
            <div class="row">
            <!-- <form method="post"> -->
                <div class="column">
                   
                    <div class='file-input'>
                        <input type="file" name="file" required>
                        <span class='button'>Choose</span>
                        <span class='label' data-js-label>No file selected</label>
                      </div>
                </div>
                <div class="column">
                    
                    <!-- <button id="upload-btn" type="button">Upload</button> -->
                    <input type="submit" id="upload-btn" name="submit" value="Upload">

                </div>
<!-- </form> -->
           <!--    <div class="col-sm-12 col-md-6 col-lg-4">
                   
                            <h5 class="card-title"><b>Add Banner Image</b></h5>
                            <form class="mt-4">
                                <div class="form-group input-group">
                                    <div class='file-input'>
                                        <input type='file'>
                                        <span class='button'>Choose</span>
                                        <span class='label' data-js-label>No file selected</label>
                                      </div>
                                    <div class="input-group-append ">
                                        <button class="btn text-white" style="background-color: #EC8D22;" type="button">Upload</button>
                                    </div>
                                </div>
                            </form>
                      
                </div>-->
            </div>
        </div>
</form>
<br>
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
                        <h5 class="card-title"><b>Banner List</b></h5>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Image Name</th>
                                        <th>Image Path</th>
                                        <th>Action</th>
                                      
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
$sel = mysqli_query($con,"select * from adds");
$cnt =1;
while($fet = mysqli_fetch_assoc($sel))
{
$id = $fet['id'];
$imgname = $fet['image_name'];
$imgpath = $fet['image_path'];
?>
            <tr>
                <td><?php echo $cnt; ?></td>
                <td><?php echo $imgname; ?></td>
                <td><?php echo $imgpath; ?></td>

                <td>
                  <form method="post">
                  <input type="hidden" name="id" value="<?php echo $id; ?>">
                  <button type="submit" class="btn btn-danger" name="delete" onclick="return deleteconfirm();"><i class='far'>&#xf2ed;</i></button>
                  </form>
                  <!-- <a href="galleryaction.php?id=<?php echo $id;?>" class="btn btn-primary"name="update">Update</a> -->
                 
               </td>
              
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
    <?php include("adminfooter.php");?>
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