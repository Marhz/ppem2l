<?php
	include('models/get_form.php');
	$user_formations_history=get_user_formations_history();
	foreach ($user_formations_history as $cle => $user_formations_historys) 
	{
		$user_formations_history[$cle]['titre'] = htmlspecialchars($user_formations_historys['titre']);
		$user_formations_history[$cle]['valide'] = $user_formations_history[$cle]['titre'] == 1 ? "valide" : null;
	}

	include_once('views/compte.php');