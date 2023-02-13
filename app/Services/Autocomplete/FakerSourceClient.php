<?php

namespace App\Services\Autocomplete;

use Faker\Factory;

class FakerSourceClient implements SourceClientInterface
{
    public function searchWord(string $substring): array
    {
        $wordsToReturn = [];

        $faker = Factory::create();

        $fakeText = $faker->realText(5000);
        $cleanFakeText = preg_replace('/[^A-Z a-z]/', '', $fakeText);
        $arrWords = array_unique(explode(' ', $cleanFakeText));
        
        $arrWordsFiltered = array_filter($arrWords, function($word) use ($substring){
            return str_contains($word, $substring);
        });

        return $arrWordsFiltered;
    }
}