<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo asset('css/style.css') ?>" type="text/css">
    <title>Update a product</title>
</head>

<body class="flex column rgap40">
    <header class="flex graybg pad50">
        <h1>Update the details of the product</h1>
        <div class="flex">
            <button class="greenbg radius"><a class="white" href="{{route('product.index')}}">Go back to the home page</a></button>
            <button class="radius"><a class="black" href="{{ route('register') }}">Register</a></button>
            <button class="radius"><a class="black" href="{{ route('login') }}">Log in</a></button>
        </div>
    </header>

    @if ($errors->any())
    <section class="flex center">
        <div class="flex column errors center shadow pad20 radius">
            <h2>Please pay attention to the following errors:</h2>
            <ul>
                @foreach ($errors->all() as $error)
                <li class="red">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </section>

    <section class="flex column">
        <div class="flex column center">
            <form class="flex column radius shadow pad20" action="{{route('product.update', ['product' => $product->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <h1>Update the product</h1>
                <div class="field flex column">
                    <label for="image">Edit the image of the product:</label>
                    <img class="radius" src="{{ asset('storage/' . $product->image) }}" alt="Product">
                    <input class="radius" id="image" name="image" type="file">
                </div>
                <div class="field flex column">
                    <label for="name">Edit the name of the product:</label>
                    <input class="radius" id="name" name="name" type="text" placeholder="Apple" value="{{$product->name}}">
                </div>
                <div class="field flex column">
                    <label for="price">Edit the price of the product:</label>
                    <input class="radius" id="price" name="price" type="text" placeholder="1.24" value="{{$product->price}}">
                </div>
                <button class="greenbg radius white" type="submit">Update</button>
            </form>
        </div>
    </section>

    <footer class="flex graybg pad50">
        <h2>Go to home page</h2>
        <div class="flex">
            <button class="radius"><a class="black" href="{{route('product.index')}}">Go back to the home page</a></button>
            <button class="greenbg radius white">
                <a class="white" href="{{route('product.create')}}">Create a new product instead</a>
            </button>
        </div>

    </footer>

</body>

</html>