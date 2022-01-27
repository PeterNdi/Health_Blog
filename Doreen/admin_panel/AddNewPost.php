<?php require_once("Includes/DB.php"); ?>
<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>
<? Confirm_Login(); ?>
<?php
if(isset($_POST["Submit"])){
  $PostTitle =$_POST["PostTitle"];
  $Category  =$_POST["Category"];
  $Image     = $_FILES["Image"]["name"];
  $Image2     = $_FILES["Image2"]["name"];
  $Image3     = $_FILES["Image3"]["name"];
  $Image4     = $_FILES["Image4"]["name"];
  $Image5     = $_FILES["Image5"]["name"];
  $Image6     = $_FILES["Image6"]["name"];
  $Image7     = $_FILES["Image7"]["name"];

$tmp_Image = $_FILES["Image"]["tmp_name"];

$tmp_Image2 = $_FILES["Image2"]["tmp_name"];

$tmp_Image3 = $_FILES["Image3"]["tmp_name"];

$tmp_Image4 = $_FILES["Image4"]["tmp_name"];

$tmp_Image5 = $_FILES["Image5"]["tmp_name"];

$tmp_Image6 = $_FILES["Image6"]["tmp_name"];

$tmp_Image7 = $_FILES["Image7"]["tmp_name"];

$allowed_img = array('gif','png','jpg','jpeg','tif');

$Image_extension = pathinfo($Image, PATHINFO_EXTENSION);

$Image2_extension = pathinfo($Image2, PATHINFO_EXTENSION);

$Image3_extension = pathinfo($Image3, PATHINFO_EXTENSION);

$Image4_extension = pathinfo($Image4, PATHINFO_EXTENSION);

$Image5_extension = pathinfo($Image5, PATHINFO_EXTENSION);

$Image6_extension = pathinfo($Image6, PATHINFO_EXTENSION);

$Image7_extension = pathinfo($Image7, PATHINFO_EXTENSION);

if(!in_array($Image_extension,$allowed_img)){
  
echo "<script>alert('Your proposal image 1 file extension is not supported.')</script>";
  
exit();
  
}
  
if(!empty($Image2)){
  
  
if(!in_array($Image2_extension,$allowed_img)){
  
echo "<script>alert('Your proposal image 2 file extension is not supported.')</script>";
  
exit();
  
}

  
}
  
  
  
if(!empty($Image3)){
  
  
if(!in_array($Image3_extension,$allowed_img)){
  
echo "<script>alert('Your proposal image 3 file extension is not supported.')</script>";
  
exit();
  
}

  
}



if(!empty($Image4)){
  
  
if(!in_array($Image4_extension,$allowed_img)){
  
echo "<script>alert('Your proposal image 4 file extension is not supported.')</script>";
  
exit();
  
}

  
}

if(!empty($Image5)){
  
  
if(!in_array($Image5_extension,$allowed_img)){
  
echo "<script>alert('Your proposal image 4 file extension is not supported.')</script>";
  
exit();
  
}

  
}

if(!empty($Image6)){
  
  
if(!in_array($Image6_extension,$allowed_img)){
  
echo "<script>alert('Your proposal image 4 file extension is not supported.')</script>";
  
exit();
  
}

  
}

if(!empty($Image7)){
  
  
if(!in_array($Image7_extension,$allowed_img)){
  
echo "<script>alert('Your proposal image 4 file extension is not supported.')</script>";
  
exit();
  
}

  
}
move_uploaded_file($tmp_Image, "../Uploads/$Image");

move_uploaded_file($tmp_Image2, "../Uploads/$Image2");

move_uploaded_file($tmp_Image3, "../Uploads/$Image3");

move_uploaded_file($tmp_Image4, "../Uploads/$Image4");

move_uploaded_file($tmp_Image5, "../Uploads/$Image5");

move_uploaded_file($tmp_Image6, "../Uploads/$Image6");

move_uploaded_file($tmp_Image7, "../Uploads/$Image7");


  $PostText  =$_POST["PostDescription"];
  $Admin = $_SESSION["UserName"];
  date_default_timezone_set("Africa/Nairobi");
  $CurrentTime=time();
  $DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);

  if(empty($PostTitle)){
    $_SESSION["ErrorMessage"]= "Title Cant be empty";
    Redirect_to("AddNewPost.php");
  }elseif (strlen($PostTitle)<5) {
    $_SESSION["ErrorMessage"]= "Post Title should be greater than 5 characters";
    Redirect_to("AddNewPost.php");
  }elseif (strlen($PostText)>9999) {
    $_SESSION["ErrorMessage"]= "Post Description should be less than than 1000 characters";
    Redirect_to("AddNewPost.php");
  }else{
    // Query to insert Post in DB When everything is fine
    global $ConnectingDB;
    $sql = "INSERT INTO posts(datetime,title,category,author,image,image2,image3,image4,image5,image6,image7,post)";
    $sql .= "VALUES(:dateTime,:postTitle,:categoryName,:adminName,:imageName,:imageName2,:imageName3,:imageName4,:imageName5,:imageName6,:imageName7,:postDescription)";
    $stmt = $ConnectingDB->prepare($sql);
    $stmt->bindValue(':dateTime',$DateTime);
    $stmt->bindValue(':postTitle',$PostTitle);
    $stmt->bindValue(':categoryName',$Category);
    $stmt->bindValue(':adminName',$Admin);
    $stmt->bindValue(':imageName',$Image);
    $stmt->bindValue(':imageName2',$Image2);
    $stmt->bindValue(':imageName3',$Image3);
    $stmt->bindValue(':imageName4',$Image4);
    $stmt->bindValue(':imageName5',$Image5);
    $stmt->bindValue(':imageName6',$Image6);
    $stmt->bindValue(':imageName7',$Image7);
    $stmt->bindValue(':postDescription',$PostText);
    $Execute=$stmt->execute();

  if($Execute){
  $_SESSION["SuccessMessage"]="Post Added Successfully";
  Redirect_to("AddNewPost.php");
  }else{
  $_SESSION["ErrorMessage"]="Something Went Wrong. Try Again !";
  Redirect_to("AddNewPost.php");
    
  }
  }
} //Ending of Submit Button If-Condition
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="Css/Styles.css">
  <title>Add New Post</title>
