<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class Popup extends Component
{
    public $isPopupVisible = false;

    public $text = '';

    public $buttonText = '';

    public $action = '';

    public $data = null;

    #[On('showPopup')]
    public function showPopup($data, $action, $text, $buttonText)
    {
        $this->isPopupVisible = true;
        $this->data = $data;
        $this->action = $action;
        $this->text = $text;
        $this->buttonText = $buttonText;
    }

    public function triggerAction()
    {
        $this->dispatch($this->action, $this->data);
        $this->isPopupVisible = false;
    }

    public function closePopup()
    {
        $this->isPopupVisible = false;
    }

    public function render()
    {
        return view('livewire.popup');
    }
}
