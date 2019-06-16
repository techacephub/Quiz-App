<?php
session_start();
unset($_SESSION['userid']);
ob_flush();
header('location: index.php');