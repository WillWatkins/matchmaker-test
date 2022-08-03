<?php

namespace Database\Factories;

use App\Models\Download;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

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
        $random_date = rand(1,28);
        if ($random_date < 10) $random_date = '0' . $random_date;

        return [
            'type' => 'episode.downloaded',
            'event_id' => rand(1,10),
            'occurred_at' => '2022-07-' . $random_date . ' 15:00:00.000',
            'episode_id' => rand(1,5),
            'podcast_id' => rand(1,5)
        ];
    }
}
