<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
        return 'test ok!';
    }

}
