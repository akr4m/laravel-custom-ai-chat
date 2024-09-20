<?php

namespace App\Livewire;

use Livewire\Component;

class OwnMessage extends Component
{
    public array $message;

    public function render()
    {
        return view('livewire.own-message');
    }
}
