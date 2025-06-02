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
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-3xl font-bold text-orange-600">Categories overview</h1>
                <button class="bg-orange-600 rounded p-2 my-2 text-white hover:bg-orange-700 transition font-bold cursor-pointer">Add a category+</button>
            </div>

            <div class="overflow-x-auto bg-white shadow-md rounded my-3">
                <table class="w-full table-auto border-collapse border border-gray-300">
                    <thead class="text-white font-bold">
                        <tr class="bg-orange-600">
                            <th class="px-4 py-2 text-left whitespace-nowrap">Category ID</th>
                            <th class="px-4 py-2 text-left whitespace-nowrap">Name</th>
                            <th class="px-4 py-2 text-left whitespace-nowrap">Description</th>
                            <th class="px-4 py-2 text-left whitespace-nowrap">Relations</th>
                            <th class="px-4 py-2 text-left whitespace-nowrap">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr class="border-b border-gray-200">
                                <td class="px-4 py-2">{{ $category->id }}</td>
                                <td class="px-4 py-2">{{ $category->Category_Name }}</td>
                                <td class="px-4 py-2">{{ $category->Category_Description }}</td>
                                <td class="px-4 py-2">
                                    {{ $category->products_count }} product{{ $category->products_count === 1 ? '' : 's' }}
                                </td>
                                <td class="px-4 py-2">
                                    <!-- Your actions go here (edit/delete/etc) -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

        </div>
    </body>
</html>
