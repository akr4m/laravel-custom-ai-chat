<?php

namespace App\Livewire;

use Illuminate\Support\Arr;
use Livewire\Component;
use OpenAI\Laravel\Facades\OpenAI;

class OthersMessage extends Component
{
    public array $messages = [];

    public array $prompt;

    public ?string $response = null;

    public function mount()
    {
        $this->js('$wire.getResponse()');
    }

    public function getResponse()
    {
        $stream = OpenAI::chat()->createStreamed([
            'model' => 'gpt-3.5-turbo',
            'messages' => $this->messages,
        ]);

        foreach ($stream as $response) {
            $content = Arr::get($response->choices[0]->toArray(), 'delta.content');

            $this->response .= $content;

            $this->stream(
                to: 'stream-'.$this->getId(),
                content: $content,
                replace: false
            );
        }
    }

    public function render()
    {
        return view('livewire.others-message');
    }
}
