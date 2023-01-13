<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Livewire\Livewire;
use App\Http\Livewire\SearchDropdown;

class SearchDropdownTest extends TestCase
{
   /** @test */
   public function search_dropdown_searches_correctly_if_song_exists()
   {
    Livewire::test(SearchDropdown::class)
        ->set('search', 'Imagine')
        ->assertSee('John Lennon');
   }

   /** @test */
   public function search_dropdown_shows_message_if_no_song_exists()
   {
    Livewire::test(SearchDropdown::class)
        ->set('search', 'wedsw')
        ->assertSee('No results found for');
   }
}
