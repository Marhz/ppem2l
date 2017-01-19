<?php
	function changeMdp($bdd, $email, $mdp)
	{
		$req = $bdd->prepare('UPDATE users SET password = :mdp WHERE email = :email');
		return $req->execute([
			':email' => $email,
			':mdp' => $mdp
		]);

	}