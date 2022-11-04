<main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
    <div class="sm:text-center lg:text-left">
        <h1 class="text-4xl tracking-tight font-extrabold text-white sm:text-5xl md:text-6xl">
            <span class="block xl:inline">{{ $info->title }}</span>
        </h1>
        <p class="mt-3 text-base text-gray-400 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
            {{ $info->description }}
        </p>
        <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
            <div class="rounded-md shadow">
                <a href="#" wire:click.prevent="download" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-red-500 hover:bg-red-400 md:py-4 md:text-lg md:px-10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                    Descargar CV
                </a>
            </div>
            <div class="mt-3 sm:mt-0 sm:ml-3">
                <x-actions.action wire:click.prevent="openSlide" title="{{ __('Edit') }}" class="flex items-center justify-center px-8 py-3 md:py-4 md:px-10 text-yellow-300 hover:text-blue-300">
                    <x-icons.edit/>
                </x-actions.action>
            </div>
        </div>
    </div>

    <x-modals.slideover>
        <x-forms.edit-hero :info="$info" :imageFile="$imageFile"/>
    </x-modals.slideover>
</main>
