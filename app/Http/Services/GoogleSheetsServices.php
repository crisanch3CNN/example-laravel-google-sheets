<?php

namespace App\Http\Services;

use Google\Client;
use Google\Service\Sheets;
use Google\Service\ValueRange;


class GoogleSheetsServices
{


    public function getClient()
    {
        $client = new Client();
        $client->setApplicationName('Google Sheets Demo');
        $client->setRedirectUri('http://localhost/goolesheets');
        $client->setScopes(sheets::SPREADSHEETS);
        $client->setAuthConfig('credentials.json');
        $client->setAccessType('offline');

        return $client;
    }
    public function readSheet()
    {
        $client = $this->getClient();
        $service = new Sheets($client);
        $documentId = '1FYMwlxvRexxT8dqLtHvMe1uEBhOmhQasR-cmYT5xCcs';
        $range = 'A:Z';
        $doc = $service->spreadsheets_values->get($documentId, $range);
        return $doc;
    }
}
