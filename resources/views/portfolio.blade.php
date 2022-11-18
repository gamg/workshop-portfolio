<x-main-layout>
    <!-- hero -->
    <div class="relative bg-white overflow-hidden bg-gray-800">
        <div class="max-w-7xl mx-auto">
            <div class="relative z-10 pb-8 bg-gray-800 sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
                <svg class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 text-gray-800 transform translate-x-1/2" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
                    <polygon points="50,0 100,0 50,100 0,100"></polygon>
                </svg>

                <livewire:navigation.navigation/>

                <!-- livewire component -->
                <livewire:hero.info/>

            </div>
        </div>
        <livewire:hero.image/>
    </div>

    <!-- Projects -->
    <div class="bg-gray-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <livewire:project.project/>
        </div>
    </div>

    <!-- Footer -->
    <section class="bg-gray-800">
        <div class="flex justify-center pt-10">
            <h2 class="text-2xl font-extrabold text-gray-200">{{ __('Contact me') }}</h2>
        </div>
        <div class="max-w-screen-xl px-4 py-3 mx-auto space-y-8 overflow-hidden sm:px-6 lg:px-8">
            <nav class="flex flex-wrap justify-center -mx-5 -my-2">
                <livewire:contact.contact/>
            </nav>

            <!-- livewire component -->
            <div class="flex justify-center mt-8 space-x-6">
                <a href="#" target="_blank" class="text-4xl text-gray-400 hover:text-red-400">
                    <span class="sr-only">Linkedin</span>
                    <i class="fa-brands fa-linkedin"></i>
                </a>
                <a href="#" target="_blank" class="text-4xl text-gray-400 hover:text-red-400">
                    <span class="sr-only">Github</span>
                    <i class="fa-brands fa-github"></i>
                </a>
                <a href="#" target="_blank" class="text-4xl text-gray-400 hover:text-red-400">
                    <span class="sr-only">Twitter</span>
                    <i class="fa-brands fa-twitter"></i>
                </a>
                <!-- Boton add and edit -->

                <!-- SlideOver -->
            </div>

            <!-- livewire component  -->
            <nav class="flex flex-wrap justify-center -mx-5 -my-2">
                <a href="#" class="font-medium px-5 py-2 text-gray-200 hover:text-red-300">Link 1</a>
                <a href="#" class="font-medium px-5 py-2 text-gray-200 hover:text-red-300">Link 2</a>
                <a href="#" class="font-medium px-5 py-2 text-gray-200 hover:text-red-300">Link 3</a>
                <!-- Boton Logout -->
            </nav>
        </div>
    </section>
</x-main-layout>
