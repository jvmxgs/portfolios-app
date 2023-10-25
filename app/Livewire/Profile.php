<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Request;
use Livewire\Component;

class Profile extends Component
{
    public function render()
    {
        $user = auth()->user();

        return view('livewire.profile', compact('user'));
    }
}
