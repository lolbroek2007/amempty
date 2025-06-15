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
        <div class="container mx-auto">
            <div class="flex justify-between items-center py-4">
                <h1 class="text-3xl font-bold text-blue-600">Edit product: <strong class="italic">{{ $products-> Product_Name}}</strong></h1>
                <a href="{{ route('products.index') }}" class="bg-blue-600 rounded p-2 my-2 text-white hover:bg-blue-700 transition font-bold cursor-pointer">Back to overview</a>
            </div>

            <div class="py-2">
                <form action="{{ route('products.update', $products->id) }}" method="POST" class="bg-white p-6 rounded shadow-md">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="block text-2xl font-bold text-blue-600 mb-2" for="Product_Name">Product Name</label>
                        <input type="text" id="Product_Name" name="Product_Name" value="{{ old('Product_Name', $products->Product_Name) }}" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>

                    <div class="mb-4">
                        <label for="Product_Description" class="block text-2xl font-bold text-blue-600 mb-2">Product Description</label>
                        <textarea id="Product_Description" name="Product_Description" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required    ">{{ old('Product_Description', $products->Product_Description) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="Product_Quantity" class="block text-2xl font-bold text-blue-600 mb-2">Product Quantity</label>
                        <input type="number" id="Product_Quantity" name="Product_Quantity" value="{{ old('Product_Quantity', $products->Product_Quantity) }}" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>

                    <div class="mb-4">
                        <label for="Category_ID" class="block text-2xl font-bold text-blue-600 mb-2">Product Category</label>
                        <select id="Category_ID" name="Category_ID" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            <option value="" disabled>Select a category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $products->Category_ID == $category->id ? 'selected' : '' }}>
                                    {{ $category->Category_Name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="Product_Price" class="block text-2xl font-bold text-blue-600 mb-2">Product price</label>
                        <input type="number" id="Product_Price" name="Product_Price" value="{{ old('Product_Price', $products->Product_Price) }}" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    
                    <div class="mb-4">
                        <label for="Product_Disabled" class="block text-2xl font-bold text-blue-600 mb-2">Product disabled</label>
                        <label class="inline-flex items-center space-x-2 text-lg text-gray-700 mb-4">
                            <input id="Product_Disabled" type="checkbox" name="Product_Disabled" value="1" {{ $products->Product_Inactive ? 'checked' : '' }} class="ml-2">
                            <span class="italic">Yes, disable product</span>
                        </label>
                    </div>
                    
                </form>
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-600 rounded p-2 mt-4 text-white hover:bg-blue-700 transition font-bold cursor-pointer">Edit product</button>
                    <form action="{{ route('products.destroy', $products->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 rounded p-2 my-2 text-white hover:bg-red-700 transition font-bold cursor-pointer">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
