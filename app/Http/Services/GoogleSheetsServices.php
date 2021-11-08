<?php

namespace App\Http\Services;

// use Google\Client;
// use Google\Service\Sheets;
// use Google\Service\ValueRange;

use Google_Client;
use Google_Service_Sheets;
use Google_Service_Sheets_ValueRange;



class GoogleSheetsServices
{

    public $client, $services, $documentId, $range;

    public function __construct()
    {
        $this->client = new Google_Client();
        $this->client->setAuthConfig(storage_path('credentials.json'));
        $this->client->addScope("https://www.googleapis.com/auth/spreadsheets");
        $this->googleSheetService = new Google_Service_Sheets($this->client);
        $this->service = new Google_Service_Sheets($this->client);
        $this->documentId = '1FYMwlxvRexxT8dqLtHvMe1uEBhOmhQasR-cmYT5xCcs';
        $this->range = 'A:Z';
    }


    public function readSheet()
    {
        $doc = $this->service->spreadsheets_values->get($this->documentId, $this->range);
        return $doc;
    }

    public function writeSheet($values)
    {

        $body = new Google_Service_Sheets_ValueRange([
            'values' => $values
        ]);

        $params = [
            'valueInputOption' => 'RAW'
        ];
        $result = $this->service->spreadsheets_values->update(
            $this->documentId,
            $this->range,
            $body,
            $params
        );
    }

    public function appendSheet($values)
    {

        // $values = [
        //     [
        //         // Cell values ...
        //     ],
        //     // Additional rows ...
        // ];
        $body = new Google_Service_Sheets_ValueRange([
            'values' => $values
        ]);

        $params = [
            'valueInputOption' => 'USER_ENTERED'
        ];
        $result = $this->service->spreadsheets_values->append(
            $this->documentId,
            $this->range,
            $body,
            $params
        );
    }
}
