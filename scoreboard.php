<?php
	require 'autoload.php';
	$quiz = new Quiz();
	if(!$_SESSION['quizpack']){
		header('location: quiz_package.php');
	}
	$getQuizPack = $quiz->getQuiz($_SESSION['quizpack']);
	$q_name = $getQuizPack->quiz_name;
	$res = $quiz->getContestant($_SESSION['quizpack']);
	$scoreboard = $quiz->scoreboard($_SESSION['quizpack']);
	$toArray = explode(',', $res->contestants);
	$round = $quiz->QuizRound($_SESSION['quizpack']);
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Question Page</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="animatecss/animate.min.css">
	<script type="text/javascript" src="jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<style type="text/css">
		body{
			background-image: url(img/highqq.jpg);
			background-size: cover;
			background-repeat: no-repeat;

		}
		.btn-dark{
			background-color: #00001a;
			color: white;
		}
		.btn-dark:hover{
			color: #58cfff;
		}
	</style>
	
</head>
<body>
<div class="container-fluid">
	<a href="exit.php" class="btn btn-md btn-danger exit"><span class="glyphicon glyphicon-off"></span> Exit</a>
	<span class="version">Quiz App V1.0</span>
	<div class="row">
		<div class="container">
		<div class="col-md-12 col-lg-12" style="margin-top: 4%;">
			<div class="col-md-6">
				<div class="title">SCOREBOARD</div>
				
			</div>
			<div class="col-md-6">
				
			<div class="text-right">
				<img src="img/logomain.png" alt="placeholder+image" width="120" height="40">
				<h6 style="letter-spacing: 5px;">QUIZ APP</h6>
			
			</div>
			</div>
			<!-- echo $q_name; -->
			</div>
		</div>
	</div>
	<div class="row" style="margin-top: 4%;">
		<div class="col-md-2 col-lg-2">
			<h3 style="text-align: center; font-weight: bold;">Contestants</h3>
			<ul style="display: block;" type="none" class="cont-list">	
				<?php foreach($toArray as $single): ?>
				<li class="col-md-12"><a class="btn btn-dark btn-block" href="question.php?c=<?php echo $single ?>"><?php echo $single ?></a></li>
				<?php endforeach; ?>
				
			</ul>
		</div>
		<div class="col-md-10 col-lg-10">
			<div class="row">
			<?php
			foreach($toArray as $single): 
			?>
		     <div class="col-md-3 col-lg-3 tbl">
		     	<div class="header" style="text-align: center; font-size: 26px;">
		     		<?php echo $single; ?>
		     	</div>
		     	<table class="table table-hover table-bordered">
		     		<tbody class="tbody">
			     	<?php
			     	$total = 0;
			     	$score = $quiz->getScore($single); 
			     	foreach($score as $s){
			     		echo "<tr><td>". $s->score . "</td></tr>";
			     		$total += $s->score;
			     	}
			     	?>
			     </tbody>
			     	<tfoot class="tfoot">
			     		<tr><td><?php  echo "<b>Total: </b>". $total; ?></td></tr>
			     	</tfoot>
		     	</table>
		     </div>
			<?php endforeach; ?>
		</div>
		</div>
		</div>
		<div class="container">
			<div class="col-md-12" style="margin-top: 70px;">
		<div class="text-right">
			<h5 style="letter-spacing: 5px;">DEVELOPED BY PROGRAMAS HUB <span><img src="img/logo.png" alt="placeholder+image" width="100" height="100"></span></h5>
		</div>
		</div>
		</div>
   </div>
</body>
</html>