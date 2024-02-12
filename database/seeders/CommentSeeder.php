<?php

namespace Database\Seeders;

use App\Models\Category;
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
        Video::take(2)
            ->get()
            ->flatMap(fn(Video $video) => $this->forVideo($video))
            ->flatMap(fn(Comment $comment) => $this->repliesOf($comment))
            ->flatMap(fn(Comment $comment) => $this->repliesOf($comment))
            ->flatMap(fn(Comment $comment) => $this->repliesOf($comment));
    }

    private function forVideo(Video $video)
    {
        return Comment::factory(2)->for($video)->create();
    }

    private function repliesOf(Comment $comment)
    {
        return Comment::factory(2)->for($comment->video)->for($comment, 'parent')->create();
    }
}
