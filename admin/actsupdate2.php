<?php
session_start();
if($_SESSION['userSession'] == '')
{
    //if session not set go back to login page
    header("Location: index.php");
}
//include dbconnect
include("dbconnect.php");
$urlid = @$_GET['id'];


//Text update
if (isset($_POST["Update"])) {

  $id = $_POST['id'];
  $filename = $_FILES['file']['name'];
  $Activity = $_POST['Activity'];
  $videoname = $_POST['videoname'];
  $mainheading = $_POST['mainheading'];
  $description = mysqli_real_escape_string($con, $_POST['description']);


  if ($videoname != 'null') {
    if ($filename == '') {
      $sel = mysqli_query($con, "select * from act where id = $id");
      $name = mysqli_fetch_assoc($sel);
      $vdo = $name['video'];
    } else {
      $target_file =  "../images/videos/acts/";
      $vdo = $filename;
      $fullname =  $target_file . $filename;
      move_uploaded_file($_FILES['file']['tmp_name'], $fullname);
    }
  } else {
    $vdo = 'null';
  }

  $up = mysqli_query($con, "update act set Activity='$Activity',heading='$mainheading',description='$description',video='$vdo' where id='$id'");
  if ($up) {
    echo '<script>alert("Successfully Update");window.location.href="adminacts2.php";</script>';
    $msg = "successfully Updated";
  } else {
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
  <!--confirm msg-->
  <script src='js/confirmmsg.js'></script>
     <!--icons-->
     <script src='https://kit.fontawesome.com/a076d05399.js'></script>

</head>

<body>
    <div class="main-wrapper">
        <!-- style for active class -->
     <style>
  #acts{
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
                    <h5 class="card-title"><b>Upload Images</b></h5>

                    <?php
            if ($urlid == 1) {
              $sel = mysqli_query($con, "select * from act where id=1");
              while ($fet = mysqli_fetch_assoc($sel)) {
                $id = $fet['id'];
                $link1 = $fet['link1'];
                $link2 = $fet['link2'];
                $link3 = $fet['link3'];
                $link4 = $fet['link4'];
                $link5 = $fet['link5'];
                $link6 = $fet['link6'];
            ?>
                    <form method="post"  action="actsdocsupdate.php" enctype="multipart/form-data">
                <div class="row mt-4">
                <div class="col-4">
                    <h6>Link 1</h6>
                    <div class='file-input'>
                        <input type='file' type="file" name="file1" id="file1" value="<?php echo $link1; ?>">
                        <span class='button'>Choose</span>
                        <span class='label' data-js-label>No file selected</label>
                        
                      </div>
                      <br><br>
        <?php echo $link1; ?>
        <hr>
                </div>
        
                <div class="col-4">
                    <h6>Link 2</h6>
                    <div class='file-input'>
                        <input type='file' type="file" name="file2" id="file" 
        value="<?php echo $link2; ?>" >
                        <span class='button'>Choose</span>
                        <span class='label' data-js-label>No file selected</label>
                      </div>
                      <br><br>
        <?php echo $link2; ?>
        <hr>
                </div>
                <div class="col-4">
                    <h6>Link 3</h6>
                    <div class='file-input'>
                        <input type='file' type="file" name="file3" id="file" 
        value="<?php echo $link3; ?>" >
                        <span class='button'>Choose</span>
                        <span class='label' data-js-label>No file selected</label>
                      </div>
                      <br><br>
        <?php echo $link3; ?>
        <hr>
                </div>
               
                </div>

                <div class="row mt-4">
                    <div class="col-4">
                        <h6>Link 4</h6>
                        <div class='file-input'>
                            <input type='file' type="file" name="file4" id="file" 
        value="<?php echo $link4; ?>" >
                            <span class='button'>Choose</span>
                            <span class='label' data-js-label>No file selected</label>
                          </div>
                          <br><br>
        <?php echo $link4; ?>
        <hr>
                    </div>
            
                    <div class="col-4">
                        <h6>Link 5</h6>
                        <div class='file-input'>
                            <input type='file' type="file" name="file5" id="file" 
        value="<?php echo $link5; ?>" >
                            <span class='button'>Choose</span>
                            <span class='label' data-js-label>No file selected</label>
                          </div>
                          <br><br>
        <?php echo $link5; ?>
        <hr>
                    </div>
                    <div class="col-4">
                        <h6>Link 6</h6>
                        <div class='file-input'>
                            <input type='file' type="file" name="file6" id="file" 
        value="<?php echo $link6; ?>" >
                            <span class='button'>Choose</span>
                            <span class='label' data-js-label>No file selected</label>
                          </div>
                          <br><br>
        <?php echo $link6; ?>
        <hr>
                    </div>
                    
                    </div>
                  
                            <div class="col-3">
                                <h6 class="text-white">.</h6>
                            <button class="abt-upload-btn" name='act1' type="submit">Upload</button>
        
                            </div>
                       
</form>
<?php
}
            }

            //for id=2

if ($urlid == 2) {
    $sel = mysqli_query($con,"select * from act where id=2");
    while($fet = mysqli_fetch_assoc($sel))
    {
    $id = $fet['id'];
    $link1 = $fet['link1'];
    $link2 = $fet['link2'];
    $link3 = $fet['link3'];
    
    $link4 = $fet['link4'];
    $link5 = $fet['link5'];
    $link6 = $fet['link6'];
    
    $link7 = $fet['link7'];
    $link8 = $fet['link8'];
    $link9 = $fet['link9'];
    
    
            ?>
                    <form method="post"  action="actsdocsupdate.php" enctype="multipart/form-data">
                <div class="row mt-4">
                <div class="col-4">
                    <h6>Link 1</h6>
                    <div class='file-input'>
                        <input type='file' type="file" name="file1" id="file1" value="<?php echo $link1; ?>">
                        <span class='button'>Choose</span>
                        <span class='label' data-js-label>No file selected</label>
                        
                      </div>
                      <br><br>
        <?php echo $link1; ?>
        <hr>
                </div>
        
                <div class="col-4">
                    <h6>Link 2</h6>
                    <div class='file-input'>
                        <input type='file' type="file" name="file2" id="file" 
        value="<?php echo $link2; ?>" >
                        <span class='button'>Choose</span>
                        <span class='label' data-js-label>No file selected</label>
                      </div>
                      <br><br>
        <?php echo $link2; ?>
        <hr>
                </div>
                <div class="col-4">
                    <h6>Link 3</h6>
                    <div class='file-input'>
                        <input type='file' type="file" name="file3" id="file" 
        value="<?php echo $link3; ?>" >
                        <span class='button'>Choose</span>
                        <span class='label' data-js-label>No file selected</label>
                      </div>
                      <br><br>
        <?php echo $link3; ?>
        <hr>
                </div>
               
                </div>

                <div class="row mt-4">
                    <div class="col-4">
                        <h6>Link 4</h6>
                        <div class='file-input'>
                            <input type='file' type="file" name="file4" id="file" 
        value="<?php echo $link4; ?>" >
                            <span class='button'>Choose</span>
                            <span class='label' data-js-label>No file selected</label>
                          </div>
                          <br><br>
        <?php echo $link4; ?>
        <hr>
                    </div>
            
                    <div class="col-4">
                        <h6>Link 5</h6>
                        <div class='file-input'>
                            <input type='file' type="file" name="file5" id="file" 
        value="<?php echo $link5; ?>" >
                            <span class='button'>Choose</span>
                            <span class='label' data-js-label>No file selected</label>
                          </div>
                          <br><br>
        <?php echo $link5; ?>
        <hr>
                    </div>
                    <div class="col-4">
                        <h6>Link 6</h6>
                        <div class='file-input'>
                            <input type='file' type="file" name="file6" id="file" 
        value="<?php echo $link6; ?>" >
                            <span class='button'>Choose</span>
                            <span class='label' data-js-label>No file selected</label>
                          </div>
                          <br><br>
        <?php echo $link6; ?>
        <hr>
                    </div>
                    
                    </div>
                    <div class="row mt-4">
                        <div class="col-4">
                            <h6>Link 7</h6>
                            <div class='file-input'>
                                <input type='file' name="file7" id="file" 
        value="<?php echo $link7; ?>" >
                                <span class='button'>Choose</span>
                                <span class='label' data-js-label>No file selected</label>
                              </div>
                              <br><br>
        <?php echo $link7; ?>
        <hr>
                        </div>
                
                        <div class="col-4">
                            <h6>Link 8</h6>
                            <div class='file-input'>
                                <input type='file' name="file8" id="file" 
        value="<?php echo $link8; ?>" >
                                <span class='button'>Choose</span>
                                <span class='label' data-js-label>No file selected</label>
                              </div>
                              <br><br>
        <?php echo $link8; ?>
        <hr>
                        </div>
                        <div class="col-4">
                            <h6>Link 9</h6>
                            <div class='file-input'>
                                <input type='file' name="file9" id="file" 
        value="<?php echo $link9; ?>" >
                                <span class='button'>Choose</span>
                                <span class='label' data-js-label>No file selected</label>
                              </div>
                              <br><br>
        <?php echo $link9; ?>
        <hr>
                        </div>
                    
                        </div>
                        <div class="row mt-4">
                           
                  
                            <div class="col-3">
                                <h6 class="text-white">.</h6>
                            <button class="abt-upload-btn" name='act2' type="submit">Upload</button>
        
                            </div>
                       
</form>
<?php
}
            }

            //for id = 3
            if ($urlid == 3) {
                $sel = mysqli_query($con,"select * from act where id=3");
                while($fet = mysqli_fetch_assoc($sel))
                {
                $id = $fet['id'];
                $link1 = $fet['link1'];
                $link2 = $fet['link2'];
                $link3 = $fet['link3'];
                
                $link4 = $fet['link4'];
                $link5 = $fet['link5'];
                $link6 = $fet['link6'];
                
                $link7 = $fet['link7'];
                $link8 = $fet['link8'];
                $link9 = $fet['link9'];
                $link10 = $fet['link10'];
                
              ?>
                     <form method="post"  action="actsdocsupdate.php" enctype="multipart/form-data">
                <div class="row mt-4">
                <div class="col-4">
                    <h6>Link 1</h6>
                    <div class='file-input'>
                        <input type='file' type="file" name="file1" id="file1" value="<?php echo $link1; ?>">
                        <span class='button'>Choose</span>
                        <span class='label' data-js-label>No file selected</label>
                        
                      </div>
                      <br><br>
        <?php echo $link1; ?>
        <hr>
                </div>
        
                <div class="col-4">
                    <h6>Link 2</h6>
                    <div class='file-input'>
                        <input type='file' type="file" name="file2" id="file" 
        value="<?php echo $link2; ?>" >
                        <span class='button'>Choose</span>
                        <span class='label' data-js-label>No file selected</label>
                      </div>
                      <br><br>
        <?php echo $link2; ?>
        <hr>
                </div>
                <div class="col-4">
                    <h6>Link 3</h6>
                    <div class='file-input'>
                        <input type='file' type="file" name="file3" id="file" 
        value="<?php echo $link3; ?>" >
                        <span class='button'>Choose</span>
                        <span class='label' data-js-label>No file selected</label>
                      </div>
                      <br><br>
        <?php echo $link3; ?>
        <hr>
                </div>
               
                </div>

                <div class="row mt-4">
                    <div class="col-4">
                        <h6>Link 4</h6>
                        <div class='file-input'>
                            <input type='file' type="file" name="file4" id="file" 
        value="<?php echo $link4; ?>" >
                            <span class='button'>Choose</span>
                            <span class='label' data-js-label>No file selected</label>
                          </div>
                          <br><br>
        <?php echo $link4; ?>
        <hr>
                    </div>
            
                    <div class="col-4">
                        <h6>Link 5</h6>
                        <div class='file-input'>
                            <input type='file' type="file" name="file5" id="file" 
        value="<?php echo $link5; ?>" >
                            <span class='button'>Choose</span>
                            <span class='label' data-js-label>No file selected</label>
                          </div>
                          <br><br>
        <?php echo $link5; ?>
        <hr>
                    </div>
                    <div class="col-4">
                        <h6>Link 6</h6>
                        <div class='file-input'>
                            <input type='file' type="file" name="file6" id="file" 
        value="<?php echo $link6; ?>" >
                            <span class='button'>Choose</span>
                            <span class='label' data-js-label>No file selected</label>
                          </div>
                          <br><br>
        <?php echo $link6; ?>
        <hr>
                    </div>
                    
                    </div>
                    <div class="row mt-4">
                        <div class="col-4">
                            <h6>Link 7</h6>
                            <div class='file-input'>
                                <input type='file' name="file7" id="file" 
        value="<?php echo $link7; ?>" >
                                <span class='button'>Choose</span>
                                <span class='label' data-js-label>No file selected</label>
                              </div>
                              <br><br>
        <?php echo $link7; ?>
        <hr>
                        </div>
                
                        <div class="col-4">
                            <h6>Link 8</h6>
                            <div class='file-input'>
                                <input type='file' name="file8" id="file" 
        value="<?php echo $link8; ?>" >
                                <span class='button'>Choose</span>
                                <span class='label' data-js-label>No file selected</label>
                              </div>
                              <br><br>
        <?php echo $link8; ?>
        <hr>
                        </div>
                        <div class="col-4">
                            <h6>Link 9</h6>
                            <div class='file-input'>
                                <input type='file' name="file9" id="file" 
        value="<?php echo $link9; ?>" >
                                <span class='button'>Choose</span>
                                <span class='label' data-js-label>No file selected</label>
                              </div>
                              <br><br>
        <?php echo $link9; ?>
        <hr>
                        </div>
                    
                        </div>
                        <div class="row mt-4">
                            <div class="col-4">
                                <h6>Link 10</h6>
                                <div class='file-input'>
                                    <input type='file' name="file10" id="file" 
        value="<?php echo $link10; ?>" >
                                    <span class='button'>Choose</span>
                                    <span class='label' data-js-label>No file selected</label>
                                  </div>
                                  <br><br>
        <?php echo $link10; ?>
        <hr>
                            </div>
                  
                            <div class="col-3">
                                <h6 class="text-white">.</h6>
                            <button class="abt-upload-btn" name='act3' type="submit">Upload</button>
        
                            </div>
                       
</form>
<?php
}
              }
              //for 4
              if ($urlid == 4) {
                $sel = mysqli_query($con,"select * from act where id=4");
                while($fet = mysqli_fetch_assoc($sel))
                {
                $id = $fet['id'];
                $link1 = $fet['link1'];
                $link2 = $fet['link2'];
                $link3 = $fet['link3'];
              ?>
                      <form method="post"  action="actsdocsupdate.php" enctype="multipart/form-data">
                  <div class="row mt-4">
                  <div class="col-4">
                      <h6>Link 1</h6>
                      <div class='file-input'>
                          <input type='file' type="file" name="file1" id="file1" value="<?php echo $link1; ?>">
                          <span class='button'>Choose</span>
                          <span class='label' data-js-label>No file selected</label>
                          
                        </div>
                        <br><br>
          <?php echo $link1; ?>
          <hr>
                  </div>
          
                  <div class="col-4">
                      <h6>Link 2</h6>
                      <div class='file-input'>
                          <input type='file' type="file" name="file2" id="file" 
          value="<?php echo $link2; ?>" >
                          <span class='button'>Choose</span>
                          <span class='label' data-js-label>No file selected</label>
                        </div>
                        <br><br>
          <?php echo $link2; ?>
          <hr>
                  </div>
                  <div class="col-4">
                      <h6>Link 3</h6>
                      <div class='file-input'>
                          <input type='file' type="file" name="file3" id="file" 
          value="<?php echo $link3; ?>" >
                          <span class='button'>Choose</span>
                          <span class='label' data-js-label>No file selected</label>
                        </div>
                        <br><br>
          <?php echo $link3; ?>
          <hr>
                  </div>
                 
                  </div>
  
                 
                    
                              <div class="col-3">
                                  <h6 class="text-white">.</h6>
                              <button class="abt-upload-btn" name='act4' type="submit">Upload</button>
          
                              </div>
                         
  </form>
  <?php
  }
              }
              //for 5
              if ($urlid == 5) {
               $sel = mysqli_query($con,"select * from act where id=5");
                while($fet = mysqli_fetch_assoc($sel))
                {
                $id = $fet['id'];
                $link1 = $fet['link1'];
                $link2 = $fet['link2'];
                $link3 = $fet['link3'];
              ?>
                      <form method="post"  action="actsdocsupdate.php" enctype="multipart/form-data">
                  <div class="row mt-4">
                  <div class="col-4">
                      <h6>Link 1</h6>
                      <div class='file-input'>
                          <input type='file' type="file" name="file1" id="file1" value="<?php echo $link1; ?>">
                          <span class='button'>Choose</span>
                          <span class='label' data-js-label>No file selected</label>
                          
                        </div>
                        <br><br>
          <?php echo $link1; ?>
          <hr>
                  </div>
          
                  <div class="col-4">
                      <h6>Link 2</h6>
                      <div class='file-input'>
                          <input type='file' type="file" name="file2" id="file" 
          value="<?php echo $link2; ?>" >
                          <span class='button'>Choose</span>
                          <span class='label' data-js-label>No file selected</label>
                        </div>
                        <br><br>
          <?php echo $link2; ?>
          <hr>
                  </div>
                  <div class="col-4">
                      <h6>Link 3</h6>
                      <div class='file-input'>
                          <input type='file' type="file" name="file3" id="file" 
          value="<?php echo $link3; ?>" >
                          <span class='button'>Choose</span>
                          <span class='label' data-js-label>No file selected</label>
                        </div>
                        <br><br>
          <?php echo $link3; ?>
          <hr>
                  </div>
                 
                  </div>
  
                  
                    
                              <div class="col-3">
                                  <h6 class="text-white">.</h6>
                              <button class="abt-upload-btn" name='act5' type="submit">Upload</button>
          
                              </div>
                         
  </form>
  <?php
  }
              }
              //for 6
              if ($urlid == 6) {
                $sel = mysqli_query($con,"select * from act where id=6");
                while($fet = mysqli_fetch_assoc($sel))
                {
                $id = $fet['id'];
                $link1 = $fet['link1'];
                $link2 = $fet['link2'];
                $link3 = $fet['link3'];
               ?>
                       <form method="post"  action="actsdocsupdate.php" enctype="multipart/form-data">
                   <div class="row mt-4">
                   <div class="col-4">
                       <h6>Link 1</h6>
                       <div class='file-input'>
                           <input type='file' type="file" name="file1" id="file1" value="<?php echo $link1; ?>">
                           <span class='button'>Choose</span>
                           <span class='label' data-js-label>No file selected</label>
                           
                         </div>
                         <br><br>
           <?php echo $link1; ?>
           <hr>
                   </div>
           
                   <div class="col-4">
                       <h6>Link 2</h6>
                       <div class='file-input'>
                           <input type='file' type="file" name="file2" id="file" 
           value="<?php echo $link2; ?>" >
                           <span class='button'>Choose</span>
                           <span class='label' data-js-label>No file selected</label>
                         </div>
                         <br><br>
           <?php echo $link2; ?>
           <hr>
                   </div>
                   <div class="col-4">
                       <h6>Link 3</h6>
                       <div class='file-input'>
                           <input type='file' type="file" name="file3" id="file" 
           value="<?php echo $link3; ?>" >
                           <span class='button'>Choose</span>
                           <span class='label' data-js-label>No file selected</label>
                         </div>
                         <br><br>
           <?php echo $link3; ?>
           <hr>
                   </div>
                  
                   </div>
   
                   
                     
                               <div class="col-3">
                                   <h6 class="text-white">.</h6>
                               <button class="abt-upload-btn" name='act6' type="submit">Upload</button>
           
                               </div>
                          
   </form>
   <?php
   }
               }
               //for 7
               if ($urlid == 7) {
                $sel = mysqli_query($con,"select * from act where id=7");
                while($fet = mysqli_fetch_assoc($sel))
                {
                $id = $fet['id'];
                $link1 = $fet['link1'];
                $link2 = $fet['link2'];
                $link3 = $fet['link3'];
                
                $link4 = $fet['link4'];
                $link5 = $fet['link5'];
                $link6 = $fet['link6'];
                
                $link7 = $fet['link7'];
                $link8 = $fet['link8'];
                $link9 = $fet['link9'];
                
                
                $link10 = $fet['link10'];
                
                        ?>
                                <form method="post"  action="actsdocsupdate.php" enctype="multipart/form-data">
                            <div class="row mt-4">
                            <div class="col-4">
                                <h6>Link 1</h6>
                                <div class='file-input'>
                                    <input type='file' type="file" name="file1" id="file1" value="<?php echo $link1; ?>">
                                    <span class='button'>Choose</span>
                                    <span class='label' data-js-label>No file selected</label>
                                    
                                  </div>
                                  <br><br>
                    <?php echo $link1; ?>
                    <hr>
                            </div>
                    
                            <div class="col-4">
                                <h6>Link 2</h6>
                                <div class='file-input'>
                                    <input type='file' type="file" name="file2" id="file" 
                    value="<?php echo $link2; ?>" >
                                    <span class='button'>Choose</span>
                                    <span class='label' data-js-label>No file selected</label>
                                  </div>
                                  <br><br>
                    <?php echo $link2; ?>
                    <hr>
                            </div>
                            <div class="col-4">
                                <h6>Link 3</h6>
                                <div class='file-input'>
                                    <input type='file' type="file" name="file3" id="file" 
                    value="<?php echo $link3; ?>" >
                                    <span class='button'>Choose</span>
                                    <span class='label' data-js-label>No file selected</label>
                                  </div>
                                  <br><br>
                    <?php echo $link3; ?>
                    <hr>
                            </div>
                           
                            </div>
            
                            <div class="row mt-4">
                                <div class="col-4">
                                    <h6>Link 4</h6>
                                    <div class='file-input'>
                                        <input type='file' type="file" name="file4" id="file" 
                    value="<?php echo $link4; ?>" >
                                        <span class='button'>Choose</span>
                                        <span class='label' data-js-label>No file selected</label>
                                      </div>
                                      <br><br>
                    <?php echo $link4; ?>
                    <hr>
                                </div>
                        
                                <div class="col-4">
                                    <h6>Link 5</h6>
                                    <div class='file-input'>
                                        <input type='file' type="file" name="file5" id="file" 
                    value="<?php echo $link5; ?>" >
                                        <span class='button'>Choose</span>
                                        <span class='label' data-js-label>No file selected</label>
                                      </div>
                                      <br><br>
                    <?php echo $link5; ?>
                    <hr>
                                </div>
                                <div class="col-4">
                                    <h6>Link 6</h6>
                                    <div class='file-input'>
                                        <input type='file' type="file" name="file6" id="file" 
                    value="<?php echo $link6; ?>" >
                                        <span class='button'>Choose</span>
                                        <span class='label' data-js-label>No file selected</label>
                                      </div>
                                      <br><br>
                    <?php echo $link6; ?>
                    <hr>
                                </div>
                                
                                </div>
                                <div class="row mt-4">
                                    <div class="col-4">
                                        <h6>Link 7</h6>
                                        <div class='file-input'>
                                            <input type='file' name="file7" id="file" 
                    value="<?php echo $link7; ?>" >
                                            <span class='button'>Choose</span>
                                            <span class='label' data-js-label>No file selected</label>
                                          </div>
                                          <br><br>
                    <?php echo $link7; ?>
                    <hr>
                                    </div>
                            
                                    <div class="col-4">
                                        <h6>Link 8</h6>
                                        <div class='file-input'>
                                            <input type='file' name="file8" id="file" 
                    value="<?php echo $link8; ?>" >
                                            <span class='button'>Choose</span>
                                            <span class='label' data-js-label>No file selected</label>
                                          </div>
                                          <br><br>
                    <?php echo $link8; ?>
                    <hr>
                                    </div>
                                    <div class="col-4">
                                        <h6>Link 9</h6>
                                        <div class='file-input'>
                                            <input type='file' name="file9" id="file" 
                    value="<?php echo $link9; ?>" >
                                            <span class='button'>Choose</span>
                                            <span class='label' data-js-label>No file selected</label>
                                          </div>
                                          <br><br>
                    <?php echo $link9; ?>
                    <hr>
                                    </div>
                                
                                    </div>
                                    <div class="row mt-4">
                                       
                              
                                        <div class="col-3">
                                            <h6 class="text-white">.</h6>
                                        <button class="abt-upload-btn" name='act7' type="submit">Upload</button>
                    
                                        </div>
                                   
            </form>
            <?php
            }
                        }
                              //for 6
              if ($urlid == 8) {
                $sel = mysqli_query($con,"select * from act where id=8");
                while($fet = mysqli_fetch_assoc($sel))
                {
                $id = $fet['id'];
                $link1 = $fet['link1'];
                $link2 = $fet['link2'];
                $link3 = $fet['link3'];
               ?>
                       <form method="post"  action="actsdocsupdate.php" enctype="multipart/form-data">
                   <div class="row mt-4">
                   <div class="col-4">
                       <h6>Link 1</h6>
                       <div class='file-input'>
                           <input type='file' type="file" name="file1" id="file1" value="<?php echo $link1; ?>">
                           <span class='button'>Choose</span>
                           <span class='label' data-js-label>No file selected</label>
                           
                         </div>
                         <br><br>
           <?php echo $link1; ?>
           <hr>
                   </div>
           
                   <div class="col-4">
                       <h6>Link 2</h6>
                       <div class='file-input'>
                           <input type='file' type="file" name="file2" id="file" 
           value="<?php echo $link2; ?>" >
                           <span class='button'>Choose</span>
                           <span class='label' data-js-label>No file selected</label>
                         </div>
                         <br><br>
           <?php echo $link2; ?>
           <hr>
                   </div>
         
                   <div class="col-3">
                                   <h6 class="text-white">.</h6>
                               <button class="abt-upload-btn" name='act8' type="submit">Upload</button>
           
                               </div>
                   </div>
   
                   
                     
                              
                          
   </form>
   <?php
   }
               }

?>
                   
            </div>

    
        </div>
</div>
<br>
        <!--Header content list-->

        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><b>Acts/Guidelines/Rules Update</b></h5>
                    <?php
$id = @$_GET['id'];
$sel = mysqli_query($con,"select * from act where id =$id");
while($fet = mysqli_fetch_assoc($sel))
{
$id = $fet['id'];
$Activity = $fet['Activity'];
$mainheading = $fet['heading'];
$description = $fet['description'];
$videoname = $fet['video'];
  ?>
                    <form method="post"  enctype='multipart/form-data'>
                <div class="row mt-4">
                <div class="col-md-4">
                    <h6>Activity</h6>
                        <div class="form-group">
                        <input type="hidden" placeholder="Enter id" value="<?php echo $id; ?>" name="id" readonly>
                            <input type="text" class="form-control" name="Activity" placeholder="Enter Activity" value="<?php echo $Activity; ?>">
                        </div>
                
                </div>
        
                <div class="col-md-4">
                    <h6>Main Heading</h6>
            
                        <div class="form-group">
                            <input type="text" class="form-control" name="mainheading" placeholder="Enter Main Heading" value="<?php echo $mainheading; ?>">
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
                            <input type='file' type="file" name="file" placeholder="video">
                            <span class='button'>Choose</span>
                            <span class='label' data-js-label>No file selected</label>
                          </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <h6>Description</h6>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"><?php echo $description; ?></textarea>
                          </div>
                    </div>
                    <div class="col-3">
                        <h6 class="text-white">.</h6>
                    <button class="abt-upload-btn"  type="submit" onClick="return updateconfirm()" name="Update">Update</button>
                    <button class="abt-cancel-btn ml-4"  formaction="adminacts2.php" type="submit">Cancel</button>

                    </div>
                </div>
            </div>
            </form>
            <?php
}
?>
            </div>

    
        </div>

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