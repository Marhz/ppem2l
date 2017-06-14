<?php

use Core\Error;
use Models\Prestataire;

if(!auth('user')->isAdmin())
	Error::set(403);
try {
	Prestataire::findOrFail($_GET['id'])->delete();
}
catch(\Exception $e) {
	Error::set(404);
}

redirect(baseUrl().'admin#prestataires');