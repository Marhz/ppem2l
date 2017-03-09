<?php
	if(isset($_COOKIE['remember']))
	{
		$user = Models\User::where('id', $_SESSION['user']->id)->first();
		$user->token = "";
		$user->save();
		setcookie('remember',$user->token, time() - 42);
	}
	session_destroy();
	header("location:index.php");