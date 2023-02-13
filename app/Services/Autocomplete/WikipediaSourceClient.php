<?php

namespace App\Services\Autocomplete;

class WikipediaSourceClient implements SourceClientInterface
{
    private string $source = "https://en.wikipedia.org/wiki/World_Wide_Web";

    public function searchWord(string $substring): array
    {
        $html = file_get_contents($this->source);
        $text = strip_tags($html);
        
        $cleanText = preg_replace('/[^A-Z a-z]/', ' ', $text);
        
        $arrWords = array_unique(explode(' ', $cleanText));
        
        $arrWordsFiltered = array_filter($arrWords, function($word) use ($substring){
            return str_contains($word, $substring);
        });

        return array_values($arrWordsFiltered);
    }
}