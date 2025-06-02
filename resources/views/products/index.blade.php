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
                <h1 class="text-3xl font-bold text-blue-500">Products</h1>
                <button onclick="document.getElementById('productModal').classList.remove('hidden')" class="bg-blue-600 rounded p-2 my-2 text-white hover:bg-blue-700 transition font-bold cursor-pointer">Add a product +</button>
            </div>

            <div class="overflow-x-auto bg-white shadow-md rounded my-3">
                <table class="w-full table-auto border-collapse border border-gray-300">
                    <thead class="text-white font-bold">
                        <tr class="bg-blue-500">
                            <th class="px-4 py-2 text-left whitespace-nowrap">Product ID</th>
                            <th class="px-4 py-2 text-left whitespace-nowrap">Name</th>
                            <th class="px-4 py-2 text-left whitespace-nowrap">Inventory</th>
                            <th class="px-4 py-2 text-left whitespace-nowrap">Category</th>
                            <th class="px-4 py-2 text-left whitespace-nowrap">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr class="border-b border-gray-200">
                                <td class="px-4 py-2">{{ $product->id }}</td>
                                <td class="px-4 py-2">{{ $product->Product_Name }}</td>
                                <td class="px-4 py-2">{{ $product->Product_Quantity }}</td>
                                <td class="px-4 py-2">{{ $product->Category ? $product->Category->Category_Name : 'N/A' }}</td>
                                
                            </tr>
                        @endforeach
                </table>
            </div>

        </div>

        <div id="productModal" class="fixed flex inset-0 justify-center items-center z-50 hidden">
            <!-- Hier komt de form voor het toevoegen van een product -->
            <div class="bg-white p-6 rounded shadow-lg w-96">
                <div class="flex justify-between items-center mb-4">
                    <h1 class="font-bold">Add product</h1>
                    <button onclick="document.getElementById('productModal').classList.add('hidden')" class="text-gray-500 hover:text-red-700 font-bold cursor-pointer">&times;</button>
                </div>
                <form action="{{ route('products.create') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="productName" class="">Product name <span>*</span></label>
                        <input type="text" id="productName" name="Product_Name" class="w-full border border-gray-300 rounded p-2 mt-1" required>
                    </div>

                    <div class="mb-4">
                        <label for="productDescription">Product description</label>
                        <textarea id="productDescription" name="Product_Description" class="w-full border border-gray-300 rounded p-2 mt-1"></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="productInventory" class="">Inventory <span>*</span></label>
                        <input type="number" id="productInventory" name="Product_Quantity" class="w-full border border-gray-300 rounded p-2 mt-1" required>
                    </div>

                    <div class="mb-4">
                        <label for="productCategory" class="">Category <span>*</span></label>
                        <select id="productCategory" name="Category_ID" class="w-full border border-gray-300 rounded p-2 mt-1">
                            <option value="1">Default</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->Category_ID }}">{{ $category->Category_Name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="productPrice">Product price</label>
                        <input type="number" id="productPrice" name="Product_Price" class="w-full border border-gray-300 rounded p-2 mt-1">
                    </div>

                    <div class="mb-4">
                        <label for="productInactive">Product inactive</label>
                        <select id="productInactive" name="Product_Inactive" class="w-full border border-gray-300 rounded p-2 mt-1">
                            <option value="0" selected>No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>

                    <button type="submit" class="bg-blue-600 rounded p-2 my-2 text-white hover:bg-blue-700 transition font-bold cursor-pointer">Add product</button>
                </form>
            </div>
        </div>




    </body>
</html>
