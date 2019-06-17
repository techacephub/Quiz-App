<?php
session_start();
unset($_SESSION['quiz_pack_id']);
ob_flush();
header('location: quiz_package.php');