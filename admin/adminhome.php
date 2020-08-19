<?php
//Session check 
session_start();
if($_SESSION['userSession'] == '')
{
    //if session not set go back to login page
    header("Location: index.php");
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

    <!-- Title  -->
    <title>SCPWD ADMIN</title>

    <!-- Favicon  -->
    <link rel="icon" href="#">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

    <!-- Responsive CSS -->
    <link href="css/responsive.css" rel="stylesheet">

</head>

<body>
     <!-- style for active class -->
<style>
  #home{
     color:black;
 }
    </style>
     <!-- End style for active class -->
    <!-- Header Area Start -->
   <?php include("adminheader.php"); ?>
    <!-- Header Area End -->

    <!-- Welcome Blog Slide Area Start -->
    
    <!-- Welcome Blog Slide Area End -->

    <!-- Latest News Marquee Area Start -->
 
    <!-- Latest News Marquee Area End -->

    <!-- Main Content Area Start -->
    <section class="main-content-wrapper section_padding_100">

        <!-- Main Content Area End -->
<center><h4>Comming Soon..</h4></center>
        <!-- Catagory Posts Area Start -->
        <!-- <div class="gazette-catagory-posts-area">
            <div class="container">
                <div class="row">
                   
                    <div class="col-12 col-md-4">
                        <div class="row">
                    
                     
                            <div class="col-12 col-md-6"> -->
                                <!-- Single Catagory Post -->
                                <!-- <div class="gazette-single-catagory-post">
                                   <center>
                                    <h5><a href="#" class="font-pt">Coming Soon</a></h5>
                                   </center>
                                </div>
                            </div>
                        </div>
                    </div>
            
                </div>
            </div>
        </div> -->
    </section>
    <!-- Catagory Posts Area End -->



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
    <!-- Active js -->
    <script src="js/active.js"></script>

</body>

</html>