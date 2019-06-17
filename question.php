<?php
	require 'autoload.php';
	$quiz = new Quiz();
	if(!$_SESSION['quizpack']){
		header('location: quiz_package.php');
	}
	$questions = $quiz->getAllQuestionID($_SESSION['quizpack']);
	$class = $_GET['c'];
	
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
	</style>
</head>
<body>
<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-12" style="margin-top: 4%;">
					<div class="col-md-6">
						<h2 style="text-transform: uppercase; font-weight: bolder; letter-spacing: 8px;
						color: #00001a; border: none">questions</h2>
					</div>
					<div class="col-md-6">
						<div class="col-md-12" style="margin-bottom: 100px;">
			<div class="text-right">
				<img src="img/logomain.png" alt="placeholder+image" width="150" height="45">
				<h6 style="letter-spacing: 5px;">QUIZ APP</h6>
			</div>
		</div>
					</div>
				</div>
			</div>
			<?php foreach($questions as $q): ?>
				<?php if($q->answered == 1){ ?>
					<div class="countAns"><a href=""><?php echo $q->ques_id ?></a></div>
				 <?php }else{ ?>
				 	<div class="count"><a href="question_page.php?q=<?php echo $q->quiz_pack_id; ?>&c=<?php echo $class; ?>&qid=<?php echo $q->ques_id; ?>"><?php echo $q->ques_id ?></a></div>
				<?php }
				?>
				
			<?php endforeach; ?>
		<div class="col-md-12" style="margin-top: 70px;">
		<div class="text-right">
			<h5 style="letter-spacing: 5px;">DEVELOPED BY PROGRAMAS HUB <span><img src="img/logo.png" alt="placeholder+image" width="100" height="100"></span></h5>
		</div>
	</div>
	</div>
</body>
</html>