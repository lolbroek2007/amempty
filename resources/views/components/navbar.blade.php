<!-- Alpine Component -->
<div x-data="{ open: false }">
    <nav 
        class="
            px-4 py-1 
            {{ request()->routeIs('products.*') ? 'bg-blue-600' : '' }} 
            {{ request()->routeIs('categories.*') ? 'bg-orange-600' : '' }}
        "
    >
        <div class="mx-auto max-w-7xl px-2 sm:p-6 lg:px-8">
            <!-- Mobile menu toggle button -->
            <div class="relative flex h-16 justify-between sm:hidden">
                <div class="flex shrink-0 items-center">
                    <a href="#"><h1 class="text-2xl font-bold text-white">Voorraad Manager</h1></a>
                </div>

                <!-- Toggle button with Alpine -->
                <button @click="open = !open" 
                        class="relative inline-flex items-center justify-center rounded-md p-2 text-white cursor-pointer 
                               hover:text-white focus:ring-2 focus:ring-white"
                >
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
            <div x-show="open" x-transition x-cloak 
                 class="
                    sm:hidden px-4 py-2 rounded my-2 
                    {{ request()->routeIs('products.*') ? 'bg-blue-700' : '' }}
                    {{ request()->routeIs('categories.*') ? 'bg-orange-700' : '' }}
                 "
            >
                <a href="#" 
                   class="block py-2 rounded px-2 text-white 
                          {{ request()->routeIs('products.*') ? 'hover:bg-blue-600' : 'hover:bg-orange-600' }}"
                >Home</a>

                <a href="{{ route('products.index') }}" 
                   class="block py-2 px-2 rounded text-white
                          {{ request()->routeIs('products.*') ? 'bg-blue-900' : '' }} 
                          {{ request()->routeIs('categories.*') ? 'hover:bg-orange-600' : 'hover:bg-blue-600' }}"
                >
                    Product overview
                </a>

                <a href="{{ route('categories.index') }}" 
                   class="block py-2 px-2 rounded text-white
                          {{ request()->routeIs('categories.*') ? 'bg-orange-900' : '' }}
                          {{ request()->routeIs('categories.*') ? 'hover:bg-orange-600' : 'hover:bg-blue-600' }}"
                >
                    Categories overview
                </a>

                <a href="#" 
                   class="block py-2 rounded px-2 text-white 
                          {{ request()->routeIs('products.*') ? 'hover:bg-blue-600' : 'hover:bg-orange-600' }}"
                >Users</a>
            </div>

            <!-- Desktop menu -->
            <div class="flex flex-1 items-center justify-between">
                <div class="hidden shrink-0 items-center sm:flex">
                    <a href="/"><h1 class="text-2xl font-bold text-white">Voorraad Manager</h1></a>
                </div>
                <div class="hidden sm:ml-6 sm:block">
                    <div class="flex space-x-4">
                        <a href="#" 
                           class="rounded-md px-3 py-2 text-sm font-medium text-white 
                                  {{ request()->routeIs('products.*') ? 'hover:bg-blue-700' : 'hover:bg-orange-700' }}"
                        >Home</a>

                        <a href="{{ route('products.index') }}" 
                           class="rounded-md px-3 py-2 text-sm font-medium text-white
                                  {{ request()->routeIs('products.*') ? 'bg-blue-900' : '' }}
                                  {{ request()->routeIs('categories.*') ? 'hover:bg-orange-700' : 'hover:bg-blue-700' }}"
                        >
                            Product overview
                        </a>

                        <a href="{{ route('categories.index') }}" 
                           class="rounded-md px-3 py-2 text-sm font-medium text-white
                                  {{ request()->routeIs('categories.*') ? 'bg-orange-900' : '' }}
                                  {{ request()->routeIs('categories.*') ? 'hover:bg-orange-700' : 'hover:bg-blue-700' }}"
                        >
                            Categories overview
                        </a>

                        <a href="#" 
                           class="rounded-md px-3 py-2 text-sm font-medium text-white
                                  {{ request()->routeIs('products.*') ? 'hover:bg-blue-700' : 'hover:bg-orange-700' }}"
                        >Users</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>
