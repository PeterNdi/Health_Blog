<?php require_once("Includes/DB.php"); ?>
<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="Css/Styles.css">
  <title>Blog Page</title>
  <style media="screen">
  .heading{
      font-family: Bitter,Georgia,"Times New Roman",Times,serif;
      font-weight: bold;
       color: #005E90;
  }
  .heading:hover{
    color: #0090DB;
  }
  </style>
</head>
<body>
  <!-- NAVBAR -->
  <nav class="navbar navbar-fixed-top navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a href="index.php?page=1" class="navbar-brand"> DOREEN</a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarcollapseCMS">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarcollapseCMS">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a style="color: #FFFFFF;" href="index.php?page=1" class="nav-link">Home</a>
        </li>
        <li class="nav-item">
          <a style="color: #FFFFFF;" href="contact.php" class="nav-link">Contact Us</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <form class="form-inline d-none d-sm-block" action="index.php">
          <div class="form-group">
          <input class="form-control mr-2" type="text" name="Search" placeholder="Search here"value="">
          <button  class="btn btn-primary" name="SearchButton">Go</button>
          </div>
        </form>
      </ul>
      </div>
    </div>
  </nav>
    <!-- NAVBAR END -->
    <!-- HEADER -->
    <div class="container">
      <div class="row mt-4">

        <!-- Main Area Start-->
        <div class="col-sm-8 ">
          <h2>This is where you wire the title of your blog</h2>
          <h1 class="lead">The subtitle follows here</h1>
          <?php
           echo ErrorMessage();
           echo SuccessMessage();
           ?>
          <?php
          global $ConnectingDB;
          // SQL query when Searh button is active
          if(isset($_GET["SearchButton"])){
            $Search = $_GET["Search"];
            $sql = "SELECT * FROM posts
            WHERE datetime LIKE :search
            OR title LIKE :search
            OR category LIKE :search
            OR post LIKE :search";
            $stmt = $ConnectingDB->prepare($sql);
            $stmt->bindValue(':search','%'.$Search.'%');
            $stmt->execute();
          }// Query When Pagination is Active i.e index.php?page=1
          elseif (isset($_GET["page"])) {
            $Page = $_GET["page"];
            if($Page==0||$Page<1){
            $ShowPostFrom=0;
          }else{
            $ShowPostFrom=($Page*5)-5;
          }
            $sql ="SELECT * FROM posts ORDER BY id desc LIMIT $ShowPostFrom,5";
            $stmt=$ConnectingDB->query($sql);
          }
          // Query When Category is active in URL Tab
          elseif (isset($_GET["category"])) {
            $Category = $_GET["category"];
            $sql = "SELECT * FROM posts WHERE category='$Category' ORDER BY id desc";
            $stmt=$ConnectingDB->query($sql);
          }

          // The default SQL query
          else{
            $sql  = "SELECT * FROM posts ORDER BY id desc LIMIT 0,3";
            $stmt =$ConnectingDB->query($sql);
          }
          while ($DataRows = $stmt->fetch()) {
            $PostId          = $DataRows["id"];
            $DateTime        = $DataRows["datetime"];
            $PostTitle       = $DataRows["title"];
            $Category        = $DataRows["category"];
            $Admin           = $DataRows["author"];
            $Image           = $DataRows["image"];
            $Image2           = $DataRows["image2"];
            $Image3           = $DataRows["image3"];
            $Image4           = $DataRows["image4"];
            $Image5          = $DataRows["image5"];
            $Image6           = $DataRows["image6"];
            $Image7           = $DataRows["image7"];
            $PostDescription = $DataRows["post"];
          ?>

          <div class="card">
                      <div id="myCarousel" class="carousel slide" ><!-- carousel slide Starts -->

            <ol class="carousel-indicators"><!-- carousel-indicators Starts -->

                <?php if(!empty($Image)){ ?>

<li data-target="#myCarousel" data-slide-to="0"  class="active"></li>
<?php } ?> 



              <?php if(!empty($Image2)){ ?>

                 <li data-target="#myCarousel" data-slide-to="1"></li>

             <?php } ?>

              <?php if(!empty($Image3)){ ?>

             <li data-target="#myCarousel" data-slide-to="2"></li>

               <?php } ?>
                             <?php if(!empty($Image4)){ ?>

             <li data-target="#myCarousel" data-slide-to="3"></li>

               <?php } ?>
                             <?php if(!empty($Image5)){ ?>

             <li data-target="#myCarousel" data-slide-to="4"></li>

               <?php } ?>
                             <?php if(!empty($Image6)){ ?>

             <li data-target="#myCarousel" data-slide-to="5"></li>

               <?php } ?>
                             <?php if(!empty($Image7)){ ?>

             <li data-target="#myCarousel" data-slide-to="6"></li>

               <?php } ?>

                </ol><!-- carousel-indicators Ends -->
                <div class="carousel-inner"><!-- carousel-inner Starts  -->
                  <?php if(!empty($Image)){ ?>
                  <div class="carousel-item active"><!--- carousel-item active Starts -->
            <img src="Uploads/<?php echo htmlentities($Image); ?>" style="max-height:450px;" class="img-fluid card-img-top" />
          </div>
          <?php } ?>

          <?php if(!empty($Image2)){ ?>

<div class="carousel-item"><!-- carousel-item Starts -->

 <img src="Uploads/<?php echo htmlentities($Image2); ?>" style="max-height:450px;" class="img-fluid card-img-top" />

</div><!-- carousel-item Ends -->

<?php } ?>
          <?php if(!empty($Image3)){ ?>

<div class="carousel-item"><!-- carousel-item Starts -->

 <img src="Uploads/<?php echo htmlentities($Image3); ?>" style="max-height:450px;" class="img-fluid card-img-top" />

</div><!-- carousel-item Ends -->

<?php } ?>
          <?php if(!empty($Image4)){ ?>

<div class="carousel-item"><!-- carousel-item Starts -->

 <img src="Uploads/<?php echo htmlentities($Image4); ?>" style="max-height:450px;" class="img-fluid card-img-top" />

</div><!-- carousel-item Ends -->

<?php } ?>
          <?php if(!empty($Image5)){ ?>

<div class="carousel-item"><!-- carousel-item Starts -->

 <img src="Uploads/<?php echo htmlentities($Image5); ?>" style="max-height:450px;" class="img-fluid card-img-top" />

</div><!-- carousel-item Ends -->

<?php } ?>
          <?php if(!empty($Image6)){ ?>

<div class="carousel-item"><!-- carousel-item Starts -->

 <img src="Uploads/<?php echo htmlentities($Image6); ?>" style="max-height:450px;" class="img-fluid card-img-top" />

</div><!-- carousel-item Ends -->

<?php } ?>
          <?php if(!empty($Image7)){ ?>

<div class="carousel-item"><!-- carousel-item Starts -->

 <img src="Uploads/<?php echo htmlentities($Image7); ?>" style="max-height:450px;" class="img-fluid card-img-top" />

</div><!-- carousel-item Ends -->

<?php } ?>
            </div>
            <a class="carousel-control-prev slide-nav slide-right" href="#myCarousel" data-slide="prev">

<span class="carousel-control-prev-icon carousel-icon"></span>

</a>

<a class="carousel-control-next slide-nav slide-left" href="#myCarousel" data-slide="next">

<span class="carousel-control-next-icon carousel-icon"></span>

</a>
          </div>
            <div class="card-body">
              <h4 class="card-title"><?php echo htmlentities($PostTitle); ?></h4>
              <small class="text-muted">Category: <span class="text-dark"> <a href="index.php?category=<?php echo htmlentities($Category); ?>"> <?php echo htmlentities($Category); ?> </a></span> & Written by <span class="text-dark"> <a href="Profile.php?username=<?php echo htmlentities($Admin); ?>"> <?php echo htmlentities($Admin); ?></a></span> On <span class="text-dark"><?php echo htmlentities($DateTime); ?></span></small>
              <span style="float:right;" class="badge badge-dark text-light">
              :
                 <?php echo ApproveCommentsAccordingtoPost($PostId);?>
              </span>
              <hr>
              <p class="card-text">
                <?php if (strlen($PostDescription)>150) { $PostDescription = substr($PostDescription,0,150)."...";} echo htmlentities($PostDescription); ?></p>
              <a href="FullPost.php?id=<?php echo $PostId; ?>" style="float:right;">
                <span class="btn btn-primary">Read More &rang;&rang; </span>
              </a>
            </div>
          </div>
        
          <br>
          <?php   } ?>
          <!-- Pagination -->
          <nav>
            <ul class="pagination pagination-lg">
              <!-- Creating Backward Button -->
              <?php if( isset($Page) ) {
                if ( $Page>1 ) {?>
             <li class="page-item">
                 <a href="index.php?page=<?php  echo $Page-1; ?>" class="page-link">&laquo;</a>
               </li>
             <?php } }?>
            <?php
            global $ConnectingDB;
            $sql           = "SELECT COUNT(*) FROM posts";
            $stmt          = $ConnectingDB->query($sql);
            $RowPagination = $stmt->fetch();
            $TotalPosts    = array_shift($RowPagination);
            // echo $TotalPosts."<br>";
            $PostPagination=$TotalPosts/5;
            $PostPagination=ceil($PostPagination);
            // echo $PostPagination;
            for ($i=1; $i <=$PostPagination ; $i++) {
              if( isset($Page) ){
                if ($i == $Page) {  ?>
              <li class="page-item active">
                <a href="index.php?page=<?php  echo $i; ?>" class="page-link"><?php  echo $i; ?></a>
              </li>
              <?php
            }else {
              ?>  <li class="page-item">
                  <a href="index.php?page=<?php  echo $i; ?>" class="page-link"><?php  echo $i; ?></a>
                </li>
            <?php  }
          } } ?>
          <!-- Creating Forward Button -->
          <?php if ( isset($Page) && !empty($Page) ) {
            if ($Page+1 <= $PostPagination) {?>
         <li class="page-item">
             <a href="index.php?page=<?php  echo $Page+1; ?>" class="page-link">&raquo;</a>
           </li>
         <?php } }?>
            </ul>
          </nav>
        </div>
        <!-- Main Area End-->

        <!-- Side Area Start -->
        <div class="col-sm-4">
          
          <br>
          <br>
          <div class="card">
            <div class="card-header bg-primary text-light">
              <h2 class="lead">Categories</h2>
              </div>
              <div class="card-body">
                <?php
                global $ConnectingDB;
                $sql = "SELECT * FROM category ORDER BY id desc";
                $stmt = $ConnectingDB->query($sql);
                while ($DataRows = $stmt->fetch()) {
                  $CategoryId = $DataRows["id"];
                  $CategoryName=$DataRows["title"];
                 ?>
                <a href="index.php?category=<?php echo $CategoryName; ?>"> <span class="heading"> <?php echo $CategoryName; ?></span> </a><br>
               <?php } ?>
            </div>
          </div>
          <br>
          <div class="card">
            <div class="card-header bg-primary text-light">
              <h2 class="lead"> Recent Posts</h2>
            </div>
            <div class="card-body">
              <?php
              global $ConnectingDB;
              $sql= "SELECT * FROM posts ORDER BY id desc LIMIT 0,5";
              $stmt= $ConnectingDB->query($sql);
              while ($DataRows=$stmt->fetch()) {
                $Id     = $DataRows['id'];
                $Title  = $DataRows['title'];
                $DateTime = $DataRows['datetime'];
                $Image = $DataRows['image'];
              ?>
              <div class="media">
                <img src="Uploads/<?php echo htmlentities($Image); ?>" class="d-block img-fluid align-self-start"  width="90" height="94" alt="">
                <div class="media-body ml-2">
                <a style="text-decoration:none;"href="FullPost.php?id=<?php echo htmlentities($Id) ; ?>" target="_blank">  <h6 class="lead"><?php echo htmlentities($Title); ?></h6> </a>
                  <p class="small"><?php echo htmlentities($DateTime); ?></p>
                </div>
              </div>
              <hr>
              <?php } ?>
            </div>
          </div>

        </div>
        <!-- Side Area End -->


      </div>

    </div>

    <!-- HEADER END -->
<br>
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
