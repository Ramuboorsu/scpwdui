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
    <!--script for confirmation-->
<script src="js/confirmmsg.js"></script>

</head>

<body>
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
                        <center><h5 class="card-title"><b>RESOURCES</b></h5></center>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                <thead>
                                    <tr>
                                    <th>Main Heading</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Image2</th>
                                    <th>Content</th>
                                    <th>Video</th>
                                    <th>Action</th>
                                      
                                    </tr>
                                </thead>
                                <tbody>
                                <tbody>
                                <?php
$sel = mysqli_query($con,"select * from newsEvents ");
while($fet = mysqli_fetch_assoc($sel))
{
$id = $fet['aid'];
$mainheading = $fet['mainHeading'];
$description = $fet['description'];
$image = $fet['image'];
$image2 = $fet['image2'];
$imagecontent = $fet['imgcontent'];
$video = $fet['video'];
  ?>
            <tr>
                <!-- <td><?php  $id; ?></td> -->
                <td><?php echo $mainheading; ?></td>
                <td><?php echo $description; ?></td>
                 <td><?php echo $image; ?></td>
                  <td><?php echo $image2; ?></td>
                   <td><?php echo $imagecontent; ?></td>
                    <td><?php echo $video; ?></td>
                <td><a href="newsupdate.php?id=<?php echo $id;?>" class="btn btn-primary">Update</a>
                    
                  


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
        <!-- <tfoot>
                               
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

    //script for disable links
var all_links = document.querySelectorAll("#td a");

for(var i=0; i<all_links.length; i++){
    all_links[i].removeAttribute("href");
}
    </script>
   
    <!--file choosen css-->

    
</body>

</html>