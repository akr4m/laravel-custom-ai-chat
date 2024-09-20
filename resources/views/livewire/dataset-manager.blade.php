<div class="col-span-2">
    <div>
        <button wire:click="$toggle('showModal')" type="button"
            class="inline-flex w-full justify-center items-center gap-x-1.5 rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
            <svg class="-ml-0.5 h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                    clip-rule="evenodd" />
            </svg>
            Add New Dataset
        </button>
    </div>
    <div class="my-1">
        <h2 class="text-lg font-semibold text-gray-900">Dataset</h2>
    </div>
    <ul role="list"
        class="overflow-hidden bg-white divide-y divide-gray-100 shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl">

        @forelse ($datasets as $dataset)
            <li title="{{ $dataset->text }}"
                class="relative flex justify-between px-2 py-2.5 gap-x-6 hover:bg-gray-50 sm:px-6">
                <div class="flex min-w-0 gap-x-4">
                    <div class="flex-auto min-w-0">
                        <p class="text-sm font-semibold leading-6 text-gray-900">
                            <a href="#">
                                <span class="absolute inset-x-0 bottom-0 -top-px"></span>
                                {{ $dataset->title }}
                            </a>
                        </p>
                    </div>
                </div>
                <div class="flex items-center shrink-0 gap-x-4">
                    <svg class="flex-none w-5 h-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                        aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
            </li>
        @empty
            <p class="text-gray-500">No datasets found.</p>
        @endforelse
    </ul>

    <x-modal name="dataset-upload-form" wire:model.live="showModal" focusable>
        <form wire:submit="uploadFile" class="p-6">
            <h2 class="text-lg font-medium text-gray-900">
                Add New Dataset
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                Add a new dataset to your collection. You can add a dataset by providing a name and uploading a
                file.
            </p>

            <div class="mt-6">
                <div class="flex justify-center px-6 py-10 border border-dashed rounded-lg border-gray-900/25">
                    <div class="text-center">
                        <svg class="w-12 h-12 mx-auto text-gray-300" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-cloud-upload">
                            <path d="M12 13v8" />
                            <path d="M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242" />
                            <path d="m8 17 4-4 4 4" />
                        </svg>

                        <div class="flex mt-4 text-sm leading-6 text-gray-600">
                            <label for="file-upload"
                                class="relative font-semibold text-indigo-600 bg-white rounded-md cursor-pointer focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                <span>Upload a file</span>
                                <input wire:model='file' id="file-upload" name="file-upload" type="file"
                                    accept=".pdf,.txt,.docx,.doc" class="sr-only">
                            </label>
                            <p class="pl-1">or drag and drop</p>
                        </div>
                        <p class="text-xs leading-5 text-gray-600">PDF, DOC, DOCX, TXT up to 500MB</p>
                    </div>
                </div>
                @error('file')
                    <span class="text-red-700 error">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end mt-6">
                <x-danger-button x-on:click="$dispatch('close')">
                    Cancel
                </x-danger-button>

                <x-secondary-button type="submit" class="ms-3">
                    Submit
                </x-secondary-button>
            </div>
        </form>
    </x-modal>
</div>
