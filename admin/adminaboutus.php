<?php
session_start();
if($_SESSION['userSession'] == '')
{
    //if session not set go back to login page
    header("Location: index.php");
}
//include dbconnect
include("dbconnect.php");
if(isset($_POST['submit'])){

    $name = $_POST['data'];
    $desc = $_POST['desc'];
     $output_dir = "../images/gos/";
      $target_file = $output_dir;
     $countfiles = count($_FILES['file']['name']);
     // Looping all files
      $filename = $_FILES['file']['name'];
     $fullname =  $target_file.$filename;
      // Upload file
      move_uploaded_file($_FILES['file']['tmp_name'],$fullname);
     // $RandomNum   = time();
            
                // $ImageName      = str_replace(' ','-',strtolower($_FILES['file']['name']));
                $ImageType      = $_FILES['file']['type']; /*"image/png", image/jpeg etc.*/
             
                // $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
                // $ImageExt       = str_replace('.','',$ImageExt);
                // $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", F"", $ImageName);
                $NewImageName = $filename ;
                
                
                $insert_img = mysqli_query($con,"insert into gos(name,description,doc) values('$name','$desc','$NewImageName')");
                  // $result = mysqli_array($insert_img);
                 if($insert_img)
                {
                  echo '<script>alert("Successfully Inserted");</script>';
                }
    
    } 
    if(@$_GET['step'] == 'delete')
    {
    $id = @$_GET['q'];
        $del = mysqli_query($con,"delete from gos where id = $id");
        if($del)
        {
            echo '<script>alert("Successfully Deleted");window.location.href="admingos.php";</script>';
    
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
  #about{
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
                        <center><h5 class="card-title"><b>Index Update</b></h5></center>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                <thead>
                                    <tr>
                                    <th>Activity</th>
                                    <th>Main Heading</th>
                                    <th>Description</th>
                                    <th>Video</th>
                                    <th>Action</th>
                                      
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
$sel = mysqli_query($con,"select * from aboutus where id=1");
while($fet = mysqli_fetch_assoc($sel))
{
$id = $fet['id'];
$Activity = $fet['Activity'];
$mainheading = $fet['mainheading'];
$description = $fet['description'];
$video = $fet['video'];
  ?>
            <tr>
                <!-- <td><?php  $id; ?></td> -->
                <td><?php echo $Activity; ?></td>
                <td><?php echo $mainheading; ?></td>
                <td id="td"><?php echo $description; ?></td>
                <td><?php echo $video; ?></td>
                <td><a href="aboutusupdate.php?id=<?php echo $id;?>" class="btn btn-primary">Update</a>
                  

            </tr>
            <?php
}
?>
<?php
$sel = mysqli_query($con,"select * from aboutus where id !=1");
while($fet = mysqli_fetch_assoc($sel))
{
$id = $fet['id'];
$Activity = $fet['Activity'];
$mainheading = $fet['mainheading'];
$description = $fet['description'];
$video = $fet['video'];
  ?>
            <tr>
                <!-- <td><?php  $id; ?></td> -->
                <td><?php echo $Activity; ?></td>
                <td><?php echo $mainheading; ?></td>
                <td id="td"><?php echo eval("?>".$description); ?></td>
                <td><?php echo $video; ?></td>
                <td><a href="aboutusupdate.php?id=<?php echo $id;?>" class="btn btn-primary">Update</a>
                  
                  


        <!--           <div id="confirm">
         <div class="message"><h2>Are u sure want to delete?</h2></div>
            <a href="action.php?q=delete&id=<?php echo $id; ?>"><button class="yes" style="background-color:red;">Yes</button></a>
            <a href="addUsers.php"><button class="no" style="background-color:green;">No</button></a>

         </div>
      <input type="button" class="btn btn-danger" value="Delete" onclick="functionAlert();" /> -->

                 <!-- <a href="action.php?q=delete&id=<?php echo $id; ?>" class="btn btn-danger">Delete</a></td>
               -->
            </tr>
            <?php
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