
<?php
	 session_start();
 
  if(isset($_SESSION['user_id']))
  {
      $id=$_SESSION['user_id'];
       $author_query="SELECT `name` FROM `users` WHERE `uid`='$id'";
        $run_author_query=mysqli_query($conn, $author_query);
        $author_data=mysqli_fetch_assoc($run_author_query);
        $author_name=$author_data['name'];
  }
  $conn=mysqli_connect('localhost','root','','quiz_bank');
  function insert_mcqs()
  {
  	global $conn;
  	global $id;
  	global  $author_name;
  	 if(isset($_POST['submit']))
    {
      $question=$_POST['question'];
      $option_a=$_POST['option_a'];
      $option_b=$_POST['option_b'];
      $option_c=$_POST['option_c'];
      $option_d=$_POST['option_d'];
      $subject=$_POST['subject'];
      $correct_answer=$_POST['option'];
       $query_2="INSERT INTO `msqs`(`uid`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_answer`, `mcqs_time`, `subject`, `author_name`) VALUES ('$id','$question','$option_a','$option_b','$option_c','$option_d','$correct_answer',NOW(),'$subject','$author_name')";
        $run_2=mysqli_query($conn, $query_2);
        if($run_2==true)
        {
           
           
           echo "<h1>Mcqs is added.</h1>";
         

        }
        else
        {
           echo "<h1>Mcqs is not added.</h1>";
           
        }

    }
  }
?>

