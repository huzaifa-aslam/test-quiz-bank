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
        $email=$author_data['email'];
        $password=$author_data['password'];
        $user_image=$author_data['image'];
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit Profile</title>
	<link rel="stylesheet" href="css/custom.css"> 
  <script src=js/style.js></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style>
	
</style>
</head>
<body>
	<?php include('includes/menu.php');?>
	<?php include('includes/marquee_tag.php');?>

	<section id="edit_profile" class="margin_20px">
		<div class="container">
			<div class="row">
				<div class="col-md-6 mcqs_background"></div>

				<div class="col-md-6">
					<form action="edit_profile.php" method="POST" enctype="multipart/form-data">
						<center>
					<ul>
						<h4 class="my_heading">Your Profile</h4>
						<li><img src="img/<?php echo $user_image?>" alt="" width= 168px;" class="img-rounded img-responsive" ></li>
						<li>Name : <input required="required" type="text" name="name" value="<?php echo $author_name;?>" class="box_shdow"></li>
						<li>Email : <input type="text" name="email" value="<?php echo $email;?>" class="box_shdow" disabled></li>
						<li>Password : <input required="required" type="password" name="password" value="<?php echo $password;?>" class="box_shdow"></li>
						<li><input type="file" name="user_image" required="required"></li>
						<li><button class="my_button" name="update">Update</button></li>
					</ul>
					</center>
					</form>
					<?php
						 if(isset($_POST['update']))
						    {
						      $password=$_POST['password'];
						       $name=$_POST['name'];
						      $user_image=$_FILES['user_image']['name'];
						      $tmp_img_name=$_FILES['user_image']['tmp_name'];
						      move_uploaded_file($tmp_img_name, "img/$user_image");
						      $select_query="UPDATE `users` SET `name`='$name',`password`='$password',`image`='$user_image' WHERE `uid`='$id'";
						      $run_select=mysqli_query($conn,$select_query);
						     
						   
						      if($run_select==true)
						      {
						       
						        // echo "<script>alert('welcome')</script>";
						         $update_login="UPDATE `users` SET `last_login`=NOW() WHERE `uid`='$id'";
						         $run_update_login=mysqli_query($conn,$update_login);
						         //header('location:index.php');
						         echo "<script>winow.alert('edit_profile.php','_SELF')</script>";
						         
						        
						      }
						      else
						      {
						        echo "<script>alert('Sorry not Updated !! try again')</script>";
						         echo "<script>winow.alert('edit_profile.php','_SELF')</script>";

						      }
						      

						    }
					?>
				</div>
			</div>
		</div>
	</section>










	   <?php include('includes/footer.php');?>
</body>
</html>