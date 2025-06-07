<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo asset('css/style.css') ?>" type="text/css">
    <title>Create a product</title>
</head>

<body class="flex column rgap40">
    <header class="flex graybg pad50">
        <h1>Create a product</h1>
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
            <form class="flex column radius shadow pad20" action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("POST")
                <h1>Create a product</h1>
                <div class="field flex column">
                    <label for="image">Upload the image of the product:</label>
                    <input class="radius" id="image" name="image" type="file">
                </div>
                <div class="field flex column">
                    <label for="name">Enter the name of the product:</label>
                    <input class="radius" id="name" name="name" type="text" placeholder="Apple">
                </div>
                <div class="field flex column">
                    <label for="price">Enter the price of the product:</label>
                    <input class="radius" id="price" name="price" type="text" placeholder="1.24">
                </div>
                <button class="greenbg white radius" type="submit">Create</button>
            </form>
        </div>

    </section>

    <footer class="flex graybg pad50">
        <h2>Go to home page</h2>
        <button class="greenbg radius"><a class="white" href="{{route('product.index')}}">Go back to the home page</a></button>
    </footer>

</body>

</html>