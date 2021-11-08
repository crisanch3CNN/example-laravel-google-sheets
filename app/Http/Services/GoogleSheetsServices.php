<?php

namespace App\Http\Services;

use Google\Client;
use Google\Service\Sheets;
use Google\Service\ValueRange;


class GoogleSheetsServices
{

    public $client, $services, $documentId, $range;

    public function __construct()
    {
        $this->client = $this->getClient();
        $this->service = new Sheets($this->client);
        $this->documentId = '1FYMwlxvRexxT8dqLtHvMe1uEBhOmhQasR-cmYT5xCcs';
        $this->range = 'A:Z';
    }

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
        $doc = $this->service->spreadsheets_values->get($this->documentId, $this->range);
        return $doc;
    }
}
