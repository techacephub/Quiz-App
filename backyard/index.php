<?php
	require '../autoload.php';
	$quiz = new Quiz();
	
	if(isset($_POST['login'])){
		$isTrue = $quiz->do_login($_POST);
		if($isTrue){
			$_SESSION['userid'] = $quiz->getUserID();
			header('location: app.php');
		}else{
			$error = $quiz->alertError();
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
	<script type="text/javascript" src="../jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</head>
<body>
	<img src="../img/phub.jpg" alt="placeholder+image" class="loader animated jackInTheBox infinite slower">
	<div class="container box1" id="box1">
		<div class="col-md-12 col-lg-12">
			<div class="col-md-6 col-lg-6  col-md-offset-3 col-lg-offset-3 instruction" style="">
				<h2 class="text-center text-uppercase">Login</h2>
				<?php if(!empty($error)): ?>
					<div class="alert alert-danger alert-dismissible fade in">
						<a href="#" class="close" data-dismiss="alert">&times;</a>
						<?php echo $error; ?>
					</div>
				<?php endif; ?>
				<form role="form" method="post" autocomplete="off">
					<div class="form-group">
						<label class="control-label">Username:</label>
						<input type="text" name="username" id="username" placeholder="username" class="form-control" required>
					</div>
					<div class="form-group">
						<label class="control-label">Password:</label>
						<input type="password" name="password" id="password" placeholder="" class="form-control" required>
					</div>
					
					<button name="login" type="submit" class="btn btn-success btn-lg btn-block" id="btn-anim">Log in</button>
		
				</form>
			</div>
		</div>
	</div>
</body>
</html>