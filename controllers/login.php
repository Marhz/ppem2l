<?php

	if(!isset($_SESSION['connecte']))
	{
		include('views/login.php');
		include("models/login.php");
	}