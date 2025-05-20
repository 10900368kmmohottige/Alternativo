<x-layout-admin>
    <h1 class="mt-10 text-3xl font-bold">Write Article</h1>
    <div class="mt-10">
        <x-forms.form method="POST" action="{{route('article.create')}}" enctype="multipart/form-data">
            <x-forms.input label="Title" name="title"/>
            <x-forms.input label="Slug" name="slug"/>
            <x-forms.text-area label="Content" class="h-full" name="content"/>
            <x-forms.submit>Create</x-forms.submit>
        </x-forms.form>
    </div>
</x-layout-admin>
