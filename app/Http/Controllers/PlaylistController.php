<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Playlist;
use Database\Seeders\PlaylistSeeder;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    public function index()
    {
        return Playlist::WithRelationships(request('with', []))
            ->Search(request('query'))
            ->orderBy(request('sort', 'name'), request('order', 'asc'))
            ->simplePaginate(request('limit'));
    }

    public function show(Playlist $playlist)
    {
        return $playlist->load(request('with', []));
    }



}
