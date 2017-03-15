<?php
use Core\Error;
use Core\Session;
use Models\Formation;
use Illuminate\Database\Eloquent\ModelNotFoundException;

if(!isset($_GET['id']))
	Error::set(404);
try
{
	$formation = Formation::with('comments.user', 'adresse')->findOrFail($_GET["id"]);
}
catch (ModelNotFoundException $e)
{
	Error::set(404);
}
$formation->disabled = ($formation->users->contains(auth('user')->id) || $formation->users->count() == $formation->nb_places);
$comments = $formation->comments;
foreach ($comments as $comment)
	$comment->can_delete = ($comment->user_id == auth('user')->id);
$comments = $comments->toJson(escapeJson());
Session::js('https://maps.googleapis.com/maps/api/js?key=AIzaSyANz8Gma3RBMuV6u-5Bz0bfKMsc6GooE3g&callback=myApp.$refs.maps.initMap"
        async defer');
include_once('views/formations.php');