<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Video;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Video::take(3)->get()
            ->flatMap(fn(Video $video) => static::seedCommentsfor($video)
            )->each(fn(Comment $comment) => static::associateParentComment($comment));
    }

    private static function seedCommentsfor(Video $video)
    {
        $comments = Comment::factory(10)->create();
        $video->comments()->saveMany($comments);

        return $comments;
    }

    private static function associateParentComment(Comment $comment)
    {
        if ($comment->replies->isNotEmpty()) return;
        $comment->parent()->associate(static::findRandomParent($comment))->save();
    }

    private static function findRandomParent(Comment $comment)
    {
        return $comment->video
            ->comments()
            ->doesntHave('parent')
            ->where('id', '<>', $comment->id)
            ->inRandomOrder()
            ->first();
    }
}
