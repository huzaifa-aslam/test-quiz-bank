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
        $last_login=$author_data['last_login'];



  }


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Group Chat</title>
    <link rel="stylesheet" href="css/custom.css"> 
  <script src=js/style.js></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src= 
"https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> 
    </script> 
    <script>
       <script> 
        $(document).ready(function() { 
            $("button").click(function() { 
                $(document).scrollTop($(document).height()); 
            }); 
        }); 
    </script> 
    </script>
</head>
<body>
  <section id="group_chat "  class="txt_align">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <li class="nav-item active">
            <a class="nav-link my_button" href="dashboard.php">Home <span class="sr-only">(current)</span></a>
          </li>

        </div>
        <div class="col-md-6 post_area " style="overflow: scroll; height: 500px;">
          <form action="group_chat.php" method="POST" class="" style="position: fixed; top:500px;">
          <table>
            <tr>
              <td>
                 <textarea class="box_shdow" name="post" id="" cols="70" placeholder="Write a Post..." rows="2"></textarea>
              </td>
            </tr>
            <tr>
              <td>
                 <button name="send" class="my_button">Post</button>
              </td>
            </tr>
          </table>
          </form>
         <!-- groutp_chat inserting start-->
            <?php
               if(isset($_POST['send']))
                {
                  $post=$_POST['post'];
                  
                   $post_query="INSERT INTO `group_chat`(`user_id`,`name`,`image`, `post`, `post_time`) VALUES ('$id','$author_name','$user_image','$post',NOW())";
                    $run_post_queru=mysqli_query($conn, $post_query);
                    if($run_post_queru==false)
                    {
                       echo "<h4 class='my_heading' style='margin-top:15px;width: 435px;'>Posted is not to Timeline.</h4>";
                     

                    }
                    else
                    {
                       //echo "<h4class='my_heading' style='margin-top:15px; width: 435px;'>Mcqs is not added.</h4>";
                        echo "<script>window.open('group_chat.php','_SELF')</script>";
                       
                    }

                }
            ?>
         <!-- group_chat inserting end -->
            <?php
            $displat_post="SELECT * FROM `group_chat` ORDER BY 1 DESC";
            $run_dis_post=mysqli_query($conn,$displat_post);
            while ($post_data=mysqli_fetch_assoc($run_dis_post)) {
              $user_post=$post_data['post'];
              $post_time=$post_data['post_time'];
              $name=$post_data['name'];
              $image=$post_data['image'];

              ?>
               <div class="">
                  <table class="text_left margin_15px">
                <tr>
                  <td>
                    <img src='img/<?php echo $image;?>' class='user_img' width='50px' style="border-radius: 55px;"  height='50px' class='img-responsive img-rounded'>
                  </td>
                </tr>
                <tr>
                   <td>
                    <?php echo $name;?>
                  </td>
                </tr>
                <tr>
                  <td>
                    <?php echo $post_time;?>
                  </td>
                </tr>
               
                <tr>
                  <td>
                    <?php echo $user_post;?>
                  </td>
                </tr>
              </table>
               </div>
               
             
              <?php
            }
          ?>
        </div>
        <div id="" class="col-md-3 ">
           <li class="nav-item">
            <a class="nav-link my_button" href="logout.php">Logout</a>
          </li>
          
        </div>
      </div>
    </div>
  </section>

</body>
</html>