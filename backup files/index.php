<!DOCTYPE html>
<html lang="en">
<head>
  <title>Quiz Bank</title>
  <meta charset="utf-8">
   <link rel="stylesheet" href="css/custom.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>

  </style>
</head>
<body>
<section id="header">
  <div class="container">
    <div class="row">
      <div class="col-md-2">
         <a class="navbar-brand" href="#"><img src="img/logo.png" alt="Smiley face" class="img-responsive "></a>
      </div>
      <div class="col-md-4 " >
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
 
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
    
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
    </ul>
     
  </div>
</nav>
      </div>
     
                <div class="col-md-6 sign_in_form">
        <form action="">

               <input type="email" name="email" value="" placeholder="Email">
           

               <input id="password-field" type="password"  name="password" placeholder="password">
              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
              <button class="button"><span>LogIn </span></button>
           
         
             
        </form>

        </div>
          </div >
  </div>
</section>
<section id="marquee">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <marquee behavior="" direction=""><h5>
          Sindh Madressatul Islam University One Of The Oldest Institutes In Pakistan.
        </h5></marquee>
      </div >
     </div >
  </div>
</section>
<section id="sign_up_form">
  <div class="container">
    <div class="row">
       <div class="col-md-6">
        

          


      </div >
      <div class="col-md-6">
          
  <div class="arrow_design"></div>
          


      </div >
     </div >
  </div>
</section>



<script>
$(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
</script>

</body>
</html>