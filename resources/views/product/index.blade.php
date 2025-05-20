<x-layout-admin>
    <div class="flex flex-col md:flex-row justify-between md:items-center gap-[14px]">
        <h1 class="text-3xl font-bold ">Products</h1>
        <x-button class="w-max h-max" href="{{route('product.add')}}">Add Product</x-button>
    </div>
    <div class="mt-10">
        @foreach($products as $product)
            <div class="flex flex-col w-full p-4 rounded-lg shadow-md mb-3 gap-1">
                <img src="product_images/{{$product->image}}" width="40">
                <h3 class="font-semibold">{{$product->name}}</h3>
                <p>{{$product->price}}</p>
                <p>{{$product->type == 1 ? "Medical" : "Beauty"}}</p>
                <x-button class="w-max" href="{{route('product.edit', ['product' => $product->id])}}">Edit</x-button>
            </div>
        @endforeach
        <div>
            {{$products->links()}}
        </div>
    </div>
</x-layout-admin>
