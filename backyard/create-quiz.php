<?php
	require '../autoload.php';
	$quiz = new Quiz();
	if(!$_SESSION['userid']){
		header('location: index.php');
	}
	if(isset($_POST['submit'])){
		//$isSaved = $quiz->createQuiz();
		$quiz_name = $_POST['q_name'];
		$quiz_timer = $_POST['timer'];

		$cont = $_POST['cont'];
		$stringify = implode(',', $cont);
		$countContestant = count($cont);

		$data = array(
			"quiz_name" => $quiz_name,
			"num_contestant" => $countContestant,
			"contestants" => $stringify,
			"timer" => $quiz_timer
		);

		$isSaved = $quiz->createQuiz('quiz_pack',$data);

		if($isSaved){
			$msg = $quiz->alertMessage();
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
	<script>
		$(document).ready(function(){
			$(".nc").on('click', function(ev){
				ev.preventDefault();
	
				let n_cont = parseInt($(".ncont").val());
				var field = "";
				for (var i = 1; i <= n_cont; i++) {
					field += "<div class='form-group'>";
					field += "<label>Contestant "+i+"</label>";
					field += "<input type='text' name='cont[]' class='form-control'/>";
					field += "</div>";

					$(".formloader").html(field);
				}

				
			})
		})
	</script>
</head>
<body style="font-size: 13px">
	<main>
		<section class="container box">
			<img src="../img/phub.jpg" alt="placeholder+image" class="loader-2 animated jackInTheBox infinite slower">
			<div class="row">
				<div class="col-md-2 col-lg-2" id="sidebar-container">
					<div class="meta">
						<div class="logo">
							<img src="../img/phub.jpg" class="img img-responsive">
						</div>
						<h3>Quiz App</h3>
					</div>
					<div class="menu">
						<ul>
							<li><a href="app.php"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
							<li class="active"><a href="create-quiz.php"><span class="glyphicon glyphicon-edit"></span> Create Quiz</a></li>
							<li><a href="add-question.php"><span class="glyphicon glyphicon-plus"></span> Add Questions</a></li>
							<li><a><span class="glyphicon glyphicon-list"></span> Results</a></li>
							<li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Log out</a></li>
						</ul>
					</div>
					<div class="version">Quiz App V1.0</div>
				</div>
				<div class="col-md-1 col-lg-1"></div>
				<div class="col-md-9 col-lg-9" id="main-container">
					<h3 class="page-header">Create Quiz Package</h3>
					<?php if(!empty($msg)): ?>
					<div class="alert alert-success alert-dismissible fade in">
						<a href="#" class="close" data-dismiss="alert">&times;</a>
						<?php echo $msg; ?>
					</div>
				<?php endif; ?>
					<div class="row">
						<form method="post">
							<div class="col-md-6 col-lg-6">
								<div class="card">
									<div class="card-header">Add Quiz Package</div>
									
										<div class="form-group">
											<label>Quiz Name: </label>
											<input type="text" name="q_name" class="form-control">
										</div>
								</div>

								<div class="card">
									<div class="card-header">Quiz Config</div>
									<div>
										<div class="form-group">
											<label>Set Timer Count Down: </label>
											<select class="form-control" name="timer">
												<option value="" selected>--Choose--</option>
												<option value="15">15</option>
												<option value="20">20</option>
												<option value="25">25</option>
												<option value="30">30</option>
												<option value="35">35</option>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-lg-6">
								<div class="card">
									<div class="card-header">Add Contestants</div>
									<div class="form-inline">
										<div class="form-group">
											<label>Number of contestant: </label>
											<input type="text" name="n_cont" class="form-control ncont input-sm" required>
											<button class="btn nc btn-sm btn-default">submit</button>
										</div>		
									</div>
									<div class="formloader"></div>
									<button style="margin-top: 8%;" class="btn btn-success btn-md" name="submit" type="submit">Submit</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
	</main>
	
</body>
</html>