<?php

namespace App\Http\Controllers;
use App\Comment;
use App\Http\Requests\CommentFormRequest;

use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function newComment(CommentFormRequest $Request)
    {
    	$comment=new Comment(array(
          'post_id'=> $Request->get('post_id'),
          'content'=>$Request->get('content')
    	));
    	$comment->save();
    	return redirect()->back()->with('status','your comment has been created!');
    }
}
