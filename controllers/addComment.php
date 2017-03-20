<?php

use Core\Error;
use Models\Comment;

if(!methodIs('post'))
	Error::set(404);
extract($_POST);
header('Content-type: application/json');
if($content == ''){
	Error::set(400,false);
	echo json_encode($error[0] = 'Veuillez écrire un commentaire.');
	die();
}
if(isset($editId))
{
	$comment = Comment::find($editId);
	$comment->content = $content;
	$comment->save();
	// dd($comment->save());
}
else
{
	$comment = Comment::create([
		'content' => $content,
		'formation_id' => $formationId,
		'user_id' => auth('user')->id
	]);
	$comment->can_delete = true;
}
echo $comment->load('user')->toJson(escapeJson());
die();