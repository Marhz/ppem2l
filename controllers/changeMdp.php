<?php
	use Models\User;
	use Core\Session;
	extract($_POST);
	if (isset($submit)) 
	{
		$user=auth('user');
		if(sha1($oldpassword)==$user->password)
		{
			if($newpassword==$newpasswordconfirm)
			{
				$user->password=sha1($newpassword);
				$user->save();
				Session::setflash("Mot de passe modifié !");
			}
			else
			{
				Session::setflash("Les mots de passes ne correspondent pas !","warning");
			}
		}
		else
		{
			Session::setflash("Mauvais mot de passe !","warning");
		}
	}
	include("views/changeMdp.php");
?>