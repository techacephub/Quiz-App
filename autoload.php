<?php
session_start();
spl_autoload_register(function($class){
	require "class/". $class . ".php";
});