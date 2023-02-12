<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AutocompleteControllerTest extends TestCase
{

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