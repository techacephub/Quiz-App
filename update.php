<?php
require 'autoload.php';
$quiz = new Quiz();

if(isset($_POST['flag']) AND $_POST['flag'] == 1){
	$flag = $_POST['flag'];
	$class = $_POST['cl'];
	$qp = $_POST['qp'];
	
	$quiz->scoreCont($qp,$class);
	
}

if(isset($_POST['flag']) AND $_POST['flag'] == 0){
	$flag = $_POST['flag'];
	$class = $_POST['cl'];
	$qp = $_POST['qp'];
	
	$quiz->scoreAsZero($qp,$class);
}