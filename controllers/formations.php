<?php
use Core\Error;
use Models\Formation;
use Illuminate\Database\Eloquent\ModelNotFoundException;

if(!isset($_GET['id']))
	Error::set(404);
try
{
	$formation = Formation::with('comments.user')->findOrFail($_GET["id"]);
}
catch (ModelNotFoundException $e)
{
	Error::set(404);
}
$comments = $formation->comments;
foreach ($comments as $comment)
	$comment->can_delete = ($comment->user_id == auth('user')->id);
$comments = $comments->toJson(escapeJson());
include_once('views/formations.php');