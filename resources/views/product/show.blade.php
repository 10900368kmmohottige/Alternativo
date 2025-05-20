<x-layout>
    <section>
        <div class="flex flex-col w-full items-start text-left">

            <div class="w-full">
                <div class="w-full h-[200px] rounded-lg bg-gray-400 bg-cover bg-center"
                     style="background-image: url('{{env('APP_URL')}}/product_images/{{ $product->image }}');">
                </div>
                <div class="mt-4">
                    <h1 class="text-3xl font-bold w-full md:w-[70%] mb-3">{{$product->name}}</h1>
                    <p>{{$product->description}}</p>
                    <p>Category : {{$product->type == 1 ? "Medical" : "Beauty"}}</p>
                    <p class="mt-10 mb-3">Rs {{$product->price}}</p>
                    <x-button href="{{route('buy', ['product' => $product->id])}}">Request</x-button>
                </div>
            </div>
        </div>
    </section>
</x-layout>
