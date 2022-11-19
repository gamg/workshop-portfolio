<div class="w-full sm:max-w-md px-6 py-4">
    <x-inputs.select wire:model="socialLinkSelected" placeholder="{{ __('Select a social link to edit') }}">
        @foreach($socialLinks as $socialLink)
            <option value="{{ $socialLink->id }}">{{ $socialLink->name }}</option>
        @endforeach
    </x-inputs.select>

    @if($socialLinkSelected)
        <x-forms.create-or-edit-social-link-form/>
    @endif
</div>