</head>
<body>
  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a href="admin_panel/Dashboard.php" class="navbar-brand"> DOREEN</a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarcollapseCMS">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarcollapseCMS">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a href="MyProfile.php" class="nav-link"> <i class="fas fa-user text-success"></i> My Profile</a>
        </li>
        <li class="nav-item">
          <a href="Dashboard.php" class="nav-link">Dashboard</a>
        </li>
        <li class="nav-item">
          <a href="Posts.php" class="nav-link">Posts</a>
        </li>
        <li class="nav-item">
          <a href="Categories.php" class="nav-link">Categories</a>
        </li>
        <li class="nav-item">
          <a href="Admins.php" class="nav-link">Manage Admins</a>
        </li>
        <li class="nav-item">
          <a href="Comments.php" class="nav-link">Comments</a>
        </li>
                        <li class="nav-item">
          <a href="messages.php" class="nav-link">Messages</a>
        </li>
        <li class="nav-item">
          <a href="../index.php?page=1" class="nav-link" target="_blank">Live Blog</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a href="Logout.php" class="nav-link text-danger">
          <i class="fas fa-user-times"></i> Logout</a></li>
      </ul>
      </div>
    </div>
  </nav>
    <div style="height:10px; background:#27aae1;"></div>
    <!-- NAVBAR END -->
    <!-- HEADER -->
    <header class="bg-dark text-white py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
          <h1><i class="fas fa-edit" style="color:#27aae1;"></i> Add New Post</h1>
          </div>
        </div>
      </div>
    </header>
    <!-- HEADER END -->

     <!-- Main Area -->
