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
  <title>mcqs</title>
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
        <div class="col-md-6 img-thumbnail  mcqs_background">
          
        </div>
        <div class="col-md-6">
          <form action="mcqs.php?uid=<?php echo $id;?>" method="POST">
            <table>
              <tr>
               <td>
                <span class="my_heading"> Select Subject:</span>
              
              
                  <select class="box_shdow" required="required" name="subject">
                     <option></option>
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
                <td><h4 class="my_heading">Write Question</h4></td>
               
              </tr>
              <tr>
                 
                <td><textarea class="box_shdow" required="required" name="question" id="" cols="58" rows="2" placeholder="Write a Question ..."></textarea></td>
              </tr>

               <tr>
              <!--  <tr>
                <td><h4 class="my_heading">Write Options.</h4></td>
               
              </tr> -->
                <td>
                 
               <!--   <label >A</label> -->
                <textarea class="box_shdow" name="option_a" required="required" id="" cols="25" rows="1" placeholder="Write option a..."></textarea>
             
                 
                  
                <!--  <label >B</label> -->
                <textarea class="box_shdow" name="option_b" required="required" id="" cols="25" rows="1" placeholder="Write option b..."></textarea>
              
                </td>
              </tr>
              <tr>
               <td>
                 <!--  <label >C</label> -->
                <textarea class="box_shdow" name="option_c" required="required" id="" cols="25" rows="1" placeholder="Write option d..."></textarea>
                 <!--   <label >D</label> -->
                <textarea class="box_shdow" name="option_d" required="required" id="" cols="25" rows="1" placeholder="Write option d..."></textarea>
                </td>
              </tr>
         
              <tr>
                <td><h4 class="my_heading">Select Correct Option.</h4></td>
               
              </tr>
               <tr>
                <td>
                 A <input type="radio" required="required" name="option" value="a"> <br>
                 B <input type="radio" required="required" name="option" value="b"> <br>
                 C <input type="radio" required="required" name="option" value="c"> <br>
                  D<input type="radio" required="required" name="option" value="d"> 
                </td>
              </tr>

              <tr class="txt_align">
                <td><button name="submit" class="my_button">Submit</button></td>
              </tr>
              
            </table>
          </form>
          <?php
  //mcqs start
        if(isset($_POST['submit']))
    {
      $question=$_POST['question'];
      $option_a=$_POST['option_a'];
      $option_b=$_POST['option_b'];
      $option_c=$_POST['option_c'];
      $option_d=$_POST['option_d'];
      $subject=$_POST['subject'];
      $correct_answer=$_POST['option'];
      //checking repeatition start
        $check_query="SELECT * FROM `msqs` WHERE `question`='$question' and `subject`='$subject'";
        $run_check_query=mysqli_query($conn, $check_query);
        if(mysqli_num_rows($run_check_query)>0)
        {
           echo "<script>alert('This Mcqs is already exited!!')</script>";
           exit();
        }
      //checking repeation end
       $query_2="INSERT INTO `msqs`(`uid`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_answer`, `mcqs_time`, `subject`, `author_name`) VALUES ('$id','$question','$option_a','$option_b','$option_c','$option_d','$correct_answer',NOW(),'$subject','$author_name')";
        $run_2=mysqli_query($conn, $query_2);
        if($run_2==true)
        {
           echo "<h4 class='my_heading' style='margin-top:15px;     width: 435px;'>Mcqs is added.</h4>";
         

        }
        else
        {
           echo "<h4class='my_heading' style='margin-top:15px; width: 435px;'>Mcqs is not added.</h4>";
           
        }

    }
  //mcqs end
?>
        
        </div>
      </div>
    </div>
  </section>
   <?php include('includes/footer.php');?>
</body>
</html>
