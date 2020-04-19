<section id="header">
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
        <a class="nav-link" href="dashboard.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="group_chat.php">Chat</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="mcqs.php?uid=<?php echo $id;?>">Mcqs.</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="long_question.php?uid=<?php echo $id;?>">Long Question.</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="short_question.php?uid=<?php echo $id;?>">Short Question.</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="create_paper.php?uid=<?php echo $id;?>">Paper</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="past_papers.php">Past papers</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>

    

    </ul>

 <!--     <form class="form-inline pull-left">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
     </form> -->
  </div>
  <?php
echo "<a href='edit_profile.php'><img src='img/$user_image' title='$author_name' style='width:76px;border-radius: 100%; height:69px;' class='img-responsive img-circle user_img'></a>";
  ?>
  
</nav>

      </div>
    </div >
  </div>
</section>