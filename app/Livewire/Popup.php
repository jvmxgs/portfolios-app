<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class Popup extends Component
{
    public $isPopupVisible = false;

    public $text = '';

    public $projectId = '';

    #[On('togglePopup')]
    public function togglePopup($id)
    {
        $this->isPopupVisible = true;
        $this->projectId = $id;
    }

    public function delete()
    {
        $this->dispatch('deleteProject', id: $this->projectId);
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
