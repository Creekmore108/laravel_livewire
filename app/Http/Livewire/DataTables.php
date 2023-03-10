<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class DataTables extends Component
{
    use WithPagination;

    public $status = true;
    public $search;
    public $sortField;
    public $sortAsc = true;
    protected $queryString = ['search', 'status', 'sortAsc', 'sortField'];

    public function sortBy($field)
    {
        if($this->sortField === $field)
        {
            $this->sortAsc = !$this->sortAsc;
        }else{
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.data-tables', [
            'users' => User::where(function($query){
                $query->where('name', 'like', '%'.$this->search.'%')
                      ->orWhere('email', 'like', '%'.$this->search.'%');
                })->where('status', $this->status)
                ->when($this->sortField, function($query){
                    $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
                })->paginate(10),
        ]);
    }
}
