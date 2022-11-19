<nav class="flex flex-wrap justify-center -mx-5 -my-2">
    <x-navigation.links class="px-5 py-2 text-gray-200 hover:text-red-300" :items="$items"/>

    @auth
        <form method="POST" action="{{ route('logout') }}" class="py-2">
            @csrf
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="px-4 py-2 bg-red-500 text-gray-300 hover:text-red-500 hover:bg-gray-100">
                {{ __('Log Out') }}
            </a>
        </form>
    @endauth
</nav>
