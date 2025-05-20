<x-layout>
    <section class="min-h-screen">
        <div class="flex flex-col w-full items-start text-left">
            <div class="w-full">
                <div class="mt-4">
                    <h1 class="text-3xl font-bold w-full md:w-[70%] mb-3">{{$article->title}}</h1>
                    <p class="mt-10 mb-3">{!! $article->content !!}</p>
                </div>
            </div>
        </div>
    </section>
</x-layout>
