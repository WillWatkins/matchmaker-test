<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Download;

class DownloadController extends Controller
{
    public function store(Request $request)
    {

        $type = $request->get('type');
        $event_id = $request->get('event_id');
        $occurred_at = $request->get('occurred_at');
        $episode_id = $request->get('data')['episode_id'];
        $podcast_id = $request->get('data')['podcast_id'];

    }
}
