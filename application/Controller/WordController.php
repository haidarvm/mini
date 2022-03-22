<?php

namespace Mini\Controller;

use GuzzleHttp\Client;

class WordController {
    public function mean($word) {
        // $word = $request->get('word');
        $client = new Client();
        $responseApi = $client->get('https://api.dictionaryapi.dev/api/v2/entries/en/' . $word);
        $body = $responseApi->getBody();
        header('Content-Type: application/json');
        echo $body->getContents();
    }
}
