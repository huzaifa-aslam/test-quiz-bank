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
  <title>Create Paper.</title>
   <link rel="stylesheet" href="css/custom.css"> 
  <script src=js/style.js></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style>
    @import 'https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300';

/*
 FORMATTING FOR CODEPEN
*/

/*html,body {
  height: 100%;
  width: 100%;
  margin: 0;
  display: flex;
  flex-direction: column;
  flex-wrap: wrap;
  font-family: 'Open Sans Condensed', sans-serif;
}*/

/*.col {
  height: 100%;
}
*/
/*div[class*=container] {
  text-align: center;
  width: 100%;
  height: 33%;
  display: flex;
  justify-content: center;
  align-items: center;
}
*/

.animated_btn {
width: 257px;
 background: #4E598C; }


/*
 BUTTON STYLING
*/
.animated_btn {
    width: 303px;
    background: #4E598C;
    /* height: 72px; */
    /* padding: 17px; */
    padding: 22px;
    text-align: center;
}
.animated_btn .btn
{
  height: 74px;
}
.animated_btn .btn {
  position: relative;
  color: white;
  width: 256px;
  height: 64px;
  line-height: 52px;
  transition: all 0.3s;
  button {
    transition: all 0.3s;
    tranform: scale(1, 1);
    background: transparent;
    border: transparent;
    color: white;
  }
}
.animated_btn button{
  background: transparent;
    border: transparent;
    color: white;
}

/*.animated_btn .btn::before, .btn::after {
  content: '';
  position: absolute;
  transition: all 0.3s;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 1;
}*/


/* BTN TWO */
.animated_btn .btn-two::before, .btn-two::after {
  content: '';
  position: absolute;
  width: 100%;
  height: 100%;
  bottom: 0;
  left: 0;
  z-index: 1;
  transition: all 0.3s;
  border: 1px solid rgba(255, 255, 255, 0.5);
}

.animated_btn .btn-two:hover::after {
  animation-name: rotatecw;
  animation-duration: 2s;
}
.animated_btn .btn-two:hover::before {
  animation-name: rotateccw; 
  animation-duration: 3s;
}
.animated_btn .btn-two:hover::after, .btn-two:hover::before {
  left: 96px;
  width: 64px;
  
  animation-iteration-count: infinite;
  animation-timing-function: linear;
}

 @keyframes rotatecw {
    from {transform: rotate(0deg);}
    to {transform: rotate(360deg);}
}

 @keyframes rotateccw {
    from {transform: rotate(0deg);}
    to {transform: rotate(-360deg);}
}

/* BTN THREE */







  </style>
</head>
<body>
<?php include('includes/menu.php');?>
<?php include('includes/marquee_tag.php');?>
  <section id="create_paper " class="margin_20px">
    <div class="container">
      <div class="row">
        <div class="col-md-6 mcqs_background img-thumbnail">
          
        </div>
        <div class="col-md-6" id="create_paper">
          <form action="my_paper.php?uid=<?php echo $id;?>" method="POST">
            <table>
              <tr>
               <td>
                  <h4 class="my_heading">Create Your Paper.</h4>
              </td>
              </tr>
              <tr>
               <td>Select Subject :
              
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
                <td>Course Code: <input style="margin-left: 30px;" class="box_shdow" type="text" name="course_code" required="required" placeholder="Course Code"></td>
               
              </tr>
              <tr>
                <td>Select Program: 
                  <select class="box_shdow" required="required" name="program">
                    <option></option>
                    <option value="BSCS">BSCS</option>
                    <option value="BBA">BBA</option>               
                  </select>
                </td>
              </tr>
                <tr>
                <td>Select Session: 
                  <select class="box_shdow" required="required" name="session">
                    <option></option>
                    <option value="Mid-Term Fall">Mid-Term Fall</option>
                    <option value="Final-Term Fall">Final-Term Fall</option>   
                    <option value="Mid-Term Spring">Mid-Term Spring</option>  
                    <option value="Final-Term Spring">Final-Term Spring</option>              
                  </select>
                </td>
              </tr>
              <tr>              
                <td>
                  Enter Date: <input style="margin-left: 50px;" class="box_shdow" type="date" placeholder="Enter Date" name="paper_date" required="required">
                </td>
              </tr>
              <tr>              
                <td>
                  Enter Year: <input style="margin-left: 50px;" class="box_shdow" type="text" placeholder="Enter Year" name="year" required="required">
                </td>
              </tr>

             
             <!--  <tr>              
                <td>
                  No.of Mcqs: <input style="margin-left: 46px;" class="box_shdow" type="number" placeholder="Number of Mcqs" name="mcqs">
                </td>
              </tr>
             
              <tr>              
                <td>
                  Long Question: <input class="box_shdow" type="number" placeholder="Long Question" name="long_question"></td>
              </tr>
           
              <tr>              
                <td>
                  Short Question: <input class="box_shdow" type="number"  placeholder="Short Question" name="short_question"></td>
              </tr> -->
              <tr class="txt_align">
                <td>
                   <button name="submit" class="my_button">Submit</button>
                  <!-- <div class=" sign_in_button animated_btn">
                  <div class="btn btn-two"> -->
<!--                     <span name="submit">Submit</span> -->
                   <!--  <button name="submit">Submit</button> -->
                  </div>
                </div>
              </td>
              </tr>
              
            </table>
          </form>
          <?php
  //Question_paper start
    //     if(isset($_POST['submit']))
    // {
    //   $mcqs=$_POST['mcqs'];
    //   $long_question=$_POST['long_question'];
    //   $short_question=$_POST['short_question'];
    //   $subject=$_POST['subject'];
    //    $mcqs_query="SELECT  `question`, `option_a`, `option_b`, `option_c`, `option_d` FROM `msqs`
    //     WHERE `subject`='$subject' limit '$mcqs'";
    //     $run_1=mysqli_query($conn, $mcqs_query);
    //     while($mcqs_data=mysqli_fetch_assoc($run_1))
    //     {
    //        $msqs=$mcqs_data['question'];
    //        echo "hello world";
    //        echo $msqs;

    //     }
        
    //     if($run_1==true)
    //     {
    //        $msqs=$mcqs_data['question'];
    //        echo "hello world";
    //        echo $msqs;

    //     }
    //     else
    //     {
    //        echo "<h1>Question is not added.</h1>";
           
    //     }

    // }
  //Question_paper end
?>
        
        </div>
      </div>
    </div>
  </section>
  <?php include('includes/footer.php');?>
</body>
</html>
