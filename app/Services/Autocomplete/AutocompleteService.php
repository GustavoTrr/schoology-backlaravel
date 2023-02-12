<?php

namespace App\Services\Autocomplete;

use App\Services\Autocomplete\SourceClientInterface;

class AutocompleteService
{
    /**
     * @var SourceClientInterface
     */
    private SourceClientInterface $client;

    public function __construct(SourceClientInterface $client)
    {
        $this->client = $client;
    }

    public function searchWord(string $substring): array
    {
        //sanitizing
        if (count(explode(' ', $substring)) > 1) {
            throw new \Exception('Only a single word can be searched on this function', 1);
        }
        $substring = trim($substring);

        $words = $this->client->searchWord($substring);
        return array_slice($words, 0, 5);
    }
}