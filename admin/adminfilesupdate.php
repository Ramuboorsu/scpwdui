<?php
session_start();
if($_SESSION['userSession'] == '')
{
    //if session not set go back to login page
    header("Location: index.php");
}
//include dbconnect
include("dbconnect.php");
//all update code of notices,summons,gos,showcause,orders
if(isset($_POST['noticeupdate'])){
    $id = $_POST['id'];
    $name = $_POST['data'];
    $desc = $_POST['desc'];
     $output_dir = "../images/notices/";
      $target_file = $output_dir;
      $filename = $_FILES['file']['name'];
     // Looping all files
    
    if( $filename != '')
    {
     
    
     $fullname =  $target_file.$filename;
      // Upload file
      move_uploaded_file($_FILES['file']['tmp_name'],$fullname);
     // $RandomNum   = time();
            
               $up =  mysqli_query($con,"update notices set name='$name',description='$desc',doc='$filename' where id='$id'");
                  // $result = mysqli_array($insert_img);
               if($up)
     {
       echo '<script>alert("Successfully Updated");window.location.href="adminnotices.php";</script>';
     }
    
            }
              else
              {
    
                 $sel = mysqli_query($con,"select * from notices where id = $id");
        while($fet = mysqli_fetch_assoc($sel))
    {
    
    $doc = $fet['doc'];
        
     }
     //echo $doc;
     $up =  mysqli_query($con,"update notices set name='$name',description='$desc',doc='$doc' where id='$id'");
     if($up)
     {
       echo '<script>alert("Successfully Updated");window.location.href="adminnotices.php";</script>';
     }
    } 
    }
    
    if(isset($_POST['summonsupdate'])){
    $id = $_POST['id'];
    $name = $_POST['data'];
    $desc = $_POST['desc'];
     $output_dir = "../images/summons/";
      $target_file = $output_dir;
      $filename = $_FILES['file']['name'];
     // Looping all files
    
    if( $filename != '')
    {
     
    
     $fullname =  $target_file.$filename;
      // Upload file
      move_uploaded_file($_FILES['file']['tmp_name'],$fullname);
     // $RandomNum   = time();
            
              
               $up =  mysqli_query($con,"update summons set name='$name',description='$desc',doc='$filename' where id='$id'");
                  // $result = mysqli_array($insert_img);
               if($up)
     {
       echo '<script>alert("Successfully Updated");window.location.href="adminsummons.php";</script>';
     }
    
            }
              else
              {
    
                 $sel = mysqli_query($con,"select * from summons where id = $id");
        while($fet = mysqli_fetch_assoc($sel))
    {
    
    $doc = $fet['doc'];
        
     }
     //echo $doc;
     $up =  mysqli_query($con,"update summons set name='$name',description='$desc',doc='$doc' where id='$id'");
     if($up)
     {
       echo '<script>alert("Successfully Updated");window.location.href="adminsummons.php";</script>';
     }
    } 
    }
    
    
    
    if(isset($_POST['gosupdate'])){
    $id = $_POST['id'];
    $name = $_POST['data'];
    $desc = $_POST['desc'];
     $output_dir = "../images/gos/";
      $target_file = $output_dir;
      $filename = $_FILES['file']['name'];
     // Looping all files
    
    if( $filename != '')
    {
     
    
     $fullname =  $target_file.$filename;
      // Upload file
      move_uploaded_file($_FILES['file']['tmp_name'],$fullname);
     // $RandomNum   = time();
            
              
                
               $up =  mysqli_query($con,"update gos set name='$name',description='$desc',doc='$filename' where id='$id'");
                  // $result = mysqli_array($insert_img);
               if($up)
     {
       echo '<script>alert("Successfully Updated");window.location.href="admingos.php";</script>';
     }
    
            }
              else
              {
    
                 $sel = mysqli_query($con,"select * from gos where id = $id");
        while($fet = mysqli_fetch_assoc($sel))
    {
    
    $doc = $fet['doc'];
        
     }
     //echo $doc;
     $up =  mysqli_query($con,"update gos set name='$name',description='$desc',doc='$doc' where id='$id'");
     if($up)
     {
       echo '<script>alert("Successfully Updated");window.location.href="admingos.php";</script>';
     }
    } 
    }
    
    if(isset($_POST['socageupdate'])){
    $id = $_POST['id'];
    $name = $_POST['data'];
    $desc = $_POST['desc'];
     $output_dir = "../images/socagenotices/";
      $target_file = $output_dir;
      $filename = $_FILES['file']['name'];
     // Looping all files
    
    if( $filename != '')
    {
     
    
     $fullname =  $target_file.$filename;
      // Upload file
      move_uploaded_file($_FILES['file']['tmp_name'],$fullname);
     // $RandomNum   = time();
            
              
               $up =  mysqli_query($con,"update socagenotices set name='$name',description='$desc',doc='$filename' where id='$id'");
                  // $result = mysqli_array($insert_img);
               if($up)
     {
       echo '<script>alert("Successfully Updated");window.location.href="adminshowcause.php";</script>';
     }
    
            }
              else
              {
    //echo $id;
                 $sel = mysqli_query($con,"select * from socagenotices where id = $id");
        while($fet = mysqli_fetch_assoc($sel))
    {
    
    $doc = $fet['doc'];
        
     }
     //echo $doc;
     $up =  mysqli_query($con,"update socagenotices set name='$name',description='$desc',doc='$doc' where id='$id'");
     if($up)
     {
       echo '<script>alert("Successfully Updated");window.location.href="adminshowcause.php";</script>';
     }
    } 
    }
    
    
    
    if(isset($_POST['judgmentupdate'])){
    $id = $_POST['id'];
    $name = $_POST['data'];
    $desc = $_POST['desc'];
     $output_dir = "../images/judgments/";
      $target_file = $output_dir;
      $filename = $_FILES['file']['name'];
     // Looping all files
    
    if( $filename != '')
    {
     
    
     $fullname =  $target_file.$filename;
      // Upload file
      move_uploaded_file($_FILES['file']['tmp_name'],$fullname);
     // $RandomNum   = time();
            
              
                
               $up =  mysqli_query($con,"update judgment set name='$name',description='$desc',doc='$filename' where id='$id'");
                  // $result = mysqli_array($insert_img);
               if($up)
     {
       echo '<script>alert("Successfully Updated");window.location.href="adminshowcause.php";</script>';
     }
    
            }
              else
              {
    
                 $sel = mysqli_query($con,"select * from judgment where id = $id");
        while($fet = mysqli_fetch_assoc($sel))
    {
    
    $doc = $fet['doc'];
        
     }
     //echo $doc;
     $up =  mysqli_query($con,"update judgment set name='$name',description='$desc',doc='$doc' where id='$id'");
     if($up)
     {
       echo '<script>alert("Successfully Updated");window.location.href="adminorders.php";</script>';
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
<!--script for confirmation-->
<script src="js/confirmmsg.js"></script>
     <!--icons-->
 <script src='https://kit.fontawesome.com/a076d05399.js'></script>

</head>

<body>
    <div class="main-wrapper">
    <style>
  #navbarDropdown1{
     color:black;
 }
    </style>
    <!-- Header Area Start -->
 <?php include("adminheader.php"); ?>
    <!-- Header Area End -->


    <!-- Main Content Area Start -->
    <div class="container-fluid">
    <section class="main-content-wrapper section_padding_50">
<?php
//getting datya from db according to functionality--> Notices
    if(@$_GET['step'] == 'noticeupdate')
{
$id = @$_GET['q'];
    $sel = mysqli_query($con,"select * from notices where id = $id");
    while($fet = mysqli_fetch_assoc($sel))
{
$id = $fet['id'];
$name = $fet['name'];
$desc = $fet['description'];
$doc = $fet['doc'];
    if($sel)
    {
      ?>
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><b>Notices/Letters Update</b></h5>
                    <form method="post" enctype="multipart/form-data">
                <div class="row">
                <div class="col-3">
                    <h6>Name</h6>
          
                        <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $id; ?>" >
                            <input type="text" class="form-control" name="data" value="<?php echo $name; ?>"  placeholder="Enter Name" required>
                        </div>
                   
                </div>
        
                <div class="col-3">
                    <h6>Description</h6>
                  
                        <div class="form-group">
                            <input type="text" class="form-control"  name="desc" value="<?php echo $desc; ?>" placeholder="Enter Description" required>
                        </div>
                   

                </div>
                <div class="col-3">
                    <h6>File</h6>
                    <div class='file-input'>
                        <input type='file'  name="file" id="file">
                        <span class='button'>Choose</span>
                        <span class='label' data-js-label>No file selected</label>
                      </div>
                    
                </div>
                <div class="col-3">
                    
                <button class="btn-upload"  type='submit' name='noticeupdate' onClick="return updateconfirm()">Update</button>
                <button class="btn-upload" id="cancel-btn" type='submit' name='noticeupdate' formaction="adminnotices.php">Cancel</button>

                    
                </div>
                </div>
</form>
            </div>

            </div>

    
        </div>
<?php
    }
  }
}
//end of notices
//summons update
if(@$_GET['step'] == 'summonupdate')
{
$id = @$_GET['q'];
$sel = mysqli_query($con,"select * from summons where id = $id");
    while($fet = mysqli_fetch_assoc($sel))
{
$id = $fet['id'];
$name = $fet['name'];
$desc = $fet['description'];
$doc = $fet['doc'];
    if($sel)
    {
      ?>
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><b>Summons Update</b></h5>
                    <form method="post" enctype="multipart/form-data">
                <div class="row">
                <div class="col-3">
                    <h6>Name</h6>
          
                        <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $id; ?>" >
                            <input type="text" class="form-control" name="data" value="<?php echo $name; ?>"  placeholder="Enter Name" required>
                        </div>
                   
                </div>
        
                <div class="col-3">
                    <h6>Description</h6>
                  
                        <div class="form-group">
                            <input type="text" class="form-control"  name="desc" value="<?php echo $desc; ?>" placeholder="Enter Description" required>
                        </div>
                   

                </div>
                <div class="col-3">
                    <h6>File</h6>
                    <div class='file-input'>
                        <input type='file'  name="file" id="file">
                        <span class='button'>Choose</span>
                        <span class='label' data-js-label>No file selected</label>
                      </div>
                    
                </div>
                <div class="col-3">
                    
                <button class="btn-upload"  type='submit'  name='summonsupdate' onClick="return updateconfirm()">Update</button>
                <button class="btn-upload" id="cancel-btn" type='submit' name='noticeupdate' formaction="adminsummons.php">Cancel</button>

                    
                </div>
                </div>
</form>
            </div>

            </div>

    
        </div>
<?php
    }
  }
}
//end of summons
//gos update
if(@$_GET['step'] == 'gosupdate')
{
$id = @$_GET['q'];
$sel = mysqli_query($con,"select * from gos where id = $id");
    while($fet = mysqli_fetch_assoc($sel))
{
$id = $fet['id'];
$name = $fet['name'];
$desc = $fet['description'];
$doc = $fet['doc'];
    if($sel)
    {
      ?>
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><b>Summons Update</b></h5>
                    <form method="post" enctype="multipart/form-data">
                <div class="row">
                <div class="col-3">
                    <h6>Name</h6>
          
                        <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $id; ?>" >
                            <input type="text" class="form-control" name="data" value="<?php echo $name; ?>"  placeholder="Enter Name" required>
                        </div>
                   
                </div>
        
                <div class="col-3">
                    <h6>Description</h6>
                  
                        <div class="form-group">
                            <input type="text" class="form-control"  name="desc" value="<?php echo $desc; ?>" placeholder="Enter Description" required>
                        </div>
                   

                </div>
                <div class="col-3">
                    <h6>File</h6>
                    <div class='file-input'>
                        <input type='file'  name="file" id="file">
                        <span class='button'>Choose</span>
                        <span class='label' data-js-label>No file selected</label>
                      </div>
                    
                </div>
                <div class="col-3">
                    
                <button class="btn-upload"  type='submit'   name='gosupdate' onClick="return updateconfirm()">Update</button>
                <button class="btn-upload" id="cancel-btn" type='submit' name='noticeupdate' formaction="admingos.php">Cancel</button>

                    
                </div>
                </div>
</form>
            </div>

            </div>

    
        </div>
<?php
    }
  }
}
//end of gos
//showcause update
if(@$_GET['step'] == 'socagenoticeupdate')
{
$id = @$_GET['q'];
$sel = mysqli_query($con,"select * from socagenotices where id = $id");
    while($fet = mysqli_fetch_assoc($sel))
{
$id = $fet['id'];
$name = $fet['name'];
$desc = $fet['description'];
$doc = $fet['doc'];
    if($sel)
    {
      ?>
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><b>Summons Update</b></h5>
                    <form method="post" enctype="multipart/form-data">
                <div class="row">
                <div class="col-3">
                    <h6>Name</h6>
          
                        <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $id; ?>" >
                            <input type="text" class="form-control" name="data" value="<?php echo $name; ?>"  placeholder="Enter Name" required>
                        </div>
                   
                </div>
        
                <div class="col-3">
                    <h6>Description</h6>
                  
                        <div class="form-group">
                            <input type="text" class="form-control"  name="desc" value="<?php echo $desc; ?>" placeholder="Enter Description" required>
                        </div>
                   

                </div>
                <div class="col-3">
                    <h6>File</h6>
                    <div class='file-input'>
                        <input type='file'  name="file" id="file">
                        <span class='button'>Choose</span>
                        <span class='label' data-js-label>No file selected</label>
                      </div>
                    
                </div>
                <div class="col-3">
                    
                <button class="btn-upload"  type='submit'  name='socageupdate' onClick="return updateconfirm()">Update</button>
                <button class="btn-upload" id="cancel-btn" type='submit' name='noticeupdate' formaction="adminshowcause.php">Cancel</button>

                    
                </div>
                </div>
</form>
            </div>

            </div>

    
        </div>
<?php
    }
  }
}
//end of showcause
//summons update
if(@$_GET['step'] == 'judgmentupdate')
{
$id = @$_GET['q'];
$sel = mysqli_query($con,"select * from judgment where id = $id");
    while($fet = mysqli_fetch_assoc($sel))
{
$id = $fet['id'];
$name = $fet['name'];
$desc = $fet['description'];
$doc = $fet['doc'];
    if($sel)
    {
      ?>
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><b>Summons Update</b></h5>
                    <form method="post" enctype="multipart/form-data">
                <div class="row">
                <div class="col-3">
                    <h6>Name</h6>
          
                        <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $id; ?>" >
                            <input type="text" class="form-control" name="data" value="<?php echo $name; ?>"  placeholder="Enter Name" required>
                        </div>
                   
                </div>
        
                <div class="col-3">
                    <h6>Description</h6>
                  
                        <div class="form-group">
                            <input type="text" class="form-control"  name="desc" value="<?php echo $desc; ?>" placeholder="Enter Description" required>
                        </div>
                   

                </div>
                <div class="col-3">
                    <h6>File</h6>
                    <div class='file-input'>
                        <input type='file'  name="file" id="file">
                        <span class='button'>Choose</span>
                        <span class='label' data-js-label>No file selected</label>
                      </div>
                    
                </div>
                <div class="col-3">
                    
                <button class="btn-upload"  type='submit'  name='judgmentupdate' onClick="return updateconfirm()">Update</button>
                <button class="btn-upload" id="cancel-btn" type='submit' name='noticeupdate' formaction="adminorders.php">Cancel</button>

                    
                </div>
                </div>
</form>
            </div>

            </div>

    
        </div>
<?php
    }
  }
}
//end of summons
    ?>
    </section>    

    </div>

    <!-- Footer Area Start -->
<?php include("adminfooter.php"); ?>
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