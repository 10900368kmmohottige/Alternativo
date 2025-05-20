<x-layout-admin>
    <h1 class="mt-10 text-3xl font-bold">Update Product</h1>
    <div class="mt-10">
        <x-forms.form method="POST" action="{{route('product.edit', ['product' => $product])}}" enctype="multipart/form-data">
            @method('PATCH')
            <x-forms.select name="type" label="Product Type">
                <option value="1" {{$product->type==1 ? "selected" : ""}}>Medical</option>
                <option value="0" {{$product->type==0 ? "selected" : ""}}>Beauty</option>
            </x-forms.select>
            <x-forms.input label="Product Name" name="name" value="{{$product->name}}"/>
            <x-forms.input label="Product Slug" name="slug" value="{{$product->slug}}"/>
            <x-forms.text-area label="Product Description" name="description">{{$product->description}}</x-forms.text-area>
            <x-forms.input label="Price" name="price" type="number" value="{{$product->price}}"/>
            <x-forms.file-upload label="Product Image" name="image"/>
            <x-forms.submit>Create</x-forms.submit>
            <input type="submit" value="Delete" form="delete" class ="text-white bg-red-700 hover:bg-black cursor-pointer rounded text-sm px-5 py-2.5 me-2 mb-2 w-full"/>
        </x-forms.form>
        <x-forms.form class="hidden" id="delete" action="{{route('product.delete', ['product' => $product->id])}}" method="POST">
            @method('DELETE')
        </x-forms.form>
    </div>
</x-layout-admin>
