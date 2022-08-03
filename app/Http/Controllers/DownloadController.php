<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Download;

class DownloadController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => ['required', 'string'],
            'event_id' => ['required', 'string'],
            'occurred_at' => ['required', 'string'],
            'data' => [
                'episode_id' => ['required', 'string'],
                'podcast_id' => ['required', 'string']
            ]
        ]);

        $type = $request->get('type');
        $event_id = $request->get('event_id');
        $occurred_at = $request->get('occurred_at');
        $episode_id = $request->get('data')['episode_id'];
        $podcast_id = $request->get('data')['podcast_id'];

        Download::insert([
            'type' => $type, 
            'event_id' => $event_id,  
            'occurred_at' => $occurred_at,
            'episode_id' => $episode_id,
            'podcast_id' => $podcast_id
        ]);
    }
}
