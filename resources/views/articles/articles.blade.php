<x-layout-admin>
    <div class="flex flex-col md:flex-row justify-between md:items-center gap-[14px]">
        <h1 class="text-3xl font-bold ">Articles</h1>
        <x-button class="w-max h-max" href="{{route('article.create')}}">Create Article</x-button>
    </div>
    <div class="mt-10">
        @foreach($articles as $article)
            <div class="flex flex-col w-full p-4 rounded-lg shadow-md mb-3 gap-1">
                <h3 class="font-semibold">{{$article->title}}</h3>
                <p>{{$article->slug}}</p>
                <x-button class="w-max" href="{{route('article.edit', ['article' => $article->id])}}">Edit</x-button>
            </div>
        @endforeach
        <div>
            {{$articles->links()}}
        </div>
    </div>
</x-layout-admin>
