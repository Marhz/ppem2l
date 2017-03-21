<?php

use Core\Error;
use Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;


if(!auth('user')->isAdmin())
	Error::set(403);

switch ($_GET['action']) {
	case 'delete':
		deleteUser();
		break;
	case 'edit':
		methodIs('get') ? editUser() : updateUser();
		break;
	default:
		dd($_SERVER);
		break;
}


public function deleteUser()
{
	try
	{
		if($user->isChef())
		{
			$user->load('employes')
				->employes
				->each(function ($employe){
					$employe->update(['chef_id' => null]);
		$user = User::findOrFail($_GET['id']);
		$user->deleted_at = Carbon::now();
		$user->save();
				});
		}

	}
	catch (ModelNotFoundException $e)
	{
		Error::set(404);
	}
}

public function editUser()
{

}
