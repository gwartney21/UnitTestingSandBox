<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Carbon\Carbon;
use App\Models\concert;
class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @test
     */


    use RefreshDatabase;
    public function user_can_view_a_concert_listing()
    {

     $this->withoutExceptionHandling();   
     
    $concert = Concert::factory()->create([
        'title' => 'The Red Chord',
        'subtitle' => 'with Animosity and Lethargy',
        'date' => Carbon::parse('December 13, 2016 8:00pm'),
        'ticket_price' => 3250,
        'venue' => 'The Mosh Pit',
        'venue_address' => '123 Example Lane',
        'city' => 'Laraville',
        'state' => 'ON',
        'zip' => '17916',
        'additional_information' => 'For tickets, call (555) 555-5555.',
    ]);

  
        $response = $this->get('/concerts/'.$concert->id);


        
        $response->assertStatus(200);
        $response->assertSee('The Red Chord');
        $response->assertSee('with Animosity and Lethargy');
        $response->assertSee('December 13, 2016');
        $response->assertSee('8:00pm');
        $response->assertSee('32.50');
        $response->assertSee('The Mosh Pit');
        $response->assertSee('123 Example Lane');
        $response->assertSee('Laraville, ON 17916');
        $response->assertSee('For tickets, call (555) 555-5555.');

    }
}
