<div class="row">
    <div class="container col-md-6 text-center ">
        <h2>Product Name: {{ ucfirst($product->name) }}</h2>
        <p>Price : Rs.{{ number_format($product->price, 2) }}</p>
{{--        <p>Total Stock Quantity : {{$product->categories->sum('pivot.stock_left')}}</p>--}}
        <p>Total Stock Quantity : {{$product->categories_sum_category_productstock_left}}</p>

        <h3>Category And Stock Product quantity</h3>

        <ul>
            @foreach($product->categories as $category)
                <li> Title: {{ $category->title }}</li>
                <li> Stock quantity : {{ $category->pivot->stock_left ?? 0 }} </li> <br>
            @endforeach
        </ul>

    </div>
</div>
