<div class="max-w-2xl mx-auto py-16 sm:py-24 lg:max-w-none">
    <div class="flex items-center">
        <h2 class="text-2xl font-extrabold text-gray-900 mr-5" id="proyectos">{{ __('Projects') }}</h2>
        <!-- Boton add -->
    </div>
    <div class="space-y-12 lg:space-y-6 lg:grid lg:grid-cols-3 lg:gap-x-6">
        @forelse($projects as $project)
            <div class="group mt-6" wire:key="{{ $project->id }}">
                <div class="relative w-full h-80 bg-white rounded-lg overflow-hidden group-hover:opacity-75 sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-1">
                    <a href="#">
                        <img src="{{ $project->image_url }}" alt="Project Image" class="w-full h-full object-center object-cover">
                    </a>
                </div>
                <h3 class="mt-6 text-base font-semibold text-gray-900">
                    <a href="#">{{ $project->name }}</a>
                </h3>
                <!-- Boton edit and delete -->
            </div>
        @empty
            <h3>{{ __('There are no projects to show!') }}</h3>
        @endforelse
    </div>

    <!-- Boton Mostrar mas / Mostrar menos -->

    <!-- Info Modal -->

    <!-- SlideOver -->
</div>
