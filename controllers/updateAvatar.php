<?php

use Core\Session;
use Core\Validator;

$user = auth('user');

if($_FILES['avatar']['size'] > 0) {
	if(Validator::fileImage($_FILES['avatar'])) {
		$avatar = uploadImage($_FILES['avatar']);
		$user->update(['avatar' => $avatar]);
	}
}
else {
	Session::setFlash("fichier manquant", "warning");
}

redirectBack();