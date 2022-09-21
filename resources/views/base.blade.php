<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Aldrich" media="all">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/1bf067c1d8.js" crossorigin="anonymous"></script>
</head>
<body>
<div style="font-family: Aldrich">
    <!-- hero -->
    <div class="relative bg-white overflow-hidden bg-gray-800">
        <div class="max-w-7xl mx-auto">
            <div class="relative z-10 pb-8 bg-gray-800 sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
                <svg class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 text-gray-800 transform translate-x-1/2" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
                    <polygon points="50,0 100,0 50,100 0,100"></polygon>
                </svg>

                <!-- livewire component -->
                <section id="hola">
                    <div x-data="{ open: false, focus: true }" @keydown.escape="onEscape" @close-popover-group.window="onClosePopoverGroup">
                        <div class="relative pt-6 px-4 sm:px-6 lg:px-8">
                            <nav class="relative flex items-center justify-between sm:h-10 lg:justify-start" aria-label="Global">
                                <div class="flex items-center flex-grow flex-shrink-0 lg:flex-grow-0">
                                    <div class="flex items-center justify-between w-full md:w-auto">
                                        <a href="#">
                                            <span class="sr-only">Workflow</span>
                                            <img alt="Workflow" class="h-10 w-auto sm:h-12" src="{{ asset('/hero/coding.png') }}">
                                        </a>
                                        <div class="-mr-2 flex items-center md:hidden">
                                            <button type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" @click="open = !open" @mousedown="if (open) $event.preventDefault()" aria-expanded="false" :aria-expanded="open.toString()">
                                                <span class="sr-only">Open main menu</span>
                                                <svg class="h-6 w-6" x-description="Heroicon name: outline/menu" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="hidden md:block md:ml-10 md:pr-4 md:space-x-8 text-lg">
                                    <a href="#" class="font-medium text-gray-200 hover:text-red-300">Link 1</a>
                                    <a href="#" class="font-medium text-gray-200 hover:text-red-300">Link 1</a>
                                    <a href="#" class="font-medium text-gray-200 hover:text-red-300">Link 1</a>
                                </div>
                                <!-- Aqui botones edit y add -->
                            </nav>
                        </div>

                        <div x-show="open" x-transition:enter="duration-150 ease-out" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="duration-100 ease-in" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" x-description="Mobile menu, show/hide based on menu open state." class="absolute z-10 top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden" x-ref="panel" @click.away="open = false" style="display: none;">
                            <div class="rounded-lg shadow-md bg-white ring-1 ring-black ring-opacity-5 overflow-hidden">
                                <div class="px-5 pt-4 flex items-center justify-between">
                                    <div>
                                        <img class="h-8 w-auto" src="{{ asset('/hero/coding.png') }}" alt="Logo">
                                    </div>
                                    <div class="-mr-2">
                                        <button type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" @click="open = !open">
                                            <span class="sr-only">Close main menu</span>
                                            <svg class="h-6 w-6" x-description="Heroicon name: outline/x" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="px-2 pt-2 pb-3 space-y-1">
                                    <a href="#" class="font-medium block px-3 py-2 rounded-md text-base text-gray-700 hover:text-gray-900 hover:bg-gray-50" >Link 1</a>
                                    <a href="#" class="font-medium block px-3 py-2 rounded-md text-base text-gray-700 hover:text-gray-900 hover:bg-gray-50" >Link 2</a>
                                    <a href="#" class="font-medium block px-3 py-2 rounded-md text-base text-gray-700 hover:text-gray-900 hover:bg-gray-50" >Link 3</a>
                                    <!-- Aqui botones edit y add -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- slideover add/edit -->
                </section>

                <!-- livewire component -->
                <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                    <div class="sm:text-center lg:text-left">
                        <h1 class="text-4xl tracking-tight font-extrabold text-white sm:text-5xl md:text-6xl">
                            <span class="block xl:inline">Titulo........</span>
                        </h1>
                        <p class="mt-3 text-base text-gray-400 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                            Hola, mi nombre es Parsival, soy desarrollador web Backend desde hace 5 años y mededico a construir aplicaciones web con Laravel y otras tecnologías.
                        </p>
                        <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                            <div class="rounded-md shadow">
                                <a href="#" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-red-500 hover:bg-red-400 md:py-4 md:text-lg md:px-10">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                    </svg>
                                    Descargar CV
                                </a>
                            </div>
                            <!-- Boton Edit -->
                        </div>
                    </div>
                    <!-- slideover edit hero -->
                </main>

            </div>
        </div>

        <!-- livewire component -->
        <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
            <img class="h-80 w-full object-cover sm:h-96 md:h-full lg:w-full lg:h-full" src="{{ asset('/hero/default-hero.jpg') }}" alt="Dafault Hero img">
        </div>
    </div>

    <!-- Projects -->
    <div class="bg-gray-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- livewire component -->
            <div class="max-w-2xl mx-auto py-16 sm:py-24 lg:max-w-none">
                <div class="flex items-center">
                    <h2 class="text-2xl font-extrabold text-gray-900 mr-5" id="proyectos">Proyectos</h2>
                    <!-- Boton add -->
                </div>
                <div class="space-y-12 lg:space-y-6 lg:grid lg:grid-cols-3 lg:gap-x-6">
                    <div class="group mt-6">
                        <div class="relative w-full h-80 bg-white rounded-lg overflow-hidden group-hover:opacity-75 sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-1">
                            <a href="#">
                                <img src="{{ asset('/projects/default-img-project.jpg') }}" alt="Project Image" class="w-full h-full object-center object-cover">
                            </a>
                        </div>
                        <h3 class="mt-6 text-base font-semibold text-gray-900">
                            <a href="#">Mi proyecto 1</a>
                        </h3>
                        <!-- Boton edit and delete -->
                    </div>
                    <div class="group mt-6">
                        <div class="relative w-full h-80 bg-white rounded-lg overflow-hidden group-hover:opacity-75 sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-1">
                            <a href="#">
                                <img src="{{ asset('/projects/default-img-project.jpg') }}" alt="Project Image" class="w-full h-full object-center object-cover">
                            </a>
                        </div>
                        <h3 class="mt-6 text-base font-semibold text-gray-900">
                            <a href="#">Mi proyecto 2</a>
                        </h3>
                        <!-- Boton edit and delete -->
                    </div>
                    <div class="group mt-6">
                        <div class="relative w-full h-80 bg-white rounded-lg overflow-hidden group-hover:opacity-75 sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-1">
                            <a href="#">
                                <img src="{{ asset('/projects/default-img-project.jpg') }}" alt="Project Image" class="w-full h-full object-center object-cover">
                            </a>
                        </div>
                        <h3 class="mt-6 text-base font-semibold text-gray-900">
                            <a href="#">Mi proyecto 3</a>
                        </h3>
                        <!-- Boton edit and delete -->
                    </div>
                </div>

                <!-- Boton Mostrar mas / Mostrar menos -->

                <!-- Info Modal -->

                <!-- SlideOver -->
            </div>
        </div>
    </div>

    <!-- Footer -->
    <section class="bg-gray-800">
        <div class="flex justify-center pt-10">
            <h2 class="text-2xl font-extrabold text-gray-200">Contáctame</h2>
        </div>
        <div class="max-w-screen-xl px-4 py-3 mx-auto space-y-8 overflow-hidden sm:px-6 lg:px-8">
            <nav class="flex flex-wrap justify-center -mx-5 -my-2">
                <!-- livewire component -->
                <div class="px-5 py-2" id="{{ __('contact-me') }}">

                    <a href="mailto:tavo@cdp.com" class="flex text-base leading-6 text-gray-400 hover:text-red-400 space-y-1">
                        <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                        </svg>
                        <span class="pl-3 text-lg">tavo@cdp.com</span>
                    </a>
                    <!-- Boton edit -->

                    <!-- SlideOver -->
                </div>
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

    <!-- Panel SlideOver -->
    <div x-data="{ open: false }"
         @keydown.window.escape="open = false"
         x-show="open" class="relative z-10" aria-labelledby="slide-over-title" x-ref="dialog" aria-modal="true">

        <div x-show="open" x-transition:enter="ease-in-out duration-500" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in-out duration-500" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-description="Background backdrop, show/hide based on slide-over state." class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <div class="fixed inset-0 overflow-hidden">
            <div class="absolute inset-0 overflow-hidden">
                <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
                    <div x-show="open" x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700" x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full" class="pointer-events-auto relative w-screen max-w-md" x-description="Slide-over panel, show/hide based on slide-over state." @click.away="open = false">
                        <div x-show="open" x-transition:enter="ease-in-out duration-500" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in-out duration-500" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-description="Close button, show/hide based on slide-over state." class="absolute top-0 left-0 -ml-8 flex pt-4 pr-2 sm:-ml-10 sm:pr-4">
                            <button type="button" class="rounded-md text-gray-300 hover:text-white focus:outline-none focus:ring-2 focus:ring-white" @click="open = false">
                                <span class="sr-only">Close panel</span>
                                <svg class="h-6 w-6" x-description="Heroicon name: outline/x" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="flex h-full flex-col overflow-y-scroll bg-white py-6 shadow-xl">
                            <div class="px-4 sm:px-6">
                                <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">Panel</h2>
                            </div>
                            <div class="relative mt-6 flex-1 px-4 sm:px-6">
                                <div class="w-full sm:max-w-md px-6 py-4">
                                    Formulario...
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal - Project -->
    <div x-data="{ open: true }" @keydown.window.escape="open = false" x-show="open" class="relative z-10" aria-labelledby="modal-title" x-ref="dialog" aria-modal="true">
        <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-description="Background backdrop, show/hide based on modal state." class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
        <div class="fixed z-10 inset-0 overflow-y-auto">
            <div class="flex items-end items-center justify-center min-h-full p-4 text-center sm:p-0">
                <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-description="Modal panel, show/hide based on modal state." class="relative bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-xl sm:w-full" @click.away="open = false">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="mt-3 text-center sm:mt-0 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                Mi super proyecto 1
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ornare nunc eu fringilla blandit. Curabitur dignissim, velit vel semper laoreet, velit ex suscipit neque, vel sodales enim justo a tellus. Nunc rutrum tristique metus id condimentum.
                                </p>
                            </div>
                            <div class="mt-2">
                                @if(false)
                                    <div class="relative w-full h-80 bg-white rounded-lg overflow-hidden group-hover:opacity-75 sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-1">
                                        <img src="{{ asset('/projects/default-img-project.jpg') }}" alt="Project Image" class="w-full h-full object-center object-cover">
                                    </div>
                                @else
                                    <iframe class="w-full" width="560" height="315" src="https://www.youtube.com/embed/3vgv54Yju5A" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                @endif
                            </div>
                            <div class="flex mt-2">
                                <a href="#" class="text-gray-800 hover:text-gray-600" title="Ver proyecto en vivo" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                    </svg>
                                </a>
                                <a href="#" class="text-gray-800 hover:text-gray-600" title="Repositorio" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-gray-800 text-base font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm" @click="open = false">
                            Cerrar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Sweetalert 2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
