<?php

namespace Tests\Unit;

use App\Http\Controllers\KanyeController;
use App\Managers\KanyeApi;
use Tests\TestCase;

class KanyeControllerTest extends TestCase
{
    public function testGetQuotes()
    {
        $controller = new KanyeController(new KanyeApi());
        $quotes = $controller->getQuotes()->getData()->quotes;

        $this->assertIsArray($quotes);
        $this->assertCount(5, $quotes);
    }

    public function testRefreshQuotes()
    {
        $controller = new KanyeController(new KanyeApi());
        $refreshedQuotes = $controller->refreshQuotes()->getData()->quotes;

        $this->assertIsArray($refreshedQuotes);
        $this->assertCount(5, $refreshedQuotes);
    }
}
