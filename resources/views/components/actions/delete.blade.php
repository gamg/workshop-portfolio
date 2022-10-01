@props([
    'eventName' => '',
    'object' => null
])

<x-actions.action
    @click.prevent="$dispatch('deleteit', {
            eventName: '{{ $eventName }}',
            id: '{{ $object->id ?? '' }}',
            title: '{{ __('Are you sure?') }}',
            text: '{{ __('You will not be able to revert this!') }}',
            confirmText: '{{ __('Yes, delete it!') }}',
            cancelText: '{{ __('Cancel') }}'
        })"
    title="{{ __('Delete') }}"
    class="text-red-600 hover:text-red-400">
    <x-icons.delete/>
</x-actions.action>
