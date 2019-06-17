<?php 
require 'autoload.php';
$quiz = new Quiz();

if(isset($_POST['loadQuestion'])){
	$quizpack_id = $_POST['quizpack_id'];
	$_SESSION['quizpack'] = $quizpack_id;
	header('location: scoreboard.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Select Level</title>
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
		.border-circle{
			border-radius: 50px;
		}
	</style>
</head>
<body>
	<!-- <img src="img/phub.jpg" alt="placeholder+image" class="loader animated jackInTheBox infinite slower"> -->
	<div class="container" style="margin-top: 100px">
		<div class="col-md-12" style="margin-bottom: 100px;">
			<div class="text-right">
				<img src="img/logomain.png" alt="placeholder+image" width="150" height="45">
				<h6 style="letter-spacing: 5px;">QUIZ APP</h6>
			</div>
		</div>
		<div class="col-md-12 col-lg-12">
			<div class="col-md-4 col-lg-4 col-md-offset-4 col-lg-offset-4 level">
				<form method="post">
					<div class="form-group">
						<center><label class="">Select Quiz </label></center>
						<select required  name="quizpack_id" class="form-control border-circle">
						<option value="" selected>--Select Quiz--</option>
						 <?php 
						 	$q = $quiz->quizPack();

						 	if($q->rowCount() > 0){
						 		$packs = $q->fetchAll(PDO::FETCH_OBJ);
						 		foreach($packs as $pack):
						 ?>
						 	<option value="<?php echo $pack->id ?>"> <?php echo trim($pack->quiz_name); ?> </option>
						 <?php
						   endforeach;
						 	}
						  ?>
						</select>
					</div>
					<button name="loadQuestion" class="btn btn-lg btn-block start border-circle" style="background-color: #17eb76; font-weight: bold; border: none !important;">Load Question</button>
				</form>
			</div>
		</div>
	</div>

</body>
</html>