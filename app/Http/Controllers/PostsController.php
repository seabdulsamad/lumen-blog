<?php

namespace App\Http\Controllers;

use App\Comment;

class PostsController extends Controller
{

    const MODEL = "App\Post";

    use RESTActions;

    public function comments($id)
    {
        return Comment::with('user')->where('post_id', $id)->get();
    }
}
