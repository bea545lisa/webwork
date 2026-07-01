<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_homepage_returns_200(): void
    {
        $this->get('/')->assertStatus(200);
    }

    public function test_impressum_returns_200(): void
    {
        $this->get('/impressum')->assertStatus(200);
    }

    public function test_datenschutz_returns_200(): void
    {
        $this->get('/datenschutz')->assertStatus(200);
    }
}
