<?php

namespace App\Http\Controllers;

use App\Enums\Period;
use App\Models\Channel;
use App\Models\Video;

class ChannelsController extends Controller
{
    public function index()
    {
        return Channel::WithRelationships(request('with'))
            ->Search(request('query'))
            ->orderBy(request('sort', 'name'), request('order', 'asc'))
            ->simplePaginate(request('limit'));
    }

    public function show(Channel $channel)
    {
        return $channel->loadRelationships(request('with'));
    }

}
