<div class="max-w-2xl mx-auto py-16 sm:py-24 lg:max-w-none">
    <div class="flex items-center">
        <h2 class="text-2xl font-extrabold text-gray-900 mr-5" id="{{ __('proyectos') }}">{{ __('Projects') }}</h2>
        <x-actions.action wire:click.prevent="create" title="{{ __('New Project') }}" class="text-gray-800 hover:text-gray-600">
            <x-icons.add/>
        </x-actions.action>
    </div>
    <div class="space-y-12 lg:space-y-6 lg:grid lg:grid-cols-3 lg:gap-x-6">
        @forelse($projects as $project)
            <div class="group mt-6" wire:key="{{ $project->id }}">
                <div class="relative w-full h-80 bg-white rounded-lg overflow-hidden group-hover:opacity-75 sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-1">
                    <a href="#" wire:click.prevent="loadProject({{ $project->id }})">
                        <img src="{{ $project->image_url }}" alt="Project Image" class="w-full h-full object-center object-cover">
                    </a>
                </div>
                <h3 class="mt-6 text-base font-semibold text-gray-900">
                    <a href="#" wire:click.prevent="loadProject({{ $project->id }})">{{ $project->name }}</a>
                </h3>
                <div class="flex items-center" x-data>
                    <x-actions.action wire:click.prevent="loadProject({{ $project->id }}, false)" title="{{ __('Edit') }}" class="text-gray-800 hover:text-gray-600">
                        <x-icons.edit/>
                    </x-actions.action>
                    <x-actions.delete eventName="deleteProject" :object="$project"/>
                </div>
            </div>
        @empty
            <h3>{{ __('There are no projects to show!') }}</h3>
        @endforelse
    </div>

    <div class="flex justify-center mt-8 items-center space-x-2">
        @if($counter < $this->total)
            <button wire:click="showMore" type="button" class="px-3 py-3 border rounded bg-gray-800 text-white hover:border-red-600 hover:bg-red-400">{{ __('Show more') }}</button>
        @endif
        @if($counter > 3)
            <a href="#" wire:click.prevent="showLess" class="text-sm text-gray-800 hover:text-gray-600" target="_blank">{{ __('Show less') }}</a>
        @endif
    </div>

    <!-- Modal -->
    <div x-data="{ open: @entangle('openModal').defer }" @keydown.window.escape="open = false" x-show="open" class="relative z-10" aria-labelledby="modal-title" x-ref="dialog" aria-modal="true">
        <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-description="Background backdrop, show/hide based on modal state." class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
        <div class="fixed z-10 inset-0 overflow-y-auto">
            <div class="flex items-end items-center justify-center min-h-full p-4 text-center sm:p-0">
                <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-description="Modal panel, show/hide based on modal state." class="relative bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-xl sm:w-full" @click.away="open = false">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="mt-3 text-center sm:mt-0 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                {{ $currentProject->name }}
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    {{ $currentProject->description }}
                                </p>
                            </div>
                            <div class="mt-2">
                                @if(!$currentProject->video_link)
                                    <div class="relative w-full h-80 bg-white rounded-lg overflow-hidden group-hover:opacity-75 sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-1">
                                        <img src="{{ $currentProject->image_url }}" alt="Project Image" class="w-full h-full object-center object-cover">
                                    </div>
                                @else
                                    <iframe class="w-full" width="560" height="315" src="https://www.youtube.com/embed/{{ $currentProject->video_code }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                @endif
                            </div>
                            <div class="flex mt-2">
                                @if($currentProject->url)
                                    <a href="{{ $currentProject->url }}" class="text-gray-800 hover:text-gray-600" title="Ver proyecto en vivo" target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                        </svg>
                                    </a>
                                @endif
                                @if($currentProject->repo_url)
                                    <a href="{{ $currentProject->repo_url }}" class="text-gray-800 hover:text-gray-600" title="Repositorio" target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-gray-800 text-base font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm" @click="open = false">
                            {{ __('Close') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-modals.slideover>
        <x-forms.create-project :currentProject="$currentProject" :imageFile="$imageFile"/>
    </x-modals.slideover>
</div>
