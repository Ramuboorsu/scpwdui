<?php
include("dbconnect.php");
?>
<header class="header-area">
        <div class="top-header">
            <div class="container">
            <h5 class="breaking-news-title">ADMIN PAGE</h5>
            <a id="logout-text">Logout</a>   
            </div>
        </div>
        <!-- Middle Header Area -->
        <?php
        //Getting Data From DB dynamically
        $selheader = mysqli_query($con,"select * from headerfooter") ;
while($img=mysqli_fetch_assoc($selheader)){
  $id = $img['id'];
  $img1 = $img['image1'];
  $text1 = $img['text1'];
  $img2 = $img['image2'];
  $img3 = $img['image3'];
  $text3 = $img['text3'];
  $img4 = $img['image4'];
  $text4 = $img['text4'];
  $img5 = $img['image5'];
  $text5 = $img['text5'];
?>

        <div class="middle-header">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <!-- Logo Area -->
                    <div class="col-12 col-md-3 text-center">
                        <div class="logo-area">
                            <a><img src="img/banner-img/<?php echo $img1;?>" class="kcrimg" alt="kcr" height="150px"></a>
                            <h6 style="width:230px;"> <b><?php echo $text1;?></b></h6>
                           
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="header-advert-area">
                            <div class="row h-100 align-items-center">
                                <div class="col-12 col-md-4">
                                   <img src="img/banner-img/<?php echo $img2;?>" height="80px">
                                </div>
                                <div class="col-12 col-md-4">
                                    <img src="img/banner-img/<?php echo $img3;?>" height="80px">
                                 </div>
                                 <div class="col-12 col-md-4">
                                    <img src="img/banner-img/<?php echo $img4;?>" height="80px">
                                 </div>

                            </div>
                            <div class="emblem-text text-center">
                            <?php echo $text3;?>
                            </div>
                            <div class="emblem-text2 text-center">
                               <b><?php echo $text4;?></b> 
                            </div>
                        </div>
                    </div>
                    <!-- Header Advert Area -->
                    <div class="col-12 col-md-3 text-center">
                        <div class="logo-area">
                            <a href="#"><img src="img/banner-img/<?php echo $img5;?>" class="minister" alt="minister" height="150px"></a>
                            <div class="content">
                                
                           <h6 > <b><?php echo $text5;?>
                            </b></h6> 

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
          }
         ?>
        <!-- Bottom Header Area -->
        <div class="bottom-header">
            <div class="container-fluid h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="main-menu">
                            <nav class="navbar navbar-expand-lg">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#gazetteMenu"
                                 aria-controls="gazetteMenu" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i> Menu</button>
                                <div class="collapse navbar-collapse" id="gazetteMenu">
                                    <ul class="navbar-nav mr-auto">
                                        <li class="nav-item">
                                            <a class="nav-link" href="adminhome.php" id="home">Home <span class="sr-only">(current)</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="adminbanner.php" id="banner">Banner</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1"
                                             role="button" 
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >Circular
                                        </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="adminnotices.php" id="notices">Notices/Letters</a>
                                                <a class="dropdown-item" href="adminshowcause.php" id="showcause">Show-Cause Notices</a>
                                                <a class="dropdown-item" href="adminsummons.php" id="summons">Summons</a>
                                               
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="adminorders.php" id="orders">Orders of State Commissioner</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="admingos.php" id="gos">Go's</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="adminindex.php" id="index">Update Index</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="headerupdate2.php" id="header">Update Header</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="adminaboutus.php" id="about">About Us</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="adminacts2.php" id="acts">Acts/Guidelines/Rules</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="adminresources.php" id="resources">Resources</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="newsEvents.php" id="newsevents">News/Events</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="admingallery.php" id="gallery">Gallery</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" 
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Grievance</a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="#">Count</a>
                                                <a class="dropdown-item" href="#">Notice Count</a>
                                                <a class="dropdown-item" href="#">Insert Grievance</a>
                                               
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="adminRedirectlinks.php" id="links">Redirect Links</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Contact Us</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Who's Who</a>
                                        </li>
                                    </ul>
                                 
                                 
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>