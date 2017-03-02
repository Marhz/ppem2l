<?php

use Core\Error;
use Models\Comment;

if(!methodIs('post'))
	Error::set(404);
extract($_POST);
$comment = Comment::create([
	'content' => $content,
	'formation_id' => $formationId,
	'user_id' => auth('user')->id
]);
$comment->can_delete = true;
echo $comment->load('user')->toJson(escapeJson());
die();