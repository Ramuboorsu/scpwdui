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
  #resources{
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
                                    <th>Heading</th>
                                    <th>Description</th>
                                    <th>Video</th>
                                    <th>Action</th>
                                      
                                    </tr>
                                </thead>
                                <tbody>
                                <tbody>
        <?php
$sel = mysqli_query($con,"select * from resources_text ");
while($fet = mysqli_fetch_assoc($sel))
{
$id = $fet['id'];
$heading = $fet['heading'];
$description = $fet['description'];
$video = $fet['video'];
?>
            <tr>
                <td><?php echo $heading; ?></td>
                <td><?php echo $description; ?>
                
</div>
                </td>
                <td><?php echo $video; ?></td>
                <td><a href="resourcesupdate.php?id=<?php echo $id;?>" class="btn" id="updatebtn"><i class='far'>&#xf044;</i></a>
                  
                  


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
            <tr>
              <td><h3>Total</h3></td>
                <td>
                  <table cellspacing=0 border=1 class="survey_table">
          <tr class="headings">
            <td style=min-width:50px>Sl.No</td>
            <td style=min-width:50px>Disability</td>
            <td style=min-width:50px>Men</td>
            <td style=min-width:50px>Women</td>
            <td style=min-width:50px>Total</td>
          </tr>
          <?php
              $data = mysqli_query($con,"select * from resources_data");
              while($info = mysqli_fetch_assoc($data)){
                $sl = $info['sid'];
                $disability = $info['Disability'];
                $men = $info['Men'];
                $women = $info['Women'];
                $total = $info['Total'];
              ?>
          <tr>
            <td style=min-width:50px><?php echo $sl; ?></td>
            <td style=min-width:50px><?php echo $disability; ?></td>
            <td style=min-width:50px><?php echo $men; ?></td>
            <td style=min-width:50px><?php echo $women; ?></td>
            <td style=min-width:50px><?php echo $total; ?></td>
          </tr>
          <?php
}
$tot = mysqli_query($con,"select SUM(Men) as men,SUM(Women) as women,SUM(Total) as total from resources_data");
while($row = mysqli_fetch_assoc($tot)){
?>
          <tr>
            <td style="min-width:50px" colspan="2">Total</td>
            <td style=min-width:50px><?php echo $row['men']; ?></td>
            <td style=min-width:50px><?php echo $row['women']; ?></td>
            <td style=min-width:50px><?php echo $row['total']; ?></td>
          </tr>

          <?php
        }
        ?>
        </table>         
         </td>
         <td></td>
          <td><a href="dataupdate.php?id=<?php echo $id;?>"class="btn" id="updatebtn"><i class='far'>&#xf044;</i></a></td>
                  
              
                

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