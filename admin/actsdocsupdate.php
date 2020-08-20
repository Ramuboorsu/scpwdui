<?php
include("dbconnect.php");

if(isset($_POST['act1']))
 {

  $sel = mysqli_query($con,"select * from act where id=1");
while($fet = mysqli_fetch_assoc($sel))
{

$link1 = $fet['link1'];

$link2 = $fet['link2'];
$link3 = $fet['link3'];
$link4 = $fet['link4'];
$link5 = $fet['link5'];
$link6 = $fet['link6'];

}

 $output_dir = "docs/acts/";
  $target_file = $output_dir;

  $filename1 = $_FILES['file1']['name'];
  if($filename1 == '' )
  {
    $filename1 = $link1;
  }
  $filename2 = $_FILES['file2']['name'];
  if($filename2 == '' )
  {
    $filename2 = $link2;
  }
  $filename3 = $_FILES['file3']['name'];
  if($filename3 == '' )
  { 
    $filename3 =$link3;
  }
   $filename4 = $_FILES['file4']['name'];
  if($filename4 == '' )
  { 
    $filename4 =$link4;
  }
  $filename5 = $_FILES['file5']['name'];
  if($filename5 == '' )
  { 
    $filename5 =$link5;
  }
  $filename6 = $_FILES['file6']['name'];
  if($filename6 == '' )
  { 
    $filename6 =$link6;
  }

 $pathfullname =  $target_file;
  // Upload file
  if(move_uploaded_file($_FILES['file1']['tmp_name'],$pathfullname.$filename1) or move_uploaded_file($_FILES['file2']['tmp_name'],$pathfullname.$filename2) or  move_uploaded_file($_FILES['file3']['tmp_name'],$pathfullname.$filename3) or move_uploaded_file($_FILES['file4']['tmp_name'],$pathfullname.$filename4) or move_uploaded_file($_FILES['file5']['tmp_name'],$pathfullname.$filename5) or move_uploaded_file($_FILES['file6']['tmp_name'],$pathfullname.$filename6)){

           $insert_img = mysqli_query($con,"update act SET link1='$filename1',link2='$filename2',link3='$filename3',link4='$filename4',link5='$filename5',link6='$filename6' where id=1");
echo '<script>alert("Successfully uploaded");window.location.href="actsupdate2.php?id=1"</script>';
      
          }
          else{
            echo '<script>alert("Please Select File and Upload");window.location.href="actsupdate2.php?id=1";</script>';
          }
           

}  
if(isset($_POST['act2']))
 {

  $sel = mysqli_query($con,"select * from act where id=2");
while($fet = mysqli_fetch_assoc($sel))
{

$link1 = $fet['link1'];

$link2 = $fet['link2'];
$link3 = $fet['link3'];
$link4 = $fet['link4'];

$link5= $fet['link5'];
$link6 = $fet['link6'];
$link7 = $fet['link7'];

$link8 = $fet['link8'];
$link9 = $fet['link9'];
// $link10 = $fet['link10'];
}

 $output_dir = "docs/rule/";
  $target_file = $output_dir;

  $filename1 = $_FILES['file1']['name'];
  if($filename1 == '' )
  {
    $filename1 = $link1;
  }
  $filename2 = $_FILES['file2']['name'];
  if($filename2 == '' )
  {
    $filename2 = $link2;
  }
  $filename3 = $_FILES['file3']['name'];
  if($filename3 == '' )
  { 
    $filename3 =$link3;
  }
  
  $filename4 = $_FILES['file4']['name'];
  if($filename4 == '' )
  {
    $filename4 = $link4;
  }
  $filename5 = $_FILES['file5']['name'];
  if($filename5 == '' )
  {
    $filename5 = $link5;
  }
  $filename6 = $_FILES['file6']['name'];
  if($filename6 == '' )
  { 
    $filename6 =$link3;
  }

  $filename7 = $_FILES['file7']['name'];
  if($filename7 == '' )
  {
    $filename7 = $link7;
  }
  $filename8 = $_FILES['file8']['name'];
  if($filename8 == '' )
  {
    $filename8 = $link8;
  }
  $filename9 = $_FILES['file9']['name'];
  if($filename9 == '' )
  { 
    $filename9 =$link9;
  }
  //  $filename10 = $_FILES['file10']['name'];
  // if($filename10 == '' )
  // { 
  //   $filename10 =$link10;
  // }

 $pathfullname =  $target_file;
  // Upload file
  if(move_uploaded_file($_FILES['file1']['tmp_name'],$pathfullname.$filename1) or move_uploaded_file($_FILES['file2']['tmp_name'],$pathfullname.$filename2) or  move_uploaded_file($_FILES['file3']['tmp_name'],$pathfullname.$filename3)or  move_uploaded_file($_FILES['file4']['tmp_name'],$pathfullname.$filename4)or  move_uploaded_file($_FILES['file5']['tmp_name'],$pathfullname.$filename5)or  move_uploaded_file($_FILES['file6']['tmp_name'],$pathfullname.$filename6)or  move_uploaded_file($_FILES['file7']['tmp_name'],$pathfullname.$filename7)or  move_uploaded_file($_FILES['file8']['tmp_name'],$pathfullname.$filename8)or  move_uploaded_file($_FILES['file9']['tmp_name'],$pathfullname.$filename9)){

           $insert_img = mysqli_query($con,"update act SET link1='$filename1',link2='$filename2',link3='$filename3',link4='$filename4',link5='$filename5',link6='$filename6',link7='$filename7',link8='$filename8',link9='$filename9' where id=2");
echo '<script>alert("Document Uploaded");window.location.href="actsupdate2.php?id=2"</script>';
      
          }
          else{
            echo '<script>alert("Please Select File and Upload");window.location.href="actsupdate2.php?id=2";</script>';
          }
           

} 
if(isset($_POST['act3']))
 {

  $sel = mysqli_query($con,"select * from act where id=3");
while($fet = mysqli_fetch_assoc($sel))
{

$link1 = $fet['link1'];

$link2 = $fet['link2'];
$link3 = $fet['link3'];
$link4 = $fet['link4'];

$link5= $fet['link5'];
$link6 = $fet['link6'];
$link7 = $fet['link7'];

$link8 = $fet['link8'];
$link9 = $fet['link9'];
$link10 = $fet['link10'];
}

 $output_dir = "docs/guidelines/";
  $target_file = $output_dir;

  $filename1 = $_FILES['file1']['name'];
  if($filename1 == '' )
  {
    $filename1 = $link1;
  }
  $filename2 = $_FILES['file2']['name'];
  if($filename2 == '' )
  {
    $filename2 = $link2;
  }
  $filename3 = $_FILES['file3']['name'];
  if($filename3 == '' )
  { 
    $filename3 =$link3;
  }
  
  $filename4 = $_FILES['file4']['name'];
  if($filename4 == '' )
  {
    $filename4 = $link4;
  }
  $filename5 = $_FILES['file5']['name'];
  if($filename5 == '' )
  {
    $filename5 = $link5;
  }
  $filename6 = $_FILES['file6']['name'];
  if($filename6 == '' )
  { 
    $filename6 =$link3;
  }

  $filename7 = $_FILES['file7']['name'];
  if($filename7 == '' )
  {
    $filename7 = $link7;
  }
  $filename8 = $_FILES['file8']['name'];
  if($filename8 == '' )
  {
    $filename8 = $link8;
  }
  $filename9 = $_FILES['file9']['name'];
  if($filename9 == '' )
  { 
    $filename9 =$link9;
  }
   $filename10 = $_FILES['file10']['name'];
  if($filename10 == '' )
  { 
    $filename10 =$link10;
  }

 $pathfullname =  $target_file;
  // Upload file
  if(move_uploaded_file($_FILES['file1']['tmp_name'],$pathfullname.$filename1) or move_uploaded_file($_FILES['file2']['tmp_name'],$pathfullname.$filename2) or  move_uploaded_file($_FILES['file3']['tmp_name'],$pathfullname.$filename3)or  move_uploaded_file($_FILES['file4']['tmp_name'],$pathfullname.$filename4)or  move_uploaded_file($_FILES['file5']['tmp_name'],$pathfullname.$filename5)or  move_uploaded_file($_FILES['file6']['tmp_name'],$pathfullname.$filename6)or  move_uploaded_file($_FILES['file7']['tmp_name'],$pathfullname.$filename7)or  move_uploaded_file($_FILES['file8']['tmp_name'],$pathfullname.$filename8)or  move_uploaded_file($_FILES['file9']['tmp_name'],$pathfullname.$filename9)or  move_uploaded_file($_FILES['file10']['tmp_name'],$pathfullname.$filename10)){

           $insert_img = mysqli_query($con,"update act SET link1='$filename1',link2='$filename2',link3='$filename3',link4='$filename4',link5='$filename5',link6='$filename6',link7='$filename7',link8='$filename8',link9='$filename9',link10='$filename10' where id=3");
echo '<script>alert("Document Uploaded");window.location.href="actsupdate2.php?id=3"</script>';
      
          }
          else{
            echo '<script>alert("Please Select File and Upload");window.location.href="actsupdate2.php?id=3";</script>';
          }
        }
           
