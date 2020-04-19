<style>
	body {
  background: rgb(204,204,204); 
}
page {
  background: white;
  display: block;
  margin: 0 auto;
  margin-bottom: 0.5cm;
  box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
}
page[size="A4"] {  
  width: 21cm;
  height: 55cm; 
}
page[size="A4"][layout="landscape"] {
  width: 29.7cm;
  height: 55cm;  
}

@media print {
  body, page {
    margin: 0;
    box-shadow: 0;
  }
}
#previous_ques td
{
	width: 236px;
}
</style>

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
 if(isset($_POST['submit']))
    {
      $subject=$_POST['subject'];
      $session=$_POST['session'];
      $year=$_POST['year'];
      //checking for paper existence start
        $check_query="SELECT * FROM `past_paper` where `subject`='$subject' and `session`='$session' and `year`='$year'";
        $run_check_query=mysqli_query($conn, $check_query);
        if(mysqli_num_rows($run_check_query)<1)
        {
           echo "<script>alert('This Paper is not available!!')</script>";
           echo "<script>window.open('past_papers.php','_SELF')</script>";
          
        }
      //checking for paper existence end
      //getting header once start
      $past_paper_1="SELECT `author_name`,`year`,`date`, `subject`, `session`, `program`, `course_code` FROM `past_paper` WHERE `subject`='$subject' and `session`='$session' and `year`='$year'";
      $run_past_paper_1=mysqli_query($conn,$past_paper_1);
      $past_paper_data_1=mysqli_fetch_assoc($run_past_paper_1);
      $name=$past_paper_data_1['author_name'];
	  	$paper_subject=$past_paper_data_1['subject'];
	  	$paper_session=$past_paper_data_1['session'];
	  	$program=$past_paper_data_1['program'];
	  	$course_code=$past_paper_data_1['course_code'];
	  	$paper_year=$past_paper_data_1['year'];
	  	$paper_date=$past_paper_data_1['date'];
	  	//$paper_year=$past_paper_data_1['year'];
	  	?>
	  			<!-- page start -->
			
			<page size="A4">
			<div id="previous_ques">

      
			 <table class="heading">
      			<tr>
      				<td><img src="img/logo.png" alt="" class="img-responsive"></td>
					<td>Sindh Madressatul Islam University.</td>
      			</tr>
      			
      		</table>

			<table class="header_info">
				<tr>
					<td>Course Instructure: <u><?php echo $name?></u></td>
					<td>Course Code: <u><?php echo $course_code?></u></td>
					<td>Program: <u><?php echo $program?></u></td>
				</tr>
				<tr>
					
					<td>Subject: <u><?php echo $paper_subject?></u></td>
					<td>Session: <u><?php echo $paper_session." ".$paper_year;?></u></td>
					<td>Date: <u><?php echo $paper_date;?></u></td>
				</tr>

			</table>     	

	  	<?php
	  	 //getting header once end
	  	//getting past_paper ques start
      $past_paper="SELECT  `mcqs_no`,`long_ques_no`,`short_ques_no` FROM `past_paper` WHERE `subject`='$subject' and `session`='$session' and `year`='$year'";
      $run_past_paper=mysqli_query($conn,$past_paper);
      $count_mcqs=0;
      $count_long=0;
      $count_short=0;
      ?>
         <p><b>Choose The Best Answer.</b></p>
      <?php
      while($past_paper_data=mysqli_fetch_assoc($run_past_paper))
      {
      	
      	$mcqs_no=$past_paper_data['mcqs_no'];
      	$long_ques_no=$past_paper_data['long_ques_no'];
      	$short_ques_no=$past_paper_data['short_ques_no'];
      //getting mcqs start
      	$mcqs_query="SELECT `mcqs_id`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_answer` FROM `msqs` WHERE `mcqs_id`='$mcqs_no'";
      	
      	$run_mcqs_query=mysqli_query($conn,$mcqs_query);
      	      	while($mcqs_data=mysqli_fetch_assoc($run_mcqs_query))
      	{
      		$count_mcqs++;
      		$mcqs_ques=$mcqs_data['question'];
      		$option_a=$mcqs_data['option_a'];
      		$option_b=$mcqs_data['option_b'];
      		$option_c=$mcqs_data['option_c'];
      		$option_d=$mcqs_data['option_d'];
      		$correct_answer=$mcqs_data['correct_answer'];
      		?>
      			<span><?php echo 	$count_mcqs.". ".$mcqs_ques;?></span><BR>
				<div class="objective">
					<span>A.<?php echo $option_a;?></span><br>
					<span>B.<?php echo $option_b;?></span><br>
					<span>C.<?php echo $option_c;?></span><br>
					<span>D.<?php echo $option_d;?></span><br>
				</div><br>
					<!-- <div>
 -->
      		<?php
      	}
      	//getting mcqs end
      }
     
      //getting past_paper ques end
    }

    //getting long question start
    	if(isset($_POST['submit']))
		    {
		      $subject=$_POST['subject'];
		      $session=$_POST['session'];
		      $year=$_POST['year'];
		       $past_paper_2="SELECT  `long_ques_no` FROM `past_paper` WHERE `subject`='$subject' and `session`='$session' and `year`='$year'";
     		  $run_past_paper_2=mysqli_query($conn,$past_paper_2);
     		  
     		   ?>
		         <p><b>Write in Detail.</b></p>
		      <?php
		      $count_long_ques=0;
     		  while($data_past_paper_2=mysqli_fetch_assoc($run_past_paper_2))
     		  {
     		  	$long_ques_no=$data_past_paper_2['long_ques_no'];
     		  		$long_question_query="SELECT `question` FROM `long_question` WHERE `ques_id`='$long_ques_no'";
			      	$run_long_ques_query=mysqli_query($conn,$long_question_query);

			      	while($long_question_data=mysqli_fetch_assoc($run_long_ques_query))
			      	{
			      		$count_long_ques++;
			      		$long_question=$long_question_data['question'];
			      		?>
			      			<p class="margin_bottom_0px"><?php echo $count_long_ques." ".$long_question; ?></p>
			      		<?php
			      		
			      	}
     		  }
		     
		    }

    //getting long question end

	//getting short question start
    	if(isset($_POST['submit']))
		    {
		      $subject=$_POST['subject'];
		      $session=$_POST['session'];
		      $year=$_POST['year'];
		       $past_paper_3="SELECT  `short_ques_no` FROM `past_paper` WHERE `subject`='$subject' and `session`='$session' and `year`='$year'";
     		  $run_past_paper_3=mysqli_query($conn,$past_paper_3);
     		  
     		   ?>
		         <p><b>Write in Shoer.</b></p>
		      <?php
		      $count_short_ques=0;
     		  while($data_past_paper_3=mysqli_fetch_assoc($run_past_paper_3))
     		  {
     		  	$short_ques_no=$data_past_paper_3['short_ques_no'];
     		  		$short_question_query="SELECT `question` FROM `short_question` WHERE `ques_id`='$short_ques_no'";
			      	$run_short_ques_query=mysqli_query($conn,$short_question_query);

			      	while($short_question_data=mysqli_fetch_assoc($run_short_ques_query))
			      	{
			      		$count_short_ques++;
			      		$short_question=$short_question_data['question'];
			      		?>
			      			<p class="margin_bottom_0px"><?php echo $count_short_ques." ".$short_question; ?></p>
			      		<?php
			      		
			      	}
     		  }
		     
		    }

    //getting short question end

   
