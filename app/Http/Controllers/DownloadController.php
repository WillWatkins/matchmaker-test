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
            'event_id' => ['required', 'numeric'],
            'occurred_at' => ['required', 'date'],
            'data' => [
                'episode_id' => ['required', 'numeric'],
                'podcast_id' => ['required', 'numeric']
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

        return response()->json([
            'type' => $type, 
            'event_id' => $event_id,  
            'occurred_at' => $occurred_at,
            'episode_id' => $episode_id,
            'podcast_id' => $podcast_id
        ],201);
    }

    public function getDailyDownloads(Request $request) 
    {
        $validated = $request->validate([
            'episode_id' => ['required','numeric']
        ]);

        $episode_id = $request->get('episode_id');

        $daily_downloads = Download::selectRaw('DATE(occurred_at) as date, COUNT(occurred_at) as count')
            ->where('episode_id', $episode_id)
            ->whereBetween('occurred_at', ['2022-07-10', '2022-07-16'])
            ->groupByRaw('DATE(occurred_at)')
            ->get();
            
        return response()->json([
            'episode_id' => $episode_id,
            'daily_downloads' => $daily_downloads
        ]);
    }
}
