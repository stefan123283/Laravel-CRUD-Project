<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo asset('css/style.css') ?>" type="text/css">
    <title>Control panel</title>
</head>

<body class="flex column">
    <header class="flex graybg pad50">
        <h1>Manage the stock of the products</h1>
        <div class="flex">
            <button class="greenbg radius white">
                <a class="white" href="{{route('product.create')}}">Create a new product</a>
            </button>
            <button class="radius"><a class="black" href="{{ route('register') }}">Register</a></button>
            <button class="radius"><a class="black" href="{{ route('login') }}">Log in</a></button>
        </div>
    </header>

    @if(session()->has('success'))
    <section class="flex green alert alert-success pad50">
        <h2>{{session()->get('success')}}</h2>
    </section>
    @endif

    <section class="flex column pad50">
        <h2>Products</h2>
        <div class="flex rgap40 wrap">
            @foreach ($products as $product)
            <div class="product flex column center radius shadow pad20">
                <img class="radius" src="{{ asset('storage/' . $product->image) }}" alt="Product">
                <p>{{$product->name}}</p>
                <p class="gray">{{$product->price}}$</p>
                <button class="greenbg radius"><a class="white" href="{{ route('product.edit', $product->id) }}">Edit</a></button>
                <form action="{{ route('product.destroy', $product) }}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button class="redbg white radius" type="submit">Delete</button>
                </form>
            </div>
            @endforeach
        </div>
    </section>

    <footer class="flex graybg pad50">
        <h2>Create a product</h2>
        <button class="greenbg radius white">
                <a class="white" href="{{route('product.create')}}">Create a new product</a>
            </button>
    </footer>

</body>

</html>