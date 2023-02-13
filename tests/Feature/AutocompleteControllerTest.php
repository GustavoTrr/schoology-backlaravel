<?php

namespace Tests\Feature\Api;

use App\Services\Autocomplete\AutocompleteService;
use Tests\TestCase;
use Tests\Mocks\AutocompleteSourceClientMock;

class AutocompleteControllerTest extends TestCase
{

    protected function setUp(): void
    {
        parent::setUp();

        $this->app->bind(SourceClientInterface::class, AutocompleteSourceClientMock::class);
        $this->app->bind(AutocompleteService::class, function ($app) {
            return new AutocompleteService($app->make(SourceClientInterface::class));
        });
    }

    /**
     * Test search method for correct response.
     *
     * @return void
     */
    public function testSearchReturnsCorrectResponse()
    {
        // Arrange
        $query = 'example';
        $expectedResponse = ['word1', 'word2', 'word3', 'word4', 'word5'];

        // Act
        $response = $this->json('GET', '/api/autocomplete', ['q' => $query]);

        // Assert
        $response->assertStatus(200)
                 ->assertJson($expectedResponse);
    }

    /**
     * Test search method for incorrect response.
     *
     * @return void
     */
    public function testSearchReturnsIncorrectResponse()
    {
        // Arrange
        $query = 'example query';
        $expectedResponse = ['q' => ['The q must only contain letters.']];

        // Act
        $response = $this->json('GET', '/api/autocomplete', ['q' => $query]);

        // Assert
        $response->assertStatus(422)
                 ->assertJsonValidationErrors($expectedResponse);
    }
}