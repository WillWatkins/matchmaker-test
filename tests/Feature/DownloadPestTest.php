<?php

use App\Models\Download;

test('has webpage', function() {
    $response = $this->get('/');

    $response->assertStatus(200);
});

test('data added to database', function() {
    $data_to_add = [
        'type'=> 'episode.downloaded',
        'event_id'=> '1234567',
        'occurred_at'=> '2020-07-10 15:00:00.000',
        'data'=> [
            'episode_id'=> '1',
            'podcast_id'=> '1'
        ] 
    ];

    //Test the event_id is not present in the databae before adding
    $database_before_adding = Download::select('*')
        ->where('event_id', '1234567')
        ->get();

    $this->assertEmpty($database_before_adding);

    //Add the data
    $response = $this->get(route('storeData', $data_to_add));

    //Test the event_id is present in the database after adding
    $database_after_adding = Download::select('*')
    ->where('event_id', '1234567')
    ->get();
    // dd($database_after_adding, $database_before_adding);

    $this->assertCount(1, $database_after_adding);

    $response->assertStatus(201);
});

test('addData fails if a prop is invalid', function() {
    //Missing event_id
    $data_to_add = [
        'type'=> 'episode.downloaded',
        'occurred_at'=> '2020-07-10 15:00:00.000',
        'data'=> [
            'episode_id'=> '1',
            'podcast_id'=> '1'
        ] 
    ];

    $response = $this->withHeaders(['Accept' => 'application/json',])
        ->get(route('storeData', $data_to_add));

    $response->assertStatus(422);
    
    $response = $this->withHeaders(['Accept' => 'application/json',])
    ->get(route('storeData'));

    $response->assertStatus(422);
});

test('getDailyDownloads returns json with episode id and array of downloads', function() {
    $episode_id = [
        'episode_id' => '1'
    ];
    $response = $this->get(route('dailyDownloads', $episode_id));
    
    $response->assertStatus(200);
    expect($response->original['episode_id'])->tobeString();
    expect($response->original['daily_downloads'])->toBeObject();
});

test('getDailyDownloads fails if an episode_id is invalid', function() {
    $episode_id = null;

    $response = $this->withHeaders(['Accept' => 'application/json',])
        ->get(route('dailyDownloads', $episode_id));
    
    $response->assertStatus(422);
});

/*
Other tests/functionality to add:

TESTS
- If a property is valid but doens't exist in the database yet. I.e. a valid episode_id.

FUNCTIONALITY
- When there is no data in the databse to retreive for that episode_id

*/