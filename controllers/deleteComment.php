<?php

use Core\Error;
use Models\Comment;

if(!methodIs('post'))
	Error::set(404);
extract($_POST);
$comment = Comment::where('user_id', auth('user')->id)->find($commentId);
echo $comment->id;
$comment->delete();
die();