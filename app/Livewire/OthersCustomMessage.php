<?php

namespace App\Livewire;

use App\Models\Dataset;
use Illuminate\Support\Arr;
use Livewire\Component;
use OpenAI\Laravel\Facades\OpenAI;

class OthersCustomMessage extends Component
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
        $response = OpenAI::embeddings()->create([
            'model' => 'text-embedding-3-small',
            'input' => $this->prompt['content'],
        ]);

        $embedding = Arr::get($response->embeddings[0]->toArray(), 'embedding');
        $vector = json_encode($embedding);

        $result = Dataset::query()
            ->select('text')
            ->selectSub("embedding <=> '{$vector}'::vector", 'distance') // virtual column for distance
            ->orderBy('distance')
            ->limit(2)
            ->get();

        $this->messages = array_merge($this->messages, [
            ['role' => 'system', 'content' => $result->first()->text],
            ['role' => 'user', 'content' => $this->prompt['content']],
        ]);

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
        return view('livewire.others-custom-message');
    }
}
