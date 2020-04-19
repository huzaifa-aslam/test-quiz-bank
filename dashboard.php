
<?php
  include('includes/dbconn.php');
  
  session_start();
 
  if(isset($_SESSION['user_id']))
  {
      $id=$_SESSION['user_id'];
       $author_query="SELECT * FROM `users` WHERE `uid`='$id'";
        $run_author_query=mysqli_query($conn, $author_query);
        $author_data=mysqli_fetch_assoc($run_author_query);
        $author_name=$author_data['name'];
        $user_image=$author_data['image'];
        $user_status=$author_data['status'];


  }
  if($user_status=="student")
  {
    echo "<script>alert('You can just logout')</script>";
    echo "<script>window.open('group_chat.php','_SELF')</script>";
  }


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>DashBoard</title>
  <meta charset="utf-8">
   <link rel="stylesheet" href="css/custom.css">
  <!--  <link rel="stylesheet" href="js/style.css">
 -->    
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet">
  <style>
  body{
    margin: 0px;
  }
    @keyframes slidy {
    0% { left: 0%; }
    20% { left: 0%; }
    25% { left: -100%; }
    45% { left: -100%; }
    50% { left: -200%; }
    70% { left: -200%; }
    75% { left: -300%; }
    95% { left: -300%; }
    100% { left: -400%; }
    }
    #slider { overflow: hidden; }
#slider figure img { width: 20%; float: left; max-height: 550px; }
#slider figure { 
  position: relative;
  width: 500%;
  margin: 0;
  left: 0;
  text-align: left;
  font-size: 0;
  animation: 30s slidy infinite; 
}


#slider .icon-bar {
  width: 90px;
  background-color: #555;
  position: absolute;
   top:50px;
}

#slider .icon-bar a {
  display: block;
  text-align: center;
  padding: 16px;
  transition: all 0.3s ease;
  color: white;
  font-size: 36px;
}

#slider .icon-bar a:hover {
     background-color: #a52a2a;
  padding-left:70px;
/*transition:2s;*/
   padding-right:50px;
  
 
}

#slider .active {
  background-color: #4CAF50;
}
#slider::before{
      content: "SINDH MADRESSATUL ISLAM UNIVERSITY.";
    position: absolute;
       top: 558px;
    color: white;
    right: 0px;
    left: 158px;
    z-index: 100px;
    z-index: 100;
        font-size: 37px;
}

  </style>
</head>
<body>
<!-- <section id="header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><img src="img/logo.png" class="img-responsive" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="sign_in_and_up.php">About Us</a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Departments
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Computer Science.</a>
          <a class="dropdown-item" href="#">Business Administration.</a>
          <a class="dropdown-item" href="#">Media Studies.</a>
          <a class="dropdown-item" href="#">Environmental Science.</a>
        </div>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="sign_in_and_up.php">Students.</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="sign_in_and_up.php">Resources.</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="sign_in_and_up.php">Sign In/Sign Up</a>
      </li>

    </ul>

     <form class="form-inline pull-left">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
     </form>
  </div>
</nav>

      </div>
    </div >
  </div>
</section> -->
<?php include('includes/menu.php');?>
<?php include('includes/marquee_tag.php');?>
<section id="slider">
      <div class="row">
     
      <div class=" col-xs-12 col-sm-12">
          <figure>
          <img src="img/slider_3.jpg" alt class="img-responsive" >
          <img src="img/slider_2.jpg" alt class="img-responsive">
          <img src="img/slider_1.jpg" alt>
          <img src="img/slider_4.jpg" alt class="img-responsive">
          <img src="img/slider_5.jpg" alt>
          </figure>
          <div class="icon-bar">
            <a class="active" href="#"><i class="fa fa-home"></i></a> 
            <a href="#" style="    background-color: #3b579d;"><i class="fa fa-facebook-f"></i></a> 
            <a href="#" style="    background-color:#e5281a" ><i class="fa fa-youtube"></i></a> 
            <a href="#" style="    background-color:#2caae1" ><i class="fa fa-twitter-square"></i></a>
           <!--  <a href="#"><i class="fa fa-trash"></i></a> -->

          </div>
        
      </div>
      </div>

</section>

 <?php
  include('includes/footer.php');
 ?>


</body>
</html>