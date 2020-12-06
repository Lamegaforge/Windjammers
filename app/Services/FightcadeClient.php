<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class FightcadeClient
{
    public function user(string $username)
    {
        $attributes = [
            'req' => 'getuser',
            'username' => $username,
        ];

        $content = $this->call($attributes);

        return [
            'name' => $content['user']['name'],
            'gravatar' => 'https://www.gravatar.com/avatar/' . $content['user']['gravatar'] . '?s=160',
            'num_matches' => $content['user']['gameinfo']['wjammers']['num_matches'] ?? 0,
        ];
    }

    public function history(string $playerOne, string $playerTwo)
    {
        $results = collect();

        for ($i = 0; $i < 100; $i++) { 

            $attributes = [
                'limit' => 100,
                'offset' => $i * 15,
                'req' => 'searchquarks',
                'gameid' => "wjammers",
                'username' => $playerOne,
                'text' => $playerTwo,
            ];

            $content = $this->call($attributes);

            if (! $content['results']['results'])
            {
                break;
            }

            $results = $results->merge($content['results']['results']);
        }

        return $results;
    }

    protected function call(array $attributes)
    {
        $response = Http::post('https://www.fightcade.com/api/', $attributes);

        return json_decode($response->body(), true);
    }
}
                                                     