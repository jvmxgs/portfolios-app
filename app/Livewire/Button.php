<?php

namespace App\Livewire;

use Livewire\Component;

class Button extends Component
{
    public $primary = false;

    public string $text = 'Click Me';

    public function getButtonClass()
    {
        if ($this->primary) {
            return 'text-white bg-bittersweet';
        } else {
            return 'bg-light-blue text-dark-blue';
        }
    }

    public function render()
    {
        return view('livewire.button', [
            'buttonClass' => $this->getButtonClass()
        ]);
    }
}
