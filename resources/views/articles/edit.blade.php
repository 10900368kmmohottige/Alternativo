<x-layout-admin>
    <h1 class="mt-10 text-3xl font-bold">Edit Article</h1>
    <div class="mt-10">
        <x-forms.form method="POST" action="{{route('article.edit', ['article'=> $article->id])}}">
            <x-forms.input label="Title" name="title" value="{{$article->title}}"/>
            <x-forms.input label="Slug" name="slug" value="{{$article->slug}}"/>
            <x-forms.text-area label="Content" class="h-full" name="content">{{$article->content}}</x-forms.text-area>
            <x-forms.submit>Update</x-forms.submit>
            <input type="submit" value="Delete" form="delete" class ="text-white bg-red-700 hover:bg-black cursor-pointer rounded text-sm px-5 py-2.5 me-2 mb-2 w-full"/>
        </x-forms.form>

        <x-forms.form class="hidden" id="delete" action="{{route('article.delete', ['article' => $article->id])}}" method="POST">
            @method('DELETE')
        </x-forms.form>
    </div>
</x-layout-admin>
