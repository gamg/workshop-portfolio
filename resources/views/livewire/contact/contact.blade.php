<div class="px-5 py-2" id="{{ __('contact-me') }}">

    @if($contact->email)
        <a href="mailto:{{ $contact->email }}" class="flex text-base leading-6 text-gray-400 hover:text-red-400 space-y-1">
            <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
            </svg>
            <span class="pl-3 text-lg">{{ $contact->email }}</span>
        </a>
    @else
        <h3 class="text-gray-400">{{ __('There is no contact email to show!') }}</h3>
    @endif

    <x-actions.action wire:click.prevent="openSlide" title="{{ __('Edit') }}" class="flex items-center justify-center px-8 md:px-10 text-yellow-300 hover:text-blue-300">
        <x-icons.edit/>
    </x-actions.action>

    <!-- SlideOver -->
</div>
