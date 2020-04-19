<?php
  include('includes/dbconn.php');


  session_start();
  if(isset($_SESSION['user_id']))
  {
    $id=$_SESSION['user_id'];
    // header('location:dashboard.php');
  }
?>
<html>
<head>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet">

<style>

  
@import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

* {
  box-sizing: border-box;
}

body {
  background: #f6f5f7;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  font-family: 'Montserrat', sans-serif;
  height: 100vh;
  margin: -20px 0 50px;
}

h1 {
  font-weight: bold;
  margin: 0;
}

h2 {
  text-align: center;
}

p {
  font-size: 14px;
  font-weight: 100;
  line-height: 20px;
  letter-spacing: 0.5px;
  margin: 20px 0 30px;
}

span {
  font-size: 12px;
}

a {
  color: #333;
  font-size: 14px;
  text-decoration: none;
  margin: 15px 0;
}

button {
  border-radius: 20px;
  border: 1px solid #FF4B2B;
  background-color: #FF4B2B;
  color: #FFFFFF;
  font-size: 12px;
  font-weight: bold;
  padding: 12px 45px;
  letter-spacing: 1px;
  text-transform: uppercase;
  transition: transform 80ms ease-in;
}

button:active {
  transform: scale(0.95);
}

button:focus {
  outline: none;
}

button.ghost {
  background-color: transparent;
  border-color: #FFFFFF;
}

form {
  background-color: #FFFFFF;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  padding: 0 50px;
  height: 100%;
  text-align: center;
}

input {
  background-color: #eee;
  border: none;
  padding: 12px 15px;
  margin: 8px 0;
  width: 100%;
}

.container {
  background-color: #fff;
  border-radius: 10px;
    box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
      0 10px 10px rgba(0,0,0,0.22);
  position: relative;
  overflow: hidden;
  width: 768px;
  max-width: 100%;
  min-height: 500px;
}

.form-container {
  position: absolute;
  top: 0;
  height: 100%;
  transition: all 0.6s ease-in-out;
}

.sign-in-container {
  left: 0;
  width: 50%;
  z-index: 2;
}

.container.right-panel-active .sign-in-container {
  transform: translateX(100%);
}

.sign-up-container {
  left: 0;
  width: 50%;
  opacity: 0;
  z-index: 1;
}

.container.right-panel-active .sign-up-container {
  transform: translateX(100%);
  opacity: 1;
  z-index: 5;
  animation: show 0.6s;
}

@keyframes show {
  0%, 49.99% {
    opacity: 0;
    z-index: 1;
  }
  
  50%, 100% {
    opacity: 1;
    z-index: 5;
  }
}

.overlay-container {
  position: absolute;
  top: 0;
  left: 50%;
  width: 50%;
  height: 100%;
  overflow: hidden;
  transition: transform 0.6s ease-in-out;
  z-index: 100;
}

.container.right-panel-active .overlay-container{
  transform: translateX(-100%);
}

