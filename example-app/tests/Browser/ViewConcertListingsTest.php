<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\concert;
USE Carbon\Carbon;

class ViewConcertListingsTest extends DuskTestCase
{
    /* @test
     */

    use DatabaseMigrations;
    public function test_exmaple()
    {
        
        $conert = Concert::create([
            'title' => 'Miley Cryus',
            'subtitle' => 'Demi Lovato',
            'date' => Carbon::parse('December 13, 2021'),
            'ticket_price' => 350,
            'venue' => 'RoseBowlDome',
            'venue_address' => '123 Example lane',
            'city' => 'Portland',
            'state' => 'OR',
            'zip' => '97459',
            'additinonal_information' => 'For tickets call 555-555-555',
        ]);

        $this->browse(function (Browser $browser) {
            $browser->visit('/concerts/'.$conert->id)
                    ->assertSee('Miley Cryus')
                    ->assertSee('Demi Lovato')
                    ->assertSee('December 13, 2021')
                    ->assertSee('8:00pm')
                    ->assertSee('32.50')
                    ->assertSee('RoseBowlDome')
                    ->assertSee('123 Example lane')
                    ->assertSee('Portland, OR 97459')
                    ->assertSee('For tickets call 555-555-555');
        });
    }
}
