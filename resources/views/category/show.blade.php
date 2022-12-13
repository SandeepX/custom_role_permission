<div class="row">
    <div class="container col-md-6 text-center ">
        <h2>Product Name: {{ ucfirst($category->title) }}</h2>
        <p>Total Product Quantity : {{$category->products_count}}</p>

        <h3>Category And Stock Product quantity</h3>

        <ul>
            @foreach($category->products as $product)
                <li> title: {{ $product->name }}</li>
                <li> price: {{ $product->price }}</li>
                <li> stock qty: {{ $product->pivot->stock_left ?? 0 }}</li>
                <br><br>
            @endforeach
        </ul>

    </div>
</div>