.overlay {
  background: #FF416C;
  background: -webkit-linear-gradient(to right, #FF4B2B, #FF416C);
  background: linear-gradient(to right, #FF4B2B, #FF416C);
  background-repeat: no-repeat;
  background-size: cover;
  background-position: 0 0;
  color: #FFFFFF;
  position: relative;
  left: -100%;
  height: 100%;
  width: 200%;
    transform: translateX(0);
  transition: transform 0.6s ease-in-out;
}

.container.right-panel-active .overlay {
    transform: translateX(50%);
}

.overlay-panel {
  position: absolute;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  
  text-align: center;
  top: 0;
  height: 100%;
  width: 50%;
  transform: translateX(0);
  transition: transform 0.6s ease-in-out;
}

.overlay-left {
  transform: translateX(-20%);
}

.container.right-panel-active .overlay-left {
  transform: translateX(0);
}

.overlay-right {
  right: 0;
  transform: translateX(0);
}

.container.right-panel-active .overlay-right {
  transform: translateX(20%);
}

.social-container {
  margin: 20px 0;
}

.social-container a {
  border: 1px solid #DDDDDD;
  border-radius: 50%;
  display: inline-flex;
  justify-content: center;
  align-items: center;
  margin: 0 5px;
  height: 40px;
  width: 40px;
}

footer {
    background-color: #222;
    color: #fff;
    font-size: 14px;
    bottom: 0;
    position: fixed;
    left: 0;
    right: 0;
    text-align: center;
    z-index: 999;
}

footer p {
    margin: 10px 0;
}

footer i {
    color: red;
}

footer a {
    color: #3c97bf;
    text-decoration: none;
}

</style>
</head>
<body>

        
        <div class="container" id="container">
  <div class="form-container sign-up-container">
    <form action="sign_in_and_up.php" method="POST" enctype="multipart/form-data">
      <h1>Create Account</h1>
      <div class="social-container">
        <a href="#" class="social"><i class="fa fa-facebook-f"></i></a>
        <a href="#" class="social"><i class="fa fa-google-plus-g"></i></a>
        <a href="#" class="social"><i class="fa fa-linkedin-in"></i></a>
      </div>
      <span>or use your email for registration</span>
      <input type="text" placeholder="Name" name="user_name" required="required" />
      <input type="email" placeholder="Email"  name="user_email" required="required"/>
      <input type="password" placeholder="Password" name="user_password" required="required"/>
      
     
      <input type="file" placeholder="" required="required" name="user_image"/>
      <button name="sign_up">Sign Up</button>

         </form>
  </div>
  <div class="form-container sign-in-container">
    <form action="dashboard.php" method="POST" >
      <h1>Sign in</h1>
      <div class="social-container">
        <a href="#" class="social"><i class="fa fa-facebook-f"></i></a>
        <a href="#" class="social"><i class="fa fa-google-plus-g"></i></a>
        <a href="#" class="social"><i class="fa fa-linkedin-in"></i></a>
      </div>
      <span>or use your account</span>
      <input type="email" placeholder="Email" name="email" required="required"/>
      <input type="password" placeholder="Password" name="password" required="required"/>
      <a href="#">Forgot your password?</a>
    
      <button name="sign_in">Sign In</button>
    </form>
  </div>
  <div class="overlay-container">
    <div class="overlay">
      <div class="overlay-panel overlay-left">
        <h1>Welcome Back!</h1>
        <p>To keep connected with us please login with your personal info</p>
        <button class="ghost" id="signIn">Sign In</button>
      </div>
      <div class="overlay-panel overlay-right">
        <h1>Hello, Friend!</h1>
        <p>Enter your personal details and start journey with us</p>
        <button class="ghost" id="signUp">Sign Up</button>
      </div>
    </div>
  </div>
</div>



    


<script>

const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
  container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
  container.classList.remove("right-panel-active");
});

</script>
</body>
</html>
<?php

  //sign in start
    if(isset($_POST['sign_in']))
    {
      $password=$_POST['password'];
      $email=$_POST['email'];
      $select_query="SELECT * FROM `users` WHERE `email`='$email' and `password`='$password' ";
      $run_select=mysqli_query($conn,$select_query);
      $data=mysqli_fetch_assoc($run_select);
      $_SESSION['user_id']=$data['uid'];
      $get_uid=$_SESSION['user_id'];
      if(mysqli_num_rows($run_select)==1)
      {
       
        // echo "<script>alert('welcome')</script>";
         $update_login="UPDATE `users` SET `last_login`=NOW() WHERE `uid`='$get_uid'";
         $run_update_login=mysqli_query($conn,$update_login);
         header('location:index.php');
         
        
      }
      else
      {
        echo "<script>alert('Email or/and password are not matched !! try again')</script>";
         echo "<script>winow.alert('sign_in_and_up.php','_SELF')</script>";

      }
      

    }
  //sign in end
  // sign Up start
   if(isset($_POST['sign_up']))
  {
    $user_name=mysqli_real_escape_string($conn,$_POST['user_name']);
    $user_email=mysqli_real_escape_string($conn,$_POST['user_email']);
    $user_password=$_POST['user_password'];
    $user_image=$_FILES['user_image']['name'];
    $tmp_img_name=$_FILES['user_image']['tmp_name'];
    move_uploaded_file($tmp_img_name, "img/$user_image");
    $reg_code=mt_rand();
    if(strlen($user_password)<8)
    {
      echo "<script>alert('Password must be atleast 8 characters long !!!')</script>";
      exit();
    }
    $query_1="SELECT * FROM `users` WHERE `email` ='$user_email'";
    $run_1=mysqli_query($conn, $query_1);
    if(mysqli_num_rows($run_1)>0)
    {
       echo "<script>alert('Email is already exited!! Try with Different Email')</script>";
       exit();
    }else
    {
        $query_2="INSERT INTO `users`(`name`, `email`, `password`, `image`, `member_since`, `last_login`, `reg_code`) VALUES ('$user_name','$user_email','$user_password','$user_image',NOW(),NOW(),'$reg_code')";
        $run_2=mysqli_query($conn, $query_2);
        if($run_2==true)
        {
           echo "<script>alert('Your Account has created successfully !!!')</script>";
         

        }
        else
        {
           echo "<script>alert('Something went Wrong !! Try Again')</script>";
           exit();
        }
    }


  }


?>