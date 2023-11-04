<?php

namespace App\Livewire;

use Livewire\Component;

class Schedule extends Component
{
    public bool $showDatePicker = false;

    public $publishDate = null;

    public function checkboxToogle()
    {
        $this->showDatePicker = ! $this->showDatePicker;
        $this->dispatch('checkbox-toogled');
    }

    public function updated($property)
    {
        info($property . ' updated - - - - - - - - - - - - - - - - - - -');
    }

    public function render()
    {
        return view('livewire.schedule');
    }
}
