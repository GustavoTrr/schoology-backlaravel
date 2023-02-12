<?php

namespace App\Services;

use Faker\Factory;

class AutocompleteService
{
    public static function SearchWord(string $substring)
    {
        //sanitizing
        if (count(explode(' ', $substring)) > 1) {
            throw new \Exception('Only a single word can be searched on this function', 1);
        }
        $substring = trim($substring);

        $faker = Factory::create();

        $fakeText = $faker->realText(5000);
        $cleanFakeText = preg_replace('/[^A-Z a-z]/', '', $fakeText);
        $arrWords = array_unique(explode(' ', $cleanFakeText));
        
        $wordsToReturn = array_filter($arrWords, function($word) use ($substring){
            return str_contains($word, $substring);
        });

        return array_slice($wordsToReturn, 0, 5);
    }
}