if(isset($_POST['act5']))
 {

  $sel = mysqli_query($con,"select * from act where id=5");
while($fet = mysqli_fetch_assoc($sel))
{

$link1 = $fet['link1'];

$link2 = $fet['link2'];
$link3 = $fet['link3'];

}

 $output_dir = "docs/policy/";
  $target_file = $output_dir;

  $filename1 = $_FILES['file1']['name'];
  if($filename1 == '' )
  {
    $filename1 = $link1;
  }
  $filename2 = $_FILES['file2']['name'];
  if($filename2 == '' )
  {
    $filename2 = $link2;
  }
  $filename3 = $_FILES['file3']['name'];
  if($filename3 == '' )
  { 
    $filename3 =$link3;
  }
  

 $pathfullname =  $target_file;
  // Upload file
  if(move_uploaded_file($_FILES['file1']['tmp_name'],$pathfullname.$filename1) or move_uploaded_file($_FILES['file2']['tmp_name'],$pathfullname.$filename2) or  move_uploaded_file($_FILES['file3']['tmp_name'],$pathfullname.$filename3)){

           $insert_img = mysqli_query($con,"update act SET link1='$filename1',link2='$filename2',link3='$filename3' where id=5");
echo '<script>alert("Document Uploaded");window.location.href="actsupdate2.php?id=5"</script>';
      
          }
          else{
            echo '<script>alert("Please Select File and Upload");window.location.href="actsupdate2.php?id=5";</script>';
          }
           

}

