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
    $link = $_POST['desc'];
     
                
                
                $insert_img = mysqli_query($con,"insert into redirectlinks(name,link) values('$name','$link')");
                  // $result = mysqli_array($insert_img);
                if($insert_img)
                {
                   echo '<script>alert("Successfully Inserted");window.location.href="adminRedirectlinks.php";</script>';
                }
    } 
    if(@$_GET['step'] == 'delete')
    {
    $id = @$_GET['q'];
        $del = mysqli_query($con,"delete from redirectlinks where id = $id");
        if($del)
        {
            echo '<script>alert("Successfully Deleted");window.location.href="adminRedirectlinks.php";</script>';
    
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
  #links{
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
          <h5><b>Add Links</b></h5>
          <form method="post"> 
          <div class="row">
                <div class="col-3">
                    <h6>Name</h6>
                
                        <div class="form-group">
                            <input type="text" name="data" placeholder="Enter Name" class="form-control" required>
                        </div>
              
                </div>
        
                <div class="col-3">
                    <h6>Link</h6>
                   
                        <div class="form-group">
                            <input type="text" name="desc" placeholder="Enter Description" class="form-control" required>
                        </div>
                  

                </div>
             
                <div class="col-3">
                    <h6 class="text-white">.</h6>
                <button class="btn-upload" name="submit"  type="submit">Upload</button>
                    
                </div>
                </div>
</form>
            </div>

            </div>

    
        </div>

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
                        <h5 class="card-title"><b>Links List</b></h5>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                <thead>
                                    <tr>
                                    <th>S.no</th>
                                    <th>Name</th>
                                    <th>Link</th>
                                
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
$sel = mysqli_query($con,"select * from redirectlinks");
$cnt = 1;
while($fet = mysqli_fetch_assoc($sel))
{
$id = $fet['id'];
$name = $fet['name'];
$link = $fet['link'];

?>
            <tr>
                <td><?php echo $cnt; ?></td>
                <td><?php echo $name; ?></td>
                <td><?php echo $link; ?></td>
                
                <td>
                 
                  <a href="adminRedirectlinks.php?step=delete&q=<?php echo $id; ?>" class="btn btn-danger"  onclick="return deleteconfirm();"><i class='far'>&#xf2ed;</i></a>
              
                 <!-- <a href="adminfilesupdate.php?step=noticeupdate&q=<?php echo $id; ?>"  class="btn btn-primary">Update</a> -->
                 
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