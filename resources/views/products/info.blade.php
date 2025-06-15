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
        <div class="container mx-auto my-4">
            <div class="flex justify-between items-center">
                <div class="flex space-x-2 items-center">
                    <h1 class="text-3xl font-bold text-blue-600">Product Information </h1>
                    <a href="{{ route('products.edit' , $product->id) }}" class="text-blue-600 cursor-pointer"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                    </a></svg>

                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?')" class="inline-block items-center">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-800 transition cursor-pointer" title="Delete">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </button>
                    </form>
                </div>
                <a href="{{ route('products.index') }}" class="bg-blue-600 rounded p-2 my-2 text-white hover:bg-blue-700 transition font-bold cursor-pointer">Back to overview</a>
            </div>

            <div class="bg-white shadow-md rounded my-3 p-6">
                <h2 class="text-2xl font-bold mb-4">{{ $product->Product_Name }}</h2>
                <p class="mb-2"><strong>Description:</strong> {{ $product->Product_Description }}</p>
                <p class="mb-2"><strong>Quantity:</strong> {{ $product->Product_Quantity }}</p>
                <p class="mb-2"><strong>Category:</strong> {{ $product->Category ? $product->Category->Category_Name : 'N/A' }}</p>
                <p><strong>Price:</strong> €{{ number_format($product->Product_Price, 2) }}</p>
            </div>
        </div>
    </body>
</html>
