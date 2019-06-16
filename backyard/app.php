<?php
	require '../autoload.php';
	$quiz = new Quiz();
	if(!$_SESSION['userid']){
		header('location: index.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Quiz App</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../animatecss/animate.min.css">
	<script type="text/javascript" src="../jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</head>
<body>
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
							<li><a href="app.php"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
							<li><a href="create-quiz.php"><span class="glyphicon glyphicon-edit"></span> Create Quiz</a></li>
							<li><a href="add-question.php"><span class="glyphicon glyphicon-plus"></span> Add Questions</a></li>
							<li><a href="manage-result.php"><span class="glyphicon glyphicon-list"></span>Results</a></li>
							<li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Log out</a></li>
						</ul>
					</div>
					<div class="version">Quiz App V1.0</div>
				</div>
				<div class="col-md-1"></div>
				<div class="col-md-9 text-center" id="main-container">
					<h1 class="text-muted">Quiz Dashboard</h1>
				</div>
			</div>
		</section>
	</main>
</body>
</html>