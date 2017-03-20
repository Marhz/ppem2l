<?php

use Core\Error;
use Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
		dd($_SERVER);

if(!auth('user')->isAdmin())
	Error::set(403);

switch ($_GET['action']) {
	case 'delete':
		deleteUser();
		break;
	case 'edit':
		editUser();
		break;
	default:
		dd($_SERVER);
		break;
}
die();


try
{
	$user = User::findOrFail($_GET['id']);
	$user->deleted_at = Carbon::now();
	$user->save();
	if($user->isChef())
	{
		$user->load('employes')
			->employes
			->each(function ($employe){
				$employe->update(['chef_id' => null]);
			});
	}

}
catch (ModelNotFoundException $e)
{
	Error::set(404);
}