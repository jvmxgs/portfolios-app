<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Request;
use Livewire\Component;

class Navlink extends Component
{
    public $to = '#';

    public $label = '#';

    public $activeRoute;

    public $primary = false;

    public $primaryClasses = 'rounded-xl hover:text-white hover:bg-bittersweet';

    public $secondaryClasses = 'border-l-2 hover:text-bittersweet';

    public function getButtonClass()
    {
        if ($this->primary) {
            return $this->getPrimaryClass() . ' ' . $this->primaryClasses;
        } else {
            return $this->getSecondaryClass() . ' ' . $this->secondaryClasses;
        }
    }

    private function getPrimaryClass()
    {
        if ($this->activeRoute) {
            return 'bg-bittersweet text-white';
        }

        return 'bg-white text-downriver';
    }

    private function getSecondaryClass()
    {
        if ($this->activeRoute) {
            return 'border-l-bittersweet text-bittersweet';
        }

        return 'border-l-white text-downriver';
    }

    public function mount()
    {
        $currentUrl = Request::url();

        $this->activeRoute = $currentUrl === url($this->to);
    }

    public function render()
    {
        return view('livewire.navlink', [
            'buttonClass' => $this->getButtonClass()
        ]);
    }
}