<section class="container py-2 mb-4">
  <div class="row">
    <div class="offset-lg-1 col-lg-10" style="min-height:400px;">
      <?php
       echo ErrorMessage();
       echo SuccessMessage();
       ?>
      <form class="" action="AddNewPost.php" method="post" enctype="multipart/form-data">
        <div class="card bg-secondary text-light mb-3">
          <div class="card-body bg-dark">
            <div class="form-group">
              <label for="title"> <span class="FieldInfo"> Post Title: </span></label>
               <input class="form-control" type="text" name="PostTitle" id="title" placeholder="Type title here" value="">
            </div>
            <div class="form-group">
              <label for="CategoryTitle"> <span class="FieldInfo"> Choose Categroy </span></label>
               <select class="form-control" id="CategoryTitle"  name="Category">
                 <?php
                 //Fetchinng all the categories from category table
                 global $ConnectingDB;
                 $sql = "SELECT id,title FROM category";
                 $stmt = $ConnectingDB->query($sql);
                 while ($DataRows = $stmt->fetch()) {
                   $Id = $DataRows["id"];
                   $CategoryName = $DataRows["title"];
                  ?>
                  <option> <?php echo $CategoryName; ?></option>
                  <?php } ?>
               </select>
            </div>
            <div class="form-group">
              <div class="custom-file">
              <input class="custom-file-input" type="File" name="Image" id="imageSelect" value="">
              <label for="imageSelect" class="custom-file-label">Select Image </label>
              </div>
            </div>
                        <div class="form-group">
              <div class="custom-file">
              <input class="custom-file-input" type="File" name="Image2" id="imageSelect2" value="">
              <label for="imageSelect" class="custom-file-label">Select Image </label>
              </div>
            </div>
                        <div class="form-group">
              <div class="custom-file">
              <input class="custom-file-input" type="File" name="Image3" id="imageSelect3" value="">
              <label for="imageSelect" class="custom-file-label">Select Image </label>
              </div>
            </div>
                                    <div class="form-group">
              <div class="custom-file">
              <input class="custom-file-input" type="File" name="Image4" id="imageSelect4" value="">
              <label for="imageSelect" class="custom-file-label">Select Image </label>
              </div>
            </div>
                                    <div class="form-group">
              <div class="custom-file">
              <input class="custom-file-input" type="File" name="Image5" id="imageSelect5" value="">
              <label for="imageSelect" class="custom-file-label">Select Image </label>
              </div>
            </div>
                                    <div class="form-group">
              <div class="custom-file">
              <input class="custom-file-input" type="File" name="Image6" id="imageSelect6" value="">
              <label for="imageSelect" class="custom-file-label">Select Image </label>
              </div>
            </div>
                                    <div class="form-group">
              <div class="custom-file">
              <input class="custom-file-input" type="File" name="Image7" id="imageSelect7" value="">
              <label for="imageSelect" class="custom-file-label">Select Image </label>
              </div>
            </div>
            <div class="form-group">
              <label for="Post"> <span class="FieldInfo"> Post: </span></label>
              <textarea class="form-control" id="Post" name="PostDescription" rows="8" cols="80"></textarea>
            </div>
            <div class="row">
              <div class="col-lg-6 mb-2">
                <a href="Dashboard.php" class="btn btn-warning btn-block"><i class="fas fa-arrow-left"></i> Back To Dashboard</a>
              </div>
              <div class="col-lg-6 mb-2">
                <button type="submit" name="Submit" class="btn btn-success btn-block">
                  <i class="fas fa-check"></i> Publish
                </button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>

</section>



    <!-- End Main Area -->
    <!-- FOOTER -->
    <footer class="bg-primary text-white">
      <div class="container">
        <div class="row">
          <div class="col">
          <p class="lead text-center">Doreen | blog posts | <span id="year"></span> &copy; ----All right Reserved.</p>
           </div>
         </div>
      </div>
    </footer>
    <!-- FOOTER END-->

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script>
  $('#year').text(new Date().getFullYear());
</script>
</body>
</html>
