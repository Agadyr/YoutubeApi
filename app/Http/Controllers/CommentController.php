<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use League\CommonMark\Reference\Reference;

class CommentController extends Controller
{
    public function index()
    {
        return Comment::with('parent', 'user', 'video')->get();
    }

    public function show(Comment $comment)
    {
        return $comment;
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'text' => 'required|string',
            'parent_id' => 'exists:comments,id',
            'video_id' => 'required_without:parent_id|exists:videos,id',
        ]);



        return Comment::create($attributes);
    }

    public function update(Comment $comment, Request $request)
    {

//        abort_if($request->user()->isNot($comment->user), Response::HTTP_UNAUTHORIZED ,'Unauthorized');

        $this->check($comment, $request);

        $attributes = $request->validate([
            'text' => 'required|string',
        ]);

        $comment->fill($attributes)->save();
    }

    public function delete(Request $request,Comment $comment)
    {
        $this->check($comment, $request);
        $comment->delete();
    }
    private function check(Comment $comment, Request $request){
        throw_if($request->user()->isNot($comment->user), AuthorizationException::class);

    }
}
