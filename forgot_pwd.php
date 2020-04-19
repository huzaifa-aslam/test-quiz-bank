<?php
  include('includes/dbconn.php');
  
  session_start();
 
  if(isset($_SESSION['user_id']))
  {
      $id=$_SESSION['user_id'];
       $author_query="SELECT `name` FROM `users` WHERE `uid`='$id'";
        $run_author_query=mysqli_query($conn, $author_query);
        $author_data=mysqli_fetch_assoc($run_author_query);
        $author_name=$author_data['name'];
        //$user_email=$author_data['email'];
        //$user_image=$author_data['image'];


  }

  


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Forgot Password</title>
</head>
<body>
  
  <section id="forgot_pwd">
    <div class="row">
      <div class="container">
        <div class="col-md-12">
          <center>
            <form action="forgot_pwd.php" method="POST">
             <table>
                <tr>
                  <td><input type="email" placeholder="Enter Your Email..." name="email"></td>
              
                </tr>
                 <tr>
                  <td> <button name="search" value="search">Search</button></td>
                 
                </tr>
              </table>
            </form>

        </center>
        <?php
          if(isset($_POST['search']))
    {
     
      $email=$_POST['email'];
      $select_query="SELECT * FROM `users` WHERE `email`='$email' ";
      $run_select=mysqli_query($conn,$select_query);
      $data=mysqli_fetch_assoc($run_select);
     // $_SESSION['user_id']=$data['uid'];
      //$get_uid=$_SESSION['user_id'];
      if(mysqli_num_rows($run_select)>1)
      {
       
        // echo "<script>alert('welcome')</script>";
        $_SESSION['user_id']=$data['uid'];
        $get_uid=$_SESSION['user_id'];

         $update_login="UPDATE `users` SET `last_login`=NOW() WHERE `uid`='$get_uid'";
         $run_update_login=mysqli_query($conn,$update_login);
        // header('location:dashboard.php');
        
         ?>
            <center>
            <form action="" method="POST">
             <table>
                <tr>
                  <td><input type="password" name="password" placeholder="Enter New password..." ></td>

                </tr>
                  <tr>
                  <td> <button name="update" value="update">Update</button></td>
                 
                </tr>
              </table>
            </form>

        </center>
         <?php
        
       }
          
        else
          {
            echo "<script>alert('Email is not Matched !! try again')</script>";
             echo "<script>window.open('forgot_pwd.php','_SELF')</script>";

          }

            
          }if(isset($_POST['update']))
          {
           
            $password=$_POST['password'];
            $update="UPDATE `users` SET `password`='$password' WHERE `email`='$user_email'";
        
            $run_update=mysqli_query($conn,$update);
            if($run_update==true){
              echo "<script>alert('Password is changed!!')</script>";
             // echo "<script>window.open('forgot_pwd.php','_SELF')</script>";

              //header('location:dashboard.php');
            }
                  else
            {
              echo "<script>alert('Password is not changed !! try again')</script>";
               echo "<script>window.open('forgot_pwd.php','_SELF')</script>";

            }

   }
        
     
      

            ?>
        </div>

      </div>
    </div>
  </section>
 
</body>
</html>
  