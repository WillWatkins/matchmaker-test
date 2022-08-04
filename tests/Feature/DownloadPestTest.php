<?php

test('has webpage', function() {
    $response = $this->get('/');

    $response->assertStatus(200);
});

test('data recevied in controller', function() {
    $data_to_add = [
        'type'=> 'episode.downloaded',
        'event_id'=> '1234',
        'occurred_at'=> '2020-07-10 15:00:00.000',
        'data'=> [
            'episode_id'=> '1',
            'podcast_id'=> '1'
        ] 
    ];
    $response = $this->get(route('storeData', $data_to_add));

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
- If a prop is valid but doens't exist in the database yet. I.e. a valid episode_id.
- Test that the database receives the added download data. 

FUNCTIONALITY
- When there is no data in the databse to retreive for that episode

*/