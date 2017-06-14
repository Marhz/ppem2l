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
		editUser();
		break;
	default:
		redirect(baseUrl().'ajouterUser/');
		break;
}


function deleteUser()
{
	try
	{
		$user = User::findOrFail($_GET['id']);
		if($user->isChef())
		{
			$user->load('employes')
				->employes
				->each(function ($employe){
					$employe->update(['chef_id' => null]);
				});
		}
		$formations = $user->formations;
		foreach ($formations as $formation) {
			$formation->users()->detach($user->id);
		}
		$user->delete();
	}
	catch (ModelNotFoundException $e)
	{
		Error::set(404);
	}
	redirectBack();
}

function editUser()
{
	if(methodIs('get'))
	{
		redirect(baseUrl().'ajouterUser/'.$_GET['id']);
	}
}
