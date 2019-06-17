<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Quiz App</title>
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
		.dev-list .list-group li{
			border: none;
			background-color: transparent !important;
			font-size: 16px;
			text-transform: uppercase;
			font-weight: bold;
			padding-top: 5px;
			padding-bottom: 5px;
		}
		.dev-list span{
			text-transform: uppercase;
			color: lightgray;
			font-size: 13px;
		}
		.btn-dark{
			background-color: #00001a;
			font-size: 20px;
			color: white;
		}
		.btn-dark:hover{
			color: white !important;
		}
	</style>
</head>
<body>
	<!-- <img src="img/phub.jpg" alt="placeholder+image" class="loader animated jackInTheBox infinite slower"> -->
	<div class="container" id="box1" style="margin-top: 50px;">
		<div class="col-md-12" style="margin-bottom: 100px;">
			<div class="text-right">
				<img src="img/logomain.png" alt="placeholder+image" width="150" height="45">
				<h6 style="letter-spacing: 5px;">QUIZ APP</h6>
			</div>
		</div>
		<div class="col-md-12 col-lg-12">
			<div class="container">
				<div class="col-md-4">
					<h1 style="text-align: center; color: #58cfff; font-family: roboto; font-weight: bold;">RULES</h1>
				</div>
				<div class="col-md-6 col-lg-6 instruction" style="">
					<ul class="list-group">
						<li class="">Read questions carefully before answering them.</li>
						<li class="">Once your answer has been submitted, you cant change your answer.</li>
						<li class="">All audience should keep quiet while the competition is going on.</li>
						<li class="">A sound from the audience automatically disqualifies you.</li>
						<li class="">All members are to sitted quietly and orderly.</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-12" style="margin-top: 70px;">
		<div class="text-right">
			<h5 style="letter-spacing: 5px;">DEVELOPED BY PROGRAMAS HUB <span><img src="img/logo.png" alt="placeholder+image" width="100" height="100"></span></h5>
		</div>
		</div>
	</div>

	<div class="container box2" id="box2">
		
			<div class="col-md-4">
				<div class="text-right">
				<img src="img/logomain.png" class="" width="150" height="45">
				</div>
			</div>
			<div class="col-md-2">
				<div class="dev-name">
				
						<h1 style="transform: rotate(-90deg); margin-top: 300px; font-weight: bold; color: #58cfff; letter-spacing: 10px; text-transform: uppercase; font-size: 48px">Developers</h1>
					</div>
				</div>
					
					<div class="col-md-6 dev-list" style="">
						<ul class="list-group">
							<li class="list-group-item">Soneye Abimbola <span>(backend developer)</span></li>
							<li class="list-group-item">Dosunmu Afeez <span>(ui/ux developer)</span></li>
							<li class="list-group-item">Akintunde Ebenezer <span>(ui/ux designer)</span></li>
							<li class="list-group-item">Amusa Abisoye T <span>(ui/ux developer)</span></li>
							<li class="list-group-item">Omolewa Stephen <span>(backend developer)</span></li>
							<li class="list-group-item">Soyemi Olanrewaju <span>(ui/ux developer)</span></li>
							<li class="list-group-item">Faloye Joshua <span>(backend developer)</span></li>
							<li class="list-group-item">Okunowo Benjamin <span>(ui/ux designer)</span></li>
							<li class="list-group-item">Olaleye Emmanuel <span>(ui/ux developer)</span></li>
							
						</ul>
					</div>
					
			<div class="col-md-12" style="margin-top: 70px;">
		<div class="text-right">
			<h5 style="letter-spacing: 5px;">DEVELOPED BY PROGRAMAS HUB <span><img src="img/logo.png" alt="placeholder+image" width="100" height="100"></span></h5>
		</div>
		</div>
			</div>

		
	<div class="container box3" id="box3">
		<div class="row">
		<div class="col-md-12 col-lg-12" style="margin-bottom: 4%">
			<div class="col-md-6">
				<div class="title">LEVEL</div>
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
	
		<div class="col-md-12 col-lg-12">
			
			<div class="col-md-4 col-lg-4 col-md-offset-4 col-lg-offset-4">
				<button class="btn btn-block btn-dark">HND 2</button>
				<button class="btn btn-block btn-dark">HND 1</button>
				<button class="btn btn-block btn-dark">ND 2</button>
				<button class="btn btn-block btn-dark">ND 1</button>
				<br>
				<br>
				<a href="quiz_package.php" class="btn btn-success btn-lg btn-block start" id="btn-anim" style="background-color: #17eb76; color: black; border-radius: 50px; text-transform: uppercase; letter-spacing: 3px;">Click here to Start</a>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript">
	$(document).ready(function(){
		$('#box1').delay().fadeIn(1000).delay(5000).fadeOut(1000);
		$('#box2').delay(5000).fadeIn(1000).delay(4000).fadeOut(1000);
		$('#box3').delay(10000).fadeIn(1000);
	});
</script>
</html>