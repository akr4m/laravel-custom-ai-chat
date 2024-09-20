<?php

namespace App\Livewire;

use App\Models\Dataset;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use OpenAI\Laravel\Facades\OpenAI;

class DatasetManager extends Component
{
    use WithFileUploads;

    public $datasets;

    public bool $showModal = false;

    #[Validate('required|file|extensions:pdf,docx,txt,doc')]
    public $file;

    public function mount()
    {
        $this->datasets = Dataset::latest()->get();
    }

    public function uploadFile()
    {
        // validate the file
        // store the file
        // parse text content from file
        // create vector embeddings from the extracted text
        // store that embedding to dataset
        // push that dataset to the datasets
        // close the modal

        $this->validate();

        $path = $this->file->store('datasets');

        $text = $this->getTextContent($path);

        $response = OpenAI::embeddings()->create([
            'model' => 'text-embedding-3-small',
            'input' => $text,
        ]);

        $embedding = Arr::get($response->embeddings[0]->toArray(), 'embedding');

        $dataset = Dataset::create([
            'title' => $this->file->getClientOriginalName(),
            'path' => $path,
            'text' => $text,
            'embedding' => $embedding,
        ]);

        // push the new dataset to datasets
        $this->datasets->prepend($dataset);

        $this->showModal = false;
    }

    protected function getTextContent($path): ?string
    {
        // Parse the text content from the file.
        // For txt files, we can directly read the content.
        // For pdf, docx, doc files, we can use libraries like Spatie/PdfToText, PhpOffice/PhpWord, etc.

        $file = Storage::path($path);

        if (file_exists($file)) {
            $content = file_get_contents($file);

            return $content;
        }

        return null;
    }

    public function render()
    {
        return view('livewire.dataset-manager');
    }
}
