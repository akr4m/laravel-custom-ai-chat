{{-- Own Message --}}
<div class="flex items-end justify-end space-x-4 transition-opacity">
    <div class="flex flex-row-reverse justify-start flex-grow flex-shrink min-w-0 group">
        <div class="flex flex-col ml-48">
            <div
                class="px-4 py-2.5 text-white  bg-gradient-to-r from-blue-700 rounded-l-xl shadow-blue-200 shadow-md rounded-tr-xl via-blue-500 to-blue-700 align-right">
                {{ $message['content'] }}
            </div>
        </div>
    </div>
</div>
