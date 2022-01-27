   <?php require_once("Includes/DB.php"); ?>
   <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="Css/Styles.css">
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
  <title>Contact Us Page</title>

</head>
<body>
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
      </div>
    </div>
  </nav>
<br><br><br><br>
    <section id="contact">

        <div class="content-box-md">

            <div class="container">

                <div class="row">

                    <div class="col-md-6">

                        <!-- Contact Left -->
                        <div id="contact-left">

                            <div class="vertical-heading">
                                <h5>Who We Are</h5>
                                <h2>Get<br>In <strong>Touch</strong></h2>
                            </div>
                            <p>Here you can write something positive to let your followers know that your happy to respond to their requests.</p>

                            <div id="offices">

                                <div class="row">

                                    <div class="col-md-6">

                                        <div class="office">
                                            <h4>Thika</h4>
                                            <ul class="office-details">
                                                <li><i class="fa fa-mobile"></i> <span>+254701439926</span></li>
                                                <li><i class="fa fa-envelope"></i> <span>ndirangupeter6000@gmail.com</span></li>
                                                <li><i class="fa fa-map-marker"></i> <span>Phase 10 Building,<br>     2ND floor, Room NO 24 <br>Thika, Kenya</span></li>
                                            </ul>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="col-md-6">
                        <!-- Contact Right -->
                        <div id="contact-right">
                           
                            <form method="post">
                                <h4>Send Message</h4>
                                <p>Please contact us for clarifacation on the services we offer or any inquiries.</p>

                                <div class="row">

                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" id="email" placeholder="Email Address" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone No." required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="text" name="subject" class="form-control" id="subject" placeholder="Subject" required>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="message" id="message" placeholder="Message" required></textarea>
                                </div>

                                <div id="submit-btn">
                                    <button type="submit" class="btn btn-primary form-control" name="submit_message">Submit</button>
                                </div>

                            </form>

<?php

if(isset($_POST['submit_message'])){

    $name = $_POST["name"];

    $email = $_POST["email"];

    $phone = $_POST["phone"];

    $subject = $_POST["subject"];

    $message = $_POST["message"];
global $ConnectingDB;

$insert_messages="INSERT INTO messages(name,email,phone,subject,message) values('$name','$email','$phone','$subject','$message')";

$stmt = $ConnectingDB->prepare($insert_messages);
$Execute = $stmt -> execute();

if($Execute){
    
echo "<script>alert('Your message has been sent successfully.');</script>";

echo "<script>window.open('index.php','_self');</script>";
    
}

}
 
?>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>
    <!-- Contact Ends -->
    <br><br><br><br>
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