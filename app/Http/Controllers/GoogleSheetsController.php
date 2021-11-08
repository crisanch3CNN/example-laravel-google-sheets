<?php

namespace App\Http\Controllers;

use Google\Service\Sheets;
use Illuminate\Http\Request;
use App\Http\Services\GoogleSheetsServices;

class GoogleSheetsController extends Controller
{
    public function sheetOperation(Request $request)
    {
        $data = (new GoogleSheetsServices())->readSheet();
        dd($data);
        return response()->json($data);
    }
}
