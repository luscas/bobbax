<?php

namespace App\Http\Controllers\Streaming;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class StreamingController extends Controller
{
    public $radios = [
        'habbonight' => 'https://stream2.svrdedicado.org:7104/stats?sid=1&json=1',
        'kihabbo' => 'https://s10.w3bserver.com/radio/8160/status-json.xsl',
        'Habblindados' => 'http://stream2.svrdedicado.org:8130/'
    ];

    /**
     * Streaming
     *
     * mame minha pica sua vagabunda
     * --------------------------
     * icon - varchar
     * name - varchar
     * url - varchar
     * status - enum(['ativo', 'inativo'])
     */
    public function getStats($url) {
        $data = Http::withOptions([
            'verify' => false
        ])
        ->get($url)
        ->json();


        if (isset($data['icestats'])) {
            $stats = $data['icestats']['source'];
            return [
                'locutor' => $stats['server_name'],
                'programa' => $stats['genre'],
                'ouvintes' => $stats['listeners'],
            ];
        } else if(str_contains($url, 'stats?sid=1&json=1')) { // Shoutcast v2
            return [
                'locutor' => $data['servertitle'],
                'programa' => $data['servergenre'],
                'ouvintes' => $data['currentlisteners'],
            ];
        } else {
            return $url;
        }
    }


    public function index() {
        $stats = [];

        foreach($this->radios as $radio => $url) {
            array_push($stats, ["name" => $radio, "stats" => $this->getStats($url)]);
        }

        return $stats;
    }

    public function stats ($radio) {
        return self::getStats($this->radios[$radio]);
    }
}
