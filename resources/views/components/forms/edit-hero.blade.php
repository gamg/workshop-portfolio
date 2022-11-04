<div class="w-full sm:max-w-md px-6 py-4">
    <form wire:submit.prevent="edit">
        <div>
            <x-inputs.label for="title" value="{{__('Title')}}" />

            <x-inputs.text wire:model.defer="info.title" id="title" type="text" required />

            @error("info.title")<div class="mt-1 text-red-600 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mt-3">
            <x-inputs.label for="description" value="{{__('Description')}}" />

            <x-inputs.textarea wire:model.defer="info.description" id="description" required />

            @error("info.description")<div class="mt-1 text-red-600 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mt-4">
            <x-inputs.label for="cv" value="{{__('CV')}}"/>

            <x-inputs.file wire:model="cvFile" id="cv" class="block mt-1 w-full"/>
            <a href="{{ $info->cvUrl }}" class="text-gray-400 text-sm hover:text-gray-700" target="_blank">{{__('Open Current File')}}</a>

            <div wire:loading wire:target="cvFile" class="mt-1 w-full text-indigo-700">
                {{__('Verifying file...')}}
            </div>

            @error("cvFile")<div class="mt-1 text-red-600 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mt-4">
            <x-inputs.label for="image" value="{{__('Image')}}" />

            <x-inputs.img wire:model="imageFile" id="image">
                <span class="w-24 rounded-lg overflow-hidden bg-gray-100">
                    <img src="{{ $imageFile ? $imageFile->temporaryUrl() : $info->imageUrl }}" alt="Imagen Hero">
                </span>
            </x-inputs.img>

            <div wire:loading wire:target="imageFile" class="mt-1 w-full text-indigo-700">
                {{__('Verifying image...')}}
            </div>

            @error("imageFile")<div class="mt-1 text-red-600 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mt-4">
            <x-primary-button>{{__('Update')}}</x-primary-button>
        </div>
    </form>
</div>
