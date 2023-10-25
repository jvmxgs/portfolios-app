<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Request;
use Livewire\Component;

class Navlink extends Component
{
    public $to = '#';

    public $label = '#';

    public $activeRoute;

    public function mount()
    {
        $currentUrl = Request::url();

        $this->activeRoute = $currentUrl === url($this->to);
    }

    public function render()
    {
        return view('livewire.navlink');
    }
}
