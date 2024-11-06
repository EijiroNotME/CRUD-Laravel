<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Product</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    @if($errors->any())
    <div class="absolute top-4 left-1/2 transform -translate-x-1/2 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-md shadow-lg w-full max-w-lg">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('product.update', ['product'=> $product ]) }}" method="POST" class="bg-white p-8 rounded-lg shadow-lg border border-gray-200 w-full max-w-lg space-y-6">
        @csrf
        @method('PUT')

        <h2 class="text-2xl font-semibold text-gray-800 text-center mb-4 uppercase">Edit Product</h2>

        <div class="flex flex-col">
            <label for="name" class="text-gray-700 font-medium mb-1">Name</label>
            <input type="text" name="name" id="name" required placeholder="Enter name" value="{{ $product->name }}" class="border border-gray-300 rounded-md px-4 py-2 focus:ring focus:ring-blue-200 focus:outline-none">
        </div>

        <div class="flex flex-col">
            <label for="qty" class="text-gray-700 font-medium mb-1">Quantity</label>
            <input type="number" name="qty" id="qty" required placeholder="Enter quantity" value="{{ $product->qty }}" class="border border-gray-300 rounded-md px-4 py-2 focus:ring focus:ring-blue-200 focus:outline-none">
        </div>

        <div class="flex flex-col">
            <label for="price" class="text-gray-700 font-medium mb-1">Price</label>
            <input type="text" name="price" id="price" required placeholder="0.00" value="{{ $product->price }}" class="border border-gray-300 rounded-md px-4 py-2 focus:ring focus:ring-blue-200 focus:outline-none">
        </div>

        <div class="flex flex-col">
            <label for="description" class="text-gray-700 font-medium mb-1">Description</label>
            <textarea name="description" id="description" required placeholder="Enter description" class="border border-gray-300 rounded-md px-4 py-2 focus:ring focus:ring-blue-200 focus:outline-none h-24">{{ $product->description }}</textarea>
        </div>

        <div class="flex justify-center">
            <input type="submit" value="UPDATE" class="bg-blue-600 text-white font-semibold px-6 py-2 rounded-md cursor-pointer hover:bg-blue-700 transition">
        </div>
    </form>

</body>
</html>
