<?php
	require '../autoload.php';
	$quiz = new Quiz();
	if(!$_SESSION['userid']){
		header('location: index.php');
	}
	if(isset($_POST['submit'])){
		//$isSaved = $quiz->createQuiz();
		$option_A = $_POST['option_A'];
		$option_B = $_POST['option_B'];
		$option_C = $_POST['option_C'];
		$option_D = $_POST['option_D'];
		$question = $_POST['question'];
		$quiz_id = $_POST['quizpack_id'];
		$answer = $_POST['answer'];

		$data = array(
			"quiz_pack_id" => $quiz_id,
			"question" => $question,
			"option_A" => $option_A,
			"option_B" => $option_B,
			"option_C" => $option_C,
			"option_D" => $option_D,
			"answer"   => $answer
		);

		$isSaved = $quiz->createQuiz('quiz_question',$data);

		if($isSaved){
			$msg = $quiz->alertMessage();
		}
	}

	if(isset($_POST['import'])){
		$csv = $_FILES['csv']['tmp_name'];
		$handle = fopen($csv, "r");
		$quiz_id = (int)$_POST['quizpack_id'];

		while( ($filesop = fgetcsv($handle, 1000, ",") ) !== false)
        {
	        $option_A = $filesop[1];
			$option_B = $filesop[2];
			$option_C = $filesop[3];
			$option_D = $filesop[4];
			$question = $filesop[0];
			$answer   = $filesop[5];
         

          $data = array(
			"quiz_pack_id" => $quiz_id,
			"question" => $question,
			"option_A" => $option_A,
			"option_B" => $option_B,
			"option_C" => $option_C,
			"option_D" => $option_D,
			"answer"   => $answer
		  );

		$isSaved = $quiz->createQuiz('quiz_question',$data);

		if($isSaved){
			$msg = $quiz->alertMessage();
		}
          
          
      }
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Quiz App</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../animatecss/animate.min.css">
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</head>
<body style="font-size: 13px">
	<main>
		<section class="container box">
			<img src="../img/phub.jpg" alt="placeholder+image" class="loader-2 animated jackInTheBox infinite slower">
			<div class="row">
				<div class="col-md-2" id="sidebar-container">
					<div class="meta">
						<div class="logo">
							<img src="../img/phub.jpg" class="img img-responsive">
						</div>
						<h3>Quiz App</h3>
					</div>
					<div class="menu">
						<ul>
							<li><a href="app.php"><span class="glyphicon glyphicon-dashboard"></span>  Dashboard</a></li>
							<li><a href="create-quiz.php"><span class="glyphicon glyphicon-edit"></span>  Create Quiz</a></li>
							<li class="active"><a href="add-question.php"><span class="glyphicon glyphicon-plus"></span> Add Questions</a></li>
							<li><a><span class="glyphicon glyphicon-list"></span> Results</a></li>
							<li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Log out</a></li>
						</ul>
					</div>
					<div class="version">Quiz App V1.0</div>
				</div>
				<div class="col-md-1"></div>
				<div class="col-md-9" id="main-container">
					<h3 class="page-header">Add Questions</h3>
					<?php if(!empty($msg)): ?>
					<script>
						alert("<?php echo $msg ?>");
					</script>
				<?php endif; ?>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">Add Quiz Package</div>
								<form method="post" style="margin-top: 2%;">
									<div class="form-group">
										<label class="">Select Quiz </label>
										<select required  name="quizpack_id" class="form-control">
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
									<div class="form-group">
										<label>Question: </label>
										<textarea name="question" required class="form-control"></textarea>
									</div>
									<div class="row">
										<div class="form-group col-md-4">
											<label>A</label>
											<input type="text" required name="option_A" class="form-control">
										</div>
										<div class="form-group col-md-4">
											<label>B</label>
											<input type="text" required name="option_B" class="form-control">
										</div>
										<div class="form-group col-md-4">
											<label>C</label>
											<input type="text" required name="option_C" class="form-control">
										</div>
										<div class="form-group col-md-4">
											<label>D</label>
											<input type="text" required name="option_D" class="form-control">
										</div>
										<div class="form-group col-md-4">
											<label>Answer</label>
											<input type="text" required name="answer" class="form-control">
										</div>
										<div class="form-group col-md-4">
											<h2></h2>
											<button style="width: 100%" name="submit" class="btn btn-md btn-success">Submit</button>
										</div>
									</div>
								</form>
							</div>

							<div class="card">
								<div class="card-header">Import Question (CSV)</div>

								<form method="post" class="form-inline" enctype="multipart/form-data" style="margin-top:2%">
									<div class="form-group">
										<select required  name="quizpack_id" class="form-control">
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
									<div class="form-group">
										<input type="file" name="csv" required class="form-control" accept=".csv">
									</div>
									
									<button name="import" type="submit" class="btn btn-md btn-success"><span class="glyphicon glyphicon-download"></span> Import</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>
</body>
</html>