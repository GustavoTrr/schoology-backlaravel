<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\AutocompleteService;
use Illuminate\Http\Request;

class AutocompleteController extends Controller
{
    /**
     * Search for the word that contains the given substring
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $this->validate($request,['q' => 'string|required']);

        try {
            return AutocompleteService::SearchWord($request->q);
        } catch (\Throwable $th) {
            return json_encode(['error' => $th->getMessage()]);
        }
    }

}
