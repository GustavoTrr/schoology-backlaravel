<?php

namespace App\Services\Autocomplete;

interface SourceClientInterface
{
    /**
     * Searchs for words that contains the given substring
     *
     * @param string $substring
     * @return array
     */
    public function searchWord(string $substring): array;
}