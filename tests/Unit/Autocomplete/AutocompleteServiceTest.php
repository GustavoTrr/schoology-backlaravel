<?php

namespace Tests\Unit\Services\Autocomplete;

use App\Services\Autocomplete\AutocompleteService;
use App\Services\Autocomplete\SourceClientInterface;
use PHPUnit\Framework\TestCase;

class AutocompleteServiceTest extends TestCase
{
    /**
     * @var AutocompleteService
     */
    private $autocompleteService;

    /**
     * @var SourceClientInterface|\PHPUnit\Framework\MockObject\MockObject
     */
    private $client;

    protected function setUp(): void
    {
        $this->client = $this->createMock(SourceClientInterface::class);
        $this->autocompleteService = new AutocompleteService($this->client);
    }

    public function testSearchWord()
    {
        $substring = 'test';
        $expectedWords = ['test1', 'test2', 'test3', 'test4', 'test5'];

        $this->client
            ->expects($this->once())
            ->method('searchWord')
            ->with($substring)
            ->willReturn($expectedWords);

        $words = $this->autocompleteService->searchWord($substring);

        $this->assertEquals($expectedWords, $words);
    }

    public function testSearchWordMultipleWords()
    {
        $substring = 'test string';

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Only a single word can be searched on this function');

        $this->autocompleteService->searchWord($substring);
    }

    public function testSearchWordTrimmed()
    {
        $substring = '  test  ';
        $expectedWords = ['test1', 'test2', 'test3', 'test4', 'test5'];

        $this->client
            ->expects($this->once())
            ->method('searchWord')
            ->with('test')
            ->willReturn($expectedWords);

        $words = $this->autocompleteService->searchWord($substring);

        $this->assertEquals($expectedWords, $words);
    }
}