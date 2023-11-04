<?php

namespace App\Livewire;

use Livewire\Component;

class Link extends Component
{
    public $to = '#';

    public $class = '';

    public $primary = false;

    public string $text = 'Click Me';

    public function getButtonClass()
    {
        if ($this->primary) {
            return 'text-white bg-bittersweet';
        } else {
            return 'bg-sail text-downriver';
        }
    }

    public function render()
    {
        return view('livewire.link', [
            'buttonClass' => $this->getButtonClass()
        ]);
    }
}
