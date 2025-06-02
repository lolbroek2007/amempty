<!-- Alpine Component -->
<div x-data="{ open: false }">
    <nav class="bg-blue-800 px-4 py-1">
        <div class="mx-auto max-w-7xl px-2 sm:p-6 lg:px-8">
            <div class="relative flex h-16 justify-between sm:hidden">
                <div class="flex shrink-0 items-center">
                    <a href="#"><h1 class="text-2xl font-bold text-white">Voorraad Manager</h1></a>
                </div>

                <!-- Toggle button with Alpine -->
                <button @click="open = !open" class="relative inline-flex items-center justify-center rounded-md p-2 text-blue-400 hover:bg-blue-700 hover:text-white focus:ring-2 focus:ring-white">
                    <span class="sr-only">Open main menu</span>

                    <!-- Open icon -->
                    <svg x-show="!open" class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>

                    <!-- Close icon -->
                    <svg x-show="open" x-cloak class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Mobile menu -->
            <div x-show="open" x-transition x-cloak class="sm:hidden px-4 py-2 bg-blue-700 text-white rounded my-2">
                <a href="#" class="block py-2 hover:bg-blue-600 rounded px-2">Home</a>
                <a href="#" class="block py-2 hover:bg-blue-600 rounded px-2">Gebruikers</a>
                <a href="#" class="block py-2 hover:bg-blue-600 rounded px-2">Projects</a>
                <a href="#" class="block py-2 hover:bg-blue-600 rounded px-2">Meldingen</a>
            </div>

            <!-- Desktop menu -->
            <div class="flex flex-1 items-center justify-between">
                <div class="hidden shrink-0 items-center sm:flex">
                    <a href="/"><h1 class="text-2xl font-bold text-white">Voorraad Manager</h1></a>
                </div>
                <div class="hidden sm:ml-6 sm:block">
                    <div class="flex space-x-4">
                        <a href="#" class="rounded-md bg-blue-900 px-3 py-2 text-sm font-medium text-white">Home</a>
                        <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-blue-300 hover:bg-blue-700 hover:text-white">Gebruikers</a>
                        <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-blue-300 hover:bg-blue-700 hover:text-white">Projects</a>
                        <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-blue-300 hover:bg-blue-700 hover:text-white">Meldingen</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>