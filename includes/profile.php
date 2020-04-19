<?php
  include('dbconn.php');
  session_start();
  if(isset($_SESSION['user_id']))
  {
    $getid=$_SESSION['user_id'];

  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>mcqs</title>
   <link rel="stylesheet" href="../css/custom.css"> 
  <script src=js/style.js></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
  <section id="header">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><img src="../img/logo.png" class="img-responsive" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="sign_in_and_up.php">About Us</a>
      </li>
  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Insert Question
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="mcqs.php">Mcqs.</a>
          <a class="dropdown-item" href="long_question.php">Long Question.</a>
          <a class="dropdown-item" href="short_question.php">Short Question.</a>
          
        </div>
      </li>
     
       <li class="nav-item">
        <a class="nav-link" href="past_papers.php">Past papers</a>
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
</section>
  <section>
    <div class="container">
      <div>
        <div>
          <?php echo $getid?>
        </div>
      </div>
    </div>
  </section>
</body>
</html>
<?php
  //mcqs start
  
  //mcqs end
?>