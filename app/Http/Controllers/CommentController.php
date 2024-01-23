<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(){
        return Comment::with('parent','user','video')->get();
    }

    public function show(Comment $comment){
        return $comment;
    }
}
