<ul class="dropdown-menu" style="display:block; position:relative">
    @foreach($products as $product)

    <li style="margin:5px 0"><a style="color:black"
            href="{{route('home.product', ['id' => $product->id])}}">{{$product->title}}</a></li>

    @endforeach
</ul>