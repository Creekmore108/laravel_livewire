@extends('layouts.app')

@section('content')
<livewire:search-dropdown />

<livewire:data-tables />

<h2 class="text-lg font-semibold">Contact Form</h2>

<livewire:contact-form />

     <div>
        <div class="h-96"></div>
        <div class="h-96"></div>
    </div>
    @endsection 