<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Voorraadbeheer</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
        <script src="https://unpkg.com/alpinejs" defer></script>

    </head>
    <body>
        <x-navbar/>

        <div class="container mx-auto py-4">
            <div class="flex justify-between items-center">
                <h1 class="text-orange-600 text-3xl font-bold">Create Category</h1>
                <a href="{{ route('categories.index') }}" class="bg-orange-600 rounded p-2 my-2 text-white hover:bg-orange-700 transition font-bold cursor-pointer">Back to overview</a>
            </div>

            <div class="py-4">
                <form method="POST" action="{{ route('categories.store') }}" class="bg-white">
                    @csrf
                    <div class="mb-4">
                        <label for="Category_Name" class="block font-medium text-orange-600 text-2xl">Category Name</label>
                        <input type="text" name="Category_Name" id="Category_Name" 
                               class="mt-2 py-2 block w-full border border-gray-300 rounded-md shadow-xl focus:border-orange-500 focus:ring-orange-500"
                               required>
                    </div>

                    <div class="mb-4">
                        <label for="Category_Description" class="block font-medium text-orange-600 text-2xl">Category Description</label>
                        <textarea name="Category_Description" id="Category_Description" rows="4"
                                  class="mt-2 py-2 block w-full border border-gray-300 rounded-md shadow-xl focus:border-orange-500 focus:ring-orange-500"
                                  required></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="Category_Inactive" class="block font-medium text-orange-600 text-2xl">Category Status</label>
                        <select name="Category_Inactive" id="Category_Inactive" 
                                class="mt-2 py-2 block w-full border border-gray-300 rounded-md shadow-xl focus:border-orange-500 focus:ring-orange-500">
                            <option value="0" selected>Active</option>
                            <option value="1">Inactive</option>
                        </select>
                    </div>

                    <button type="submit" class="bg-orange-600 rounded p-2 my-2 text-white hover:bg-orange-700 transition font-bold cursor-pointer">Add category +</button>
                </form>
            </div>
        </div>
    </body>
</html>
