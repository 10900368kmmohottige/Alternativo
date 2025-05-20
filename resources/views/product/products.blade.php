<x-layout>
    <section>
        <div class="flex flex-col w-full items-center md:items-start text-center md:text-left">
            <h1 class="text-3xl font-bold w-full md:w-[70%]">Available Products</h1>
            <div class="grid md:grid-cols-3 grid-cols-1 gap-4 mt-15 w-full">
                @foreach($products as $product)
                    <div class="w-full bg-white border border-gray-200 rounded-lg shadow-sm h-max">
                        <div class="w-full h-[200px] rounded-lg bg-gray-400 bg-cover bg-center"
                              style="background-image: url('{{env('APP_URL')}}/product_images/{{ $product->image }}');">
                        </div>

                        <div class="p-5 text-lef w-full">
                            <a class="mb-2 text-2xl font-bold tracking-tight text-gray-900" href="{{route('products.show', ['product' => $product->id])}}">{{$product->name}}</a>
                            <p class="mb-3 font-normal text-gray-700">{{$product->slug}}</p>
                            <p class="mb-3 font-normal text-gray-700">Rs {{$product->price}}</p>
                            <x-button href="{{route('buy', ['product' => $product->id])}}">Request</x-button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-layout>
