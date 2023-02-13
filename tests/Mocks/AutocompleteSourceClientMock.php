<?php

namespace Tests\Mocks;

use App\Services\Autocomplete\SourceClientInterface;

class AutocompleteSourceClientMock implements SourceClientInterface
{
    public function searchWord(string $substring): array
    {
        return ['word1', 'word2', 'word3', 'word4', 'word5'];
    }
}