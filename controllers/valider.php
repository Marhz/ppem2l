<?php

use Illuminate\Support\Facades\DB;
	include('models/get_formations.php');
	extract($_POST);
	// Core\MyMailer::sendMail('gderemusat@gmail.com','hello','there');
	// validerFormation($bdd, $id_u, $id_f,$valide);
	Models\User::find($id_u)->formations()->updateExistingPivot($id_f, ['valide' => $valide]);
	header("location: validerFormations");