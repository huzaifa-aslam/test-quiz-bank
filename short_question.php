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


  }


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Short Question.</title>
   <link rel="stylesheet" href="css/custom.css"> 
  <script src=js/style.js></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php include('includes/menu.php');?>
<?php include('includes/marquee_tag.php');?>
  <section id="mcqs" class="margin_20px">
    <div class="container">
      <div class="row">
        <div class="col-md-6 mcqs_background">
          
        </div>
        <div class="col-md-6">
          <center>
          <form action="short_question.php?uid=<?php echo $id;?>" method="POST">
            
            <table>
                   <tr>
               <td class="txt_align">
                  <h4 class="my_heading">Select Subject.</h4>
              
              
                  <select class="box_shdow" required="required" name="subject">
                     <option>Select Subject</option>
                    <option value="DBMS">DBMS</option>
                    <option value="English">English</option>
                    <option value="Statistics.">Statistics</option>
                    <option value="Linear Algebra">Linear Algebra</option>
                    <option value="Arabic">Arabic</option>
                    <option value="DLD">DLD</option>
                  </select>

                </td>
              </tr>
              <tr>
                <td ><h4 class="my_heading">Short Question.</h4></td>
               
              </tr>
              <tr>
                 
                <td><textarea class="box_shdow" required="required" name="question" id="" cols="58" rows="2" placeholder="Write a  Question ..."></textarea></td>
              </tr>
              <tr>
                <td class="txt_align"><button class="my_button" name="submit">Submit</button></td>
              </tr>
              
            </table>
            
          </form>

          <?php
  //long_question start
        if(isset($_POST['submit']))
    {
      $question=$_POST['question'];
      $subject=$_POST['subject'];
       //checking repeatition start
        $check_query="SELECT `question` FROM `short_question` WHERE `question`='$question' and `subject`='$subject'";
        $run_check_query=mysqli_query($conn, $check_query);
        if(mysqli_num_rows($run_check_query)>0)
        {
           echo "<script>alert('This Question is already exited!!')</script>";
           exit();
        }
      //checking repeation end
       $query_2="INSERT INTO `short_question`(`subject`, `question`, `author_name`, `user_id`, `time`) 
       VALUES ('$subject','$question','$author_name','$id',NOW())";
        $run_2=mysqli_query($conn, $query_2);
        if($run_2==true)
        {
           echo "<h1>Question is added.</h1>";
         

        }
        else
        {
           echo "<h1>Question is not added.</h1>";
           
        }

    }
  //long_question end
?>
        
        </div>
      </div>
    </div>
  </section>
  <?php
    include('includes/footer.php');
  ?>
</body>
</html>