if(isset($_POST['act6']))
 {

  $sel = mysqli_query($con,"select * from act where id=6");
while($fet = mysqli_fetch_assoc($sel))
{

$link1 = $fet['link1'];

$link2 = $fet['link2'];
$link3 = $fet['link3'];

}
 $output_dir = "docs/reference/";
  $target_file = $output_dir;

  $filename1 = $_FILES['file1']['name'];
  if($filename1 == '' )
  {
    $filename1 = $link1;
  }
  $filename2 = $_FILES['file2']['name'];
  if($filename2 == '' )
  {
    $filename2 = $link2;
  }
  $filename3 = $_FILES['file3']['name'];
  if($filename3 == '' )
  { 
    $filename3 =$link3;
  }
  

 $pathfullname =  $target_file;
  // Upload file
  if(move_uploaded_file($_FILES['file1']['tmp_name'],$pathfullname.$filename1) or move_uploaded_file($_FILES['file2']['tmp_name'],$pathfullname.$filename2) or  move_uploaded_file($_FILES['file3']['tmp_name'],$pathfullname.$filename3)){

           $insert_img = mysqli_query($con,"update act SET link1='$filename1',link2='$filename2',link3='$filename3' where id=6");
echo '<script>alert("Document Uploaded");"</script>';
      
          }
          else{
            echo '<script>alert("Please Select File and Upload");window.location.href="actsupdate2.php?id=6";</script>';
          }
           

}


