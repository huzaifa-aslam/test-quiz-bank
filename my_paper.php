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
	<title>Document</title>
	 <link rel="stylesheet" href="css/custom.css"> 
  <script src=js/style.js></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
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
  height: 21cm;  
}

@media print {
  body, page {
    margin: 0;
    box-shadow: 0;
  }
}
#question_paper .objective li
{
	float: left;
	list-style: none;
	width: 372px;
}
#question_paper .header_info td
{
    width: 239px;
	
} 
#question_paper .heading td
{
	
	
	   width: 281px;
} 

	</style>
</head>
<body>
	<page size="A4" >
		<div id="question_paper">
		<!-- header for question paper start -->
		
		<!-- header for question paper start end -->
         <?php
  //mcqs start
        
        if(isset($_POST['submit']))
    {
      //$mcqs=$_POST['mcqs'];
      
     // $long_question=$_POST['long_question'];
      //$short_question=$_POST['short_question'];
      $subject=$_POST['subject'];
     
      $course_code=$_POST['course_code'];
       $program=$_POST['program'];
       $date=$_POST['paper_date'];
       $session=$_POST['session'];
       $year=$_POST['year'];
        //checking repeatition start
        $check_query="SELECT  `session`, `year` FROM `past_paper` WHERE `session`='$session' and `year`='$year' and`subject`='$subject'";
        $run_check_query=mysqli_query($conn, $check_query);
        if(mysqli_num_rows($run_check_query)>0)
        {
           echo "<script>alert('This Paper is already exited!!')</script>";
           echo "<script>window.open('create_paper.php','_SELF')</script>";
          
        }
      //checking repeation end

      ?>
      		<table class="heading">
      			<tr>
      				<td><img src="img/logo.png" alt=""></td>
					<td>Sindh Madressatul Islam University.</td>
      			</tr>
      			
      		</table>

			<table class="header_info">
				<tr>
					<td>Course Instructure: <u><?php echo $author_name?></u></td>
					<td>Course Code: <u><?php echo $course_code?></u></td>
					<td>Program: <u><?php echo $program?></u></td>
				</tr>
				<tr>
					<td>Date: <u><?php echo $date?></u></td>
					<td>Subject: <u><?php echo $subject?></u></td>
					<td>Session: <u><?php echo $session." ".$year?></u></td>
				</tr>

			</table>     		
      <?php
      if($session=="Mid-Term Fall" || $session=="Mid-Term Spring")
      {
      	$mcqs_query="SELECT  `question`,`mcqs_id`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_answer` FROM `msqs`
        WHERE `subject`='$subject' order by rand() limit 10";
         echo "<h5>1. Choose the best Answer. (1 * 10=10)</h5>";
      }
      else
      {
      	$mcqs_query="SELECT  `question`,`mcqs_id`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_answer` FROM `msqs`
        WHERE `subject`='$subject' order by rand() limit 20";
         echo "<h5>1. Choose the best Answer. (1 * 20=20)</h5>";

      }


       
        $run_1=mysqli_query($conn, $mcqs_query);
        $count=0;
        $best_answer="Choose the best answer.";
        
        while($mcqs_data=mysqli_fetch_assoc($run_1) )
       	
       	{
       		
       		$count++;

        	$question=$mcqs_data['question'];
        	$option_a=$mcqs_data['option_a'];
        	$option_b=$mcqs_data['option_b'];
        	$option_c=$mcqs_data['option_c'];
        	$option_d=$mcqs_data['option_d'];
        	$correct_answer=$mcqs_data['correct_answer'];
        	 $mcqs_id=$mcqs_data['mcqs_id'];
        	
        	//$question_no=$mcqs_data['mcqs_id'];
          	?>
		<span><?php echo 	$count.". ".$question;?></span><BR>
		<div class="objective">
			<span>A.<?php echo $option_a;?></span><br>
			<span>B.<?php echo $option_b;?></span><br>
			<span>C.<?php echo $option_c;?></span><br>
			<span>D.<?php echo $option_d;?></span><br>


			
			


		</div><br>
			<div>
				<span><?php echo "correct_answer".". ".$correct_answer;?></span>
				
				<?php
				//mcqs insertion start
					$mcqs_insert="INSERT INTO `past_paper`( `uid`,`year`, `author_name`, `subject`, `session`, `program`, `course_code`, `mcqs_no`, `date`) VALUES ('$id','$year','$author_name','$subject','$session','$program','$course_code','$mcqs_id','$date')";
					$mcqs_insert_run=mysqli_query($conn,$mcqs_insert);
					if($mcqs_insert_run==false)
					{
						echo "<script>alert('not added in past paper')</script>";
						
					}


				//mcqs insertion end
				?>
			</div>
			
          	<?php
       	}

    }
    
  //mcqs end


    //long_question start
  
         if(isset($_POST['submit']))
    {
      
      if($session=="Mid-Term Fall" || $session=="Mid-Term Spring")
      {
      	$subject=$_POST['subject'];
            	$long_ques_query="SELECT  `question`,`ques_id` FROM `long_question`
        WHERE `subject`='$subject' order by rand() limit 2"; 
          echo "<h5>2. Write in Detail.  (2 * 3=6)</h5>";   
      }
      else
      {
      	$subject=$_POST['subject'];
            	$long_ques_query="SELECT  `question`,`ques_id`  FROM `long_question`
        WHERE `subject`='$subject' order by rand() limit 3";
          echo "<h5>2. Write in Detail.  (3 * 4=12)</h5>";

      }
     // $long_question=$_POST['long_question'];
   
      

      
   

               $run_long_ques_query=mysqli_query($conn, $long_ques_query);
        $best_answer="Write in detail.";
        $count_long_ques=0;
        while( $long_ques_data=mysqli_fetch_assoc($run_long_ques_query))
       	
       	{
       		
       		$count_long_ques++;
        	$long_ques=$long_ques_data['question'];
        	$long_ques_id=$long_ques_data['ques_id'];
          	?>
			<p class="margin_bottom_0px"><?php echo $count_long_ques." ".$long_ques; ?></p>
			


          	<?php

  		//long insertion start
			$long_insert="INSERT INTO `past_paper`( `uid`,`year`, `author_name`, `subject`, `session`, `program`, `course_code`, `long_ques_no`) VALUES ('$id','$year','$author_name','$subject','$session','$program','$course_code','$long_ques_id')";
			$long_insert_run=mysqli_query($conn,$long_insert);
			if($long_insert_run==false)
			{
				echo "<script>alert('not added in past paper')</script>";
				
			}


		//long insertion end
       	}

    }
     //long_question end

     //short_question start
  
         if(isset($_POST['submit']))
    {
      
      
     // $short_question=$_POST['short_question'];
   
      $subject=$_POST['subject'];
       if($session=="Mid-Term Fall" || $session=="Mid-Term Spring")
      {
      	$short_ques_query="SELECT  `question`,`ques_id` FROM `short_question`
        WHERE `subject`='$subject' order by rand() limit 4 ";
          echo "<h5>3. Write in Short. (1 * 4=4)</h5>";   
      }
      else
      {
      	$short_ques_query="SELECT  `question`,`ques_id` FROM `short_question`
        WHERE `subject`='$subject' order by rand() limit 4 ";
          echo "<h5>3. Write in Short. (2 * 4=8)</h5>";
      }

       
        $run_short_ques_query=mysqli_query($conn, $short_ques_query);
        $best_answer="Write in detail.";
        $count_short_ques=0;
        while( $short_ques_data=mysqli_fetch_assoc($run_short_ques_query))
       	
       	{
       		
       		$count_short_ques++;
        	$short_ques=$short_ques_data['question'];
        	$short_ques_id=$short_ques_data['ques_id'];
          	?>
			<p class="margin_bottom_0px"><?php echo $count_short_ques." ".$short_ques; ?></p>
          	<?php

          	//short insertion start
			$short_insert="INSERT INTO `past_paper`( `uid`,`year`, `author_name`, `subject`, `session`, `program`, `course_code`, `short_ques_no`) VALUES ('$id','$year','$author_name','$subject','$session','$program','$course_code','$short_ques_id')";
			$short_insert_run=mysqli_query($conn,$short_insert);
			if($short_insert_run==false)
			{
				echo "<script>alert('not added in past paper')</script>";
				
			}


		//short insertion end
       	}

    }
     //short_question end
