<?php

namespace Database\Factories;

use App\Models\Download;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Download>
 */
class DownloadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Download::class;

    public function definition()
    {
        $random_num = rand(1,15);

        $date = Carbon::now()->subDays($random_num)->toIso8601String();

        return [
            'type' => 'episode.downloaded',
            'event_id' => rand(1,10),
            'occurred_at' => $date,
            'episode_id' => rand(1,5),
            'podcast_id' => rand(1,5)
        ];
    }
}
