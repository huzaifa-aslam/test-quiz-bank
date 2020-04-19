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
        <div class="col-md-6 img-responsive  mcqs_background">
          
        </div>
        <div class="col-md-6 " id="past_paper">
        <center>
          <form class="txt_align" action="previous_paper.php?uid=<?php echo $id;?>" method="POST">
            <table>
              <tr>
                <h4 class="my_heading">Search Past Paper</h4>
              </tr>
              <tr>
                <td><span class=""> Select Subject:</span></td>
                <td>
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
                <td>Enter Session:</td>
                <td>
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
                <td>Enter Year:</td>
                <td>
                  <input class="box_shdow" type="text" name="year" placeholder="Enter year" required="required">
                </td>
              </tr>
            </table>
            <div class="txt_align"><button name="submit" class="my_button">Submit</button></div>
          </form>
          </center>
        
        </div>
      </div>
    </div>
  </section>
   <?php include('includes/footer.php');?>
</body>
</html>
