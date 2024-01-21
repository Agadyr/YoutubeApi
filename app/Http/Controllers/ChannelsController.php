<?php

namespace App\Http\Controllers;

use App\Models\Channel;

class ChannelsController extends Controller
{
    public function index()
    {

        return Channel::with('user', 'videos')->get();
    }

    public function show(Channel $channel)
    {
        return $channel->load('user', 'videos');
    }
}
