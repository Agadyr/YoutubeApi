<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        return Video::with('channel','categories')->get();
    }

    public function show(Video $video)
    {
        return $video->load('categories');
    }
}
