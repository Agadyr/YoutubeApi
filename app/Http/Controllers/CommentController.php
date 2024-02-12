<?php

namespace App\Http\Controllers;

use App\Enums\Period;
use App\Models\Comment;
use App\Models\User;
use App\Models\Video;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    public function index()
    {
        return Comment::WithRelationships(request('with'))
            ->fromPeriod(Period::tryFrom(request('period')))
            ->Search(request('query'))
            ->orderBy(request('sort', 'created_at'), request('order', 'desc'))
            ->simplePaginate(request('limit'));

    }

    public function show(Comment $comment)
    {
        return $comment->loadRelationships(request('with'));
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

        Gate::allowIf(fn(User $user) => $user->id === $comment->user_id && $user->tokenCan('comment:update'));

        $attributes = $request->validate([
            'text' => 'required|string',
        ]);

        $comment->fill($attributes)->save();
    }

    public function delete(Comment $comment)
    {
        Gate::allowIf(fn(User $user) => $user->id === $comment->user_id && $user->tokenCan('comment:delete'));

        $comment->delete();
    }
}