?>
	</div>
	<button onclick="question_paper()">Print Question Paper.</button>
	
	<!-- <button class="view-results" onclick="returnScore()">View Results</button>
<span id="myresults" class="my-results">My results will appear here</span> -->
	<!-- <button id="ques_paper">Download Question Paper.</button> -->
	
	</page>
	<!-- <button onclick="window.print()">Print your Paper.</button> -->

	  <script type="text/javascript">
        
    function question_paper(){
      var print_div = document.getElementById("question_paper");
var print_area = window.open();
print_area.document.write(print_div.innerHTML);
print_area.document.close();
print_area.focus();
print_area.print();
print_area.close();

    }

//        function correct_answer(){
//       var print_div = document.getElementById("correct_answer");
// var print_area = window.open();
// print_area.document.write(print_div.innerHTML);
// print_area.document.close();
// print_area.focus();
// print_area.print();
// print_area.close();

//     }


// function submit_ans ()
// {
// 	var total=5;
// 	var score=5;
// 	var q1= document.forms["quiz"]["q1"].value;
// 	var q2=document.forms["quiz"]["q2"].value;
// 	var q3=document.forms["quiz"]["q3"].value;
// 	var q4=document.forms["quiz"]["q4"].value;
// 	var q5=document.forms["quiz"]["q5"].value;
// 	for(i=0;i<=total;i++){
// 		if(eval('q'+i)==null || eval('q'+i)==""){
// 			alert("you missed Question "+i);
// 		}
// 	}

// }
// var answers = ["A", "C", "B"],
//   tot = answers.length;

// function getCheckedValue(mcqs_btn) {
//   var radios = document.getElementsByName(mcqs_btn); // Get radio group by-name
//   for (var y = 0; y < radios.length; y++)
//     if (radios[y].checked) return radios[y].value; // return the checked value
// }

// function getScore() {
//   var score = 0;
//   for (var i = 0; i < tot; i++)
//     if (getCheckedValue("question" + i) === answers[i]) score += 1; // increment only
//   return score;
// }

// function returnScore() {
//   document.getElementById("myresults").innerHTML =
//     "Your score is " + getScore() + "/" + tot;
// }


  </script>

	


</body>
</html>