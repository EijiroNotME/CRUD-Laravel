<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Products</title>
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="flex flex-col items-center min-h-screen p-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 uppercase">Product List</h1>
        
        @if(session()->has('success'))
            <div class="mb-4 px-4 py-2 bg-green-100 text-green-700 rounded-md shadow-md absolute right-2 top-2">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('product.create') }}" class="mb-4 px-4 py-2 bg-blue-600 text-white font-medium rounded-md shadow hover:bg-blue-700 transition">
            Add Product
        </a>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2 w-full max-w-6xl mt-6">
            @foreach($products as $product)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="p-4">
                       <div class="flex flex-row justify-between items-center">
                            <h2 class="text-2xl font-bold text-gray-700 mb-2">{{ $product->name }}</h2>
                            <p class="text-sm text-gray-600 font-semibold">${{ $product->price }}</p>
                            {{-- <p class="text-sm text-gray-600">{{ $product->id }}</p> --}}
                       </div>
                        <p class="text-sm text-gray-600">Quantity: {{ $product->qty }}</p>
                        
                        <p class="text-sm text-gray-600 italic">{{ $product->description }}</p>
                    </div>
                    <div class="flex justify-start gap-1 p-4 bg-gray-100">
                        <a href="{{ route('product.edit', ['product' => $product]) }}" class=" text-center px-3 py-1 w-16 bg-blue-500 text-white rounded-md text-sm font-medium hover:bg-blue-600 transition">
                            Edit
                        </a>
                        <form method="POST" action="{{route('product.destroy', ['product' => $product])}}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded-md text-sm font-medium hover:bg-red-600 transition">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
