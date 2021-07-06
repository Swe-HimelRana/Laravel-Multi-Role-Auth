<x-app-layout>
    <!-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> -->

    <div class="py-2">
        <div class="relative mx-auto sm:px-2 lg:px-2 flex">
            <!-- Sidebar -->
            <div class="hidden md:block px-4 mr-2 bg-white rounded  shadow-xl w-64 space-y-6 py-5 h-screen">
                <!-- Logo -->
                <a href="/dashboard" class="flex items-center space-x-2 p-4 shadow bg-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ auth()->user()->name}}</span>
                </a>
                <nav>
                    <a href="/dashboard" class="block py-2.5 px-4 hover:bg-blue-300 hover:text-white"> Home </a>
                    <a href="/users" class="block py-2.5 px-4 hover:bg-blue-300 hover:text-white"> Users </a>
                    <a href="/roles" class="block py-2.5 px-4 hover:bg-blue-300 hover:text-white"> Roles </a>
                    <a href="/permissions" class="block py-2.5 px-4 hover:bg-blue-300 hover:text-white"> Permissions </a>
                    <a href="/about" class="block py-2.5 px-4 hover:bg-blue-300 hover:text-white"> About </a>
                </nav>
            </div>
            <!-- Sidebar End -->
            <!-- Main Content -->
            <div class="flex-1 p-5 font-bold bg-white  shadow-xl sm:rounded-lg">
                 <h1>hello world</h1>
            </div>
        </div>
    </div>
</x-app-layout>
