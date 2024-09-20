{{-- Others Message --}}
<div class="flex items-start justify-start space-x-4 transition-opacity">
    <div>
        <svg class="p-1.5 bg-gray-300 shadow-md  text-gray-700 rounded-full size-8" xmlns="http://www.w3.org/2000/svg"
            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bot-message-square">
            <path d="M12 6V2H8" />
            <path d="m8 18-4 4V8a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2Z" />
            <path d="M2 12h2" />
            <path d="M9 11v2" />
            <path d="M15 11v2" />
            <path d="M20 12h2" />
        </svg>
    </div>
    <div class="flex flex-grow flex-shrink min-w-0 group">
        <div class="flex flex-col justify-end mr-48">
            <div wire:stream="stream-{{ $this->getId() }}"
                class="px-4 py-2.5 text-gray-700  shadow-md bg-gradient-to-r from-gray-300 rounded-r-xl rounded-bl-xl via-gray-200 to-gray-300 align-left shadow-gray-200 prose">
                @if ($response)
                    {!! str()->markdown($response) !!}
                @endif
            </div>
        </div>
    </div>
</div>
