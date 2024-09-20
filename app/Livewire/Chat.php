<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Chat extends Component
{
    #[Validate('required|string|max:1000')]
    public string $body = '';

    public array $messages = [];

    public function mount()
    {
        $this->messages[] = ['role' => 'system', 'content' => 'You are a helpful assistant. The response will have the word "Laravel Folks!" at first and markdown format (if needed) with well-organized, detailed, formatted and clean content.'];
    }

    public function submit()
    {
        $this->validate();

        $this->messages[] = ['role' => 'user', 'content' => $this->body];
        $this->messages[] = ['role' => 'assistant', 'content' => ''];

        $this->body = '';
    }

    public function render(): View
    {
        return view('livewire.chat');
    }
}
