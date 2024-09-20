<div class="flex flex-col flex-grow h-[720px] shadow rounded bg-white">
    <div class="flex flex-col flex-1 flex-grow overflow-y-auto">
        <div class="flex flex-col flex-auto flex-grow px-6 pt-4 overflow-y-auto gap-y-4">
            @foreach ($messages as $key => $message)
                @if ($message['role'] == 'assistant')
                    <livewire:others-custom-message :messages="$messages" :key="$key" :prompt="$messages[$key - 1]" />
                @endif

                @if ($message['role'] == 'user')
                    <livewire:own-message :message="$message" :key="$key" />
                @endif
            @endforeach
        </div>

        {{-- Message Composer --}}
        <div class="z-10 flex-none px-6 py-4">
            <form wire:submit="submit" class="relative">
                <div
                    class="overflow-hidden bg-white shadow-sm rounded-xl ring-1 ring-inset focus-within:ring-2 focus-within:ring-blue-100 ring-gray-300">
                    <label for="message-body" class="sr-only">Message Composer</label>

                    <input wire:model="body" id="message-body" rows="2" name="message-body"
                        class="block w-full p-4 text-gray-900 bg-transparent border-0 outline-none resize-none placeholder:text-gray-400 focus:ring-0 focus:outline-none disabled:opacity-50"
                        placeholder="Add your message..." />

                    <div class="py-2" aria-hidden="true">
                        <div class="py-px">
                            <div class="h-11"></div>
                        </div>
                    </div>
                </div>
                <div class="absolute inset-x-0 bottom-0 flex justify-between px-4 pt-1 pb-4">
                    <div class="flex items-center space-x-5">
                        <div class="flex items-center justify-center space-x-1.5"><button type="button"
                                class="flex items-center justify-center text-gray-500 transition-colors bg-white border border-gray-200 rounded-xl p-1.5 hover:text-gray-700 hover:bg-gray-50"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-smile-icon size-5">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <path d="M8 14s1.5 2 4 2 4-2 4-2"></path>
                                    <line x1="9" x2="9.01" y1="9" y2="9"></line>
                                    <line x1="15" x2="15.01" y1="9" y2="9"></line>
                                </svg>
                            </button>
                            <div data-orientation="vertical" aria-orientation="vertical" role="separator"
                                class="relative w-px h-full bg-gray-200 shrink-0 dark:bg-gray-800"></div><button
                                type="button"
                                class="flex items-center justify-center text-gray-500 transition-colors bg-white border border-gray-200 rounded-xl p-1.5 hover:text-gray-700 hover:bg-gray-50"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-paperclip-icon size-5">
                                    <path
                                        d="m21.44 11.05-9.19 9.19a6 6 0 0 1-8.49-8.49l8.57-8.57A4 4 0 1 1 18 8.84l-8.59 8.57a2 2 0 0 1-2.83-2.83l8.49-8.48">
                                    </path>
                                </svg>
                            </button>
                            <div data-orientation="vertical" aria-orientation="vertical" role="separator"
                                class="relative w-px h-full bg-gray-200 shrink-0 dark:bg-gray-800"></div><button
                                type="button"
                                class="flex items-center justify-center p-1.5 text-gray-500 transition-colors bg-white border border-gray-200 rounded-xl hover:text-gray-700 hover:bg-gray-50"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-mic-icon size-5">
                                    <path d="M12 2a3 3 0 0 0-3 3v7a3 3 0 0 0 6 0V5a3 3 0 0 0-3-3Z"></path>
                                    <path d="M19 10v2a7 7 0 0 1-14 0v-2"></path>
                                    <line x1="12" x2="12" y1="19" y2="22"></line>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="flex items-center justify-start flex-shrink-0">
                        <button type="submit"
                            class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-white transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-gray-950 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 dark:ring-offset-gray-950 dark:focus-visible:ring-gray-300 bg-gray-900 text-gray-50 hover:bg-gray-900/90 dark:bg-gray-50 dark:text-gray-900 dark:hover:bg-gray-50/90 h-9 rounded-md px-3 ml-auto gap-1.5">
                            Send Message
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-corner-down-left-icon size-3.5">
                                <polyline points="9 10 4 15 9 20"></polyline>
                                <path d="M20 4v7a4 4 0 0 1-4 4H4"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
