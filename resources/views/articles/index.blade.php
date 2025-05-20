<x-layout>
    <section class="min-h-screen">
        <div class="flex flex-col w-full items-center md:items-start text-center md:text-left">
            <h1 class="text-3xl font-bold w-full md:w-[70%]">Articles</h1>
            <div class="grid md:grid-cols-2 grid-cols-1 gap-4 mt-15 w-full">
                @foreach($articles as $article)
                    <div class="w-full bg-white border border-gray-200 rounded-lg shadow-sm h-max">
                        <div class="p-5 text-lef w-full">
                            <a class="mb-2 text-2xl font-bold tracking-tight text-gray-900" href="{{route('article.show', ['article' => $article->id])}}">{{$article->title}}</a>
                            <p class="mb-3 font-normal text-gray-700">{{$article->slug}}</p>
                            <x-button href="{{route('article.show', ['article' => $article->id])}}">Read More</x-button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-layout>
