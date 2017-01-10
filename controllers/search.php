<?php
	include('models/search_formations.php');
	$formations = search_formations($_POST['search']);

	include_once('views/test.php');