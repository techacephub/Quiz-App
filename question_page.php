<?php
	require 'autoload.php';
	$quiz = new Quiz();
	if(!$_SESSION['quizpack']){
		header('location: quiz_package.php');
	}
	$class = $_GET['c'];
	$ques_id = $_GET['qid'];
	$quiz->updateAsAnswered($ques_id,$_SESSION['quizpack']);
	$question = $quiz->getAllQuestion($_SESSION['quizpack'],$ques_id);	
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Question Page</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="animatecss/animate.min.css">
	<link rel="stylesheet" type="text/css" href="css/prettyCheck.css">
	<link rel="stylesheet" href="css/simplyCountdown.theme.default.css">
	<script type="text/javascript" src="jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script src="js/simplyCountdown.min.js"></script>
    <style type="text/css">
    	body{
    		background-color: #00001a;
    	}
    	.question-id{
    		position: absolute;
    		top: -20px;
    		left: -30px;
    		width: 100px;
    		height: 100px;
    		background-color: #58cfff;
    		color: #00001a;
    		padding: 30px;
    		border-radius: 50%;
    		font-size: 65px !important;
    		font-weight: bold;
    		line-height: 50px;
    	}
    </style>
</head>
<body>
<div class="container-fluid">
	<div class="container" style="margin-top: 1%;">
	<div class="col-md-6">
		<h2 style="color: white;">Question</h2>
	</div>
	<div class="col-md-6">
		<div class="text-right">
		<div class="time-circle" style="width: 120px; height: 120px; border-radius: 50%; background-color: white; padding: ; float: right">
			<h2 class="text-center"> </h2>
			<h1 class="text-center" style="font-weight: bold; font-family: arial; font-size: 48px"><span id="timer"></span></h1>
		</div>
	</div>
	</div>
	</div>
	<div class="row rw">
		<div class="container">
		<div class="col-md-12 col-lg-12 ap" style="">
			<h3 style="padding: 40px 10px 40px 80px; background-color: rgb(255,255,255); border-radius: 5px;"><span class="question-id" style=""><?php echo $question->ques_id ?></span> <?php echo $question->question ?>?</h3>
			<form id="form" style="margin-top: 20px;">
			<div class="col-md-6 col-lg-6" style="background-color: white; padding: 20px 10px 0px 30px; border-radius: 50px; margin-bottom: 20px;">
				<div class="pretty p-default p-curve p-thick">
					<input id="option" value="<?php echo $question->option_A ?>" type="radio" name="good" >
					<div class="state p-success-o">
		            	<label style="font-size: 18px;">A. <?php echo wordwrap($question->option_A,48,"\n<BR>",TRUE) ?></label>
		        	</div>
				</div>
			</div>
			<div class="col-md-6" style="background-color: white; padding: 20px 10px 0px 30px; border-radius: 50px;margin-bottom: 20px;">
				<div class="pretty p-default p-curve p-thick">
					<input id="option" value="<?php echo $question->option_B ?>" type="radio" name="good">
					<div class="state p-success-o">
		            	<label style="font-size: 18px;">B. <?php echo wordwrap($question->option_B,48,"\n<br>",TRUE) ?></label>
		        	</div>
				</div>
			</div>
			<div class="col-md-6" style="background-color: white; padding: 20px 10px 0px 30px; border-radius: 50px; margin-bottom: 20px;">
				<div class="pretty p-default p-curve p-thick">
					<input id="option" value="<?php echo $question->option_C ?>" type="radio" name="good">
					<div class="state p-success-o">
		            	<label style="font-size: 18px;">C.<?php echo wordwrap($question->option_C,48,"\n<br>",TRUE) ?></label>
		        	</div>
				</div>
			</div>
			<div class="col-md-6" style="background-color: white; padding: 20px 10px 0px 30px; border-radius: 50px; margin-bottom: 20px;">
				<div class="pretty p-default p-curve p-thick">
					<input id="option" value="<?php echo $question->option_D ?>" type="radio" name="good">
					<div class="state p-success-o">
		            	<label style="font-size: 18px;">D.<?php echo wordwrap($question->option_D,48,"\n<br>",TRUE) ?></label>
		        	</div>
				</div>
			</div>
			<input type="hidden" id="answer" value="<?php echo $question->answer; ?>" name="answer" style="">
			<div class="btn-submit" style="margin-bottom: -40px;">
			<button id="submit" class="btn btn-success btn-lg btn-block submit">Submit</button>
			</div>
		</form>
		</div>
	</div>
		
	</div>
	<div id="alarm"></div>
	<div id="backto"><a href="scoreboard.php" style="background-color: #58cfff; color: #00001a;border-radius: 50px; padding: 10px; width: 30%;">Back to Scoreboard</a></div>
</body>
<script type="text/javascript">


function getRadioVal(form, name) {
    var val;
    var radios = form.elements[name];
        for (var i=0, len=radios.length; i<len; i++) {
        if ( radios[i].checked ) { 
            val = radios[i].value;
            break; 
        }
    }
    return val; 
}

function updateCorrect(qp,cl,flag)
{
	var data = {
		qp: qp,
		cl: cl,
		flag:flag
	}

	$.ajax({
		type: 'post',
		cache: false,
		url: 'update.php',
		data: data,
		success: function(xhr){ console.log(xhr);}
	});
	return true;
}
function updateWrong(qp,cl,flag)
{
	var data = {
		qp: qp,
		cl: cl,
		flag:flag
	}

	$.ajax({
		type: 'post',
		cache: false,
		url: 'update.php',
		data: data,
		success: function(xhr){ console.log(xhr);}
	});
	return true;
}



	var timeleft = <?php echo $quiz->getQuizTimer($_SESSION['quizpack']) ?>;
	var downloadTimer = setInterval(function(){
  	document.getElementById("timer").innerHTML = timeleft + "";
  	timeleft -= 1;
  	var bool = false;
  	if(timeleft <= 0){
    	clearInterval(downloadTimer);

    	setTimeout(function(){
    		updateWrong(<?php echo $_SESSION['quizpack']?>,"<?php echo trim($class) ?>",0);
    		$("#submit").attr('disabled','disabled');
    		$("#backto").show();
    	},1000);

    	
    	


    	
  	}
	}, 1000);


  	$("#submit").on('click', function(ev){
  		clearInterval(downloadTimer);
		ev.preventDefault();
		var val = getRadioVal( document.getElementById('form'), 'good' );
		var answer = $("#answer").val();

		if(val === answer ){
			
			$("#alarm").html("<div>Answer is: <span class='success'> Correct!</span></div>");
			updateCorrect(<?php echo $_SESSION['quizpack']; ?>,"<?php echo trim($class) ?>",1);
			$("#backto").show();
		}

		if(val !== answer){
			$("#alarm").html("<div>Answer is: <span class='wrong'> Wrong!</span></div>");
			updateWrong(<?php echo $_SESSION['quizpack']?>, "<?php echo trim($class) ?>",0);
			$("#backto").show();
		}
  	})
</script>
</html>