?>
</div>
<button onclick="previous_ques()">Print Question Paper.</button>
</page>
		<!-- getting correct keys start -->
<page size="A4">
	<div id="correct_answer">
	<?php
		 if(isset($_POST['submit']))
		    {
		      $subject=$_POST['subject'];
		      $session=$_POST['session'];
		      $year=$_POST['year'];
		       $past_paper_1="SELECT  `mcqs_no` FROM `past_paper` WHERE `subject`='$subject' and `session`='$session' and `year`='$year'";
     		  $run_past_paper_1=mysqli_query($conn,$past_paper_1);
     		  $count_correct_keys=0;
     		   ?>
		         <p><b>Correct Keys.</b></p>
		      <?php
     		  while($data_past_paper_1=mysqli_fetch_assoc($run_past_paper_1))
     		  {
     		  	$getting_correct_key=$data_past_paper_1['mcqs_no'];
     		  	 $correct_keys_query="SELECT `correct_answer` FROM `msqs` WHERE `mcqs_id`='$getting_correct_key'";
      	
		      	$run_correct_keys_query=mysqli_query($conn,$correct_keys_query);
		      	
		      	while($correct_keys_data=mysqli_fetch_assoc($run_correct_keys_query))
		      	{	
		      		$count_correct_keys++;
		      		$correct_key=$correct_keys_data['correct_answer'];
		      		?>
						<span><?php echo $count_correct_keys.". ".$correct_key;?></span><br>
		      		<?php
		      	}
     		  }
		     
		    }
	?>
	</div>
	<button onclick="correct_answer()">Print Correct Keys.</button>
</page>
	<!-- getting correct keys end -->
<script type="text/javascript">
	//printing question_paper start
	 function previous_ques(){
      var print_div = document.getElementById("previous_ques");
	var print_area = window.open();
	print_area.document.write(print_div.innerHTML);
	print_area.document.close();
	print_area.focus();
	print_area.print();
	print_area.close();

	    }
	//printing question_paper end


	//printing correct_answer start

	    function correct_answer(){
      var print_div = document.getElementById("correct_answer");
	var print_area = window.open();
	print_area.document.write(print_div.innerHTML);
	print_area.document.close();
	print_area.focus();
	print_area.print();
	print_area.close();

	    }
	//printing correct_answer start

</script>