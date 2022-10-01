<div class="w-full sm:max-w-md px-6 py-4">
    <form wire:submit.prevent="edit">
        @forelse($items as $index => $item)
            <section class="border rounded p-2 shadow-md mb-6" wire:key="item-{{ $item->id }}">
                <h3 class="mb-2 text-gray-500 text-center">{{ __('Item') }} #{{ $index+1 }}</h3>
                <div>
                    <x-inputs.label for="label" value="{{ __('Label') }}"/>
                    <x-inputs.text wire:model.defer="items.{{ $index }}.label" id="label" type="text" required />

                    @error("items.$index.label")<div class="mt-1 text-red-600 text-sm">{{ $message }}</div>@enderror
                </div>
                <div class="mt-3">
                    <x-inputs.label for="link" value="{{ __('Link') }}"/>
                    <x-inputs.text wire:model.defer="items.{{ $index }}.link" id="link" type="text" required />

                    @error("items.$index.link")<div class="mt-1 text-red-600 text-sm">{{ $message }}</div>@enderror
                </div>
                <div class="mt-3 w-0">
                    <x-actions.delete eventName="deleteItem" :object="$item"/>
                </div>
            </section>
        @empty
            <h3>{{ __('There are no items to show!') }}</h3>
        @endforelse

        @if($items->count())
            <div class="mt-4">
                <x-primary-button>{{ __('Update') }}</x-primary-button>
            </div>
        @endif
    </form>
</div>
