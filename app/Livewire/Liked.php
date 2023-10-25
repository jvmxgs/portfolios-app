<?php

namespace App\Livewire;

use Livewire\Component;

class Liked extends Component
{
    public function render()
    {
        return view('livewire.liked')->extends('layouts.admin');
    }
}
