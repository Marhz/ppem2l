<?php

use Models\User;
use Models\users;
use Core\Session;
use Core\MyMailer;
use Models\Formation;

$id = $_GET['id'];
$formation = Formation::find($id);
if(!$formation->users->contains(auth('user')->id)){
	Session::setFlash("Vous n'ête pas inscrit à cette formation", "warning");
	redirect(baseUrl());
}
if(auth('user')->formations()->find($id)->pivot->valide == 1){
	$users = User::where('credit', '>=', $formation->cout)
		->where('nbr_jour', '>=', $formation->duree)
		->whereHas('formations', function ($query) use ($id) {
			$query->where('attribution_formations.valide', 2)->where('formation_id', $id);
		})
		->get()
		->each(function ($user) use($formation) {
			$user->credit -= $formation->cout;
			$user->nbr_jour -= $formation->duree;
			$user->save();
			$user->formations()->updateExistingPivot($formation->id, ['valide' => 0]);
		});
	MyMailer::sendMail($users->pluck('email')->toArray(), "M2L - Formations", "Une place s'est librée dans la formation".$formation->title);
}
auth('user')->formations()->detach($id);
auth('user')->formations()->attach($id);
redirectBack();