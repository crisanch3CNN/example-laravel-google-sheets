<?php

namespace App\Http\Controllers;

use Google\Service\Sheets;
use Illuminate\Http\Request;
use App\Http\Services\GoogleSheetsServices;

class GoogleSheetsController extends Controller
{
    public function sheetOperation(Request $request)
    {
        // (new GoogleSheetsServices())->writeSheet([
        //     [
        //         'cris sanchez',
        //         'cris@gmail.com'
        //     ]
        // ]);
        (new GoogleSheetsServices())->appendSheet([
            [
                'cris sanchez',
                'cris@gmail.com'
            ]
        ]);

        $data = (new GoogleSheetsServices())->readSheet();
        dd($data);
        return response()->json($data);
    }
}