if(isset($_POST['act7']))
 {

  $sel = mysqli_query($con,"select * from act where id=7");
while($fet = mysqli_fetch_assoc($sel))
{

$link1 = $fet['link1'];

$link2 = $fet['link2'];
$link3 = $fet['link3'];
$link4 = $fet['link4'];

$link5= $fet['link5'];
$link6 = $fet['link6'];
$link7 = $fet['link7'];

$link8 = $fet['link8'];
$link9 = $fet['link9'];
}

 $output_dir = "docs/rpwds/";
  $target_file = $output_dir;

  $filename1 = $_FILES['file1']['name'];
  if($filename1 == '' )
  {
    $filename1 = $link1;
  }
  $filename2 = $_FILES['file2']['name'];
  if($filename2 == '' )
  {
    $filename2 = $link2;
  }
  $filename3 = $_FILES['file3']['name'];
  if($filename3 == '' )
  { 
    $filename3 =$link3;
  }
  
  $filename4 = $_FILES['file4']['name'];
  if($filename4 == '' )
  {
    $filename4 = $link4;
  }
  $filename5 = $_FILES['file5']['name'];
  if($filename5 == '' )
  {
    $filename5 = $link5;
  }
  $filename6 = $_FILES['file6']['name'];
  if($filename6 == '' )
  { 
    $filename6 =$link3;
  }

  $filename7 = $_FILES['file7']['name'];
  if($filename7 == '' )
  {
    $filename7 = $link7;
  }
  $filename8 = $_FILES['file8']['name'];
  if($filename8 == '' )
  {
    $filename8 = $link8;
  }
  $filename9 = $_FILES['file9']['name'];
  if($filename9 == '' )
  { 
    $filename9 =$link9;
  }
  //  $filename10 = $_FILES['file10']['name'];
  // if($filename10 == '' )
  // { 
  //   $filename10 =$link10;
  // }

 $pathfullname =  $target_file;
  // Upload file
  if(move_uploaded_file($_FILES['file1']['tmp_name'],$pathfullname.$filename1) or move_uploaded_file($_FILES['file2']['tmp_name'],$pathfullname.$filename2) or  move_uploaded_file($_FILES['file3']['tmp_name'],$pathfullname.$filename3)or  move_uploaded_file($_FILES['file4']['tmp_name'],$pathfullname.$filename4)or  move_uploaded_file($_FILES['file5']['tmp_name'],$pathfullname.$filename5)or  move_uploaded_file($_FILES['file6']['tmp_name'],$pathfullname.$filename6)or  move_uploaded_file($_FILES['file7']['tmp_name'],$pathfullname.$filename7)or  move_uploaded_file($_FILES['file8']['tmp_name'],$pathfullname.$filename8)or  move_uploaded_file($_FILES['file9']['tmp_name'],$pathfullname.$filename9)){

           $insert_img = mysqli_query($con,"update act SET link1='$filename1',link2='$filename2',link3='$filename3',link4='$filename4',link5='$filename5',link6='$filename6',link7='$filename7',link8='$filename8',link9='$filename9' where id=7");
echo '<script>alert("Document Uploaded");window.location.href="actsupdate2.php?id=7"</script>';
      
          }
          else{
            echo '<script>alert("Please Select File and Upload");window.location.href="actsupdate2.php?id=7";</script>';
          }
           

} 




if(isset($_POST['act8']))
 {

  $sel = mysqli_query($con,"select * from act where id=8");
while($fet = mysqli_fetch_assoc($sel))
{

$link1 = $fet['link1'];

$link2 = $fet['link2'];


}

 $output_dir = "docs/otherNot/";
  $target_file = $output_dir;

  $filename1 = $_FILES['file1']['name'];
  if($filename1 == '' )
  {
    $filename1 = $link1;
  }
  $filename2 = $_FILES['file2']['name'];
  if($filename2 == '' )
  {
    $filename2 = $link2;
  }
  

 $pathfullname =  $target_file;
  // Upload file
  if(move_uploaded_file($_FILES['file1']['tmp_name'],$pathfullname.$filename1) or move_uploaded_file($_FILES['file2']['tmp_name'],$pathfullname.$filename2)){

           $insert_img = mysqli_query($con,"update act SET link1='$filename1',link2='$filename2' where id=8");
echo '<script>alert("Document Uploaded");window.location.href="actsupdate2.php?id=8"</script>';
      
          }
          else{
            echo '<script>alert("Please Select File and Upload");window.location.href="actsupdate2.php?id=8";</script>';
          }
          
           

}





?>