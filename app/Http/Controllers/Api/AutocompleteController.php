<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Autocomplete\AutocompleteService;
use Illuminate\Http\Request;

class AutocompleteController extends Controller
{
    private AutocompleteService $autocompleteService;

    public function __construct(AutocompleteService $autocompleteService)
    {
        $this->autocompleteService = $autocompleteService;
    }

    /**
     * Search for the word that contains the given substring
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $this->validate($request,['q' => 'bail|required|string|alpha:ascii']);

        try {
            return $this->autocompleteService->searchWord($request->q);
        } catch (\Throwable $th) {
            return json_encode(['error' => $th->getMessage()]);
        }
    }

}
