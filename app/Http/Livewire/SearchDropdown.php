<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class SearchDropdown extends Component
{

    public $search;
    public $searchResults = [];
    
    public function updated($newValue)
    {
        if(strlen($this->search) < 3 ) {
            $this->searchResults = [];

            return;
        }
        $response = Http::get('https://itunes.apple.com/search/?term=' . $this->search . '&limit=10');

        $this->searchResults = $response->json()['results'];

        //  dd($this->searchResults);
    }
    
    public function render()
    {
        return view('livewire.search-dropdown');
    }
}
