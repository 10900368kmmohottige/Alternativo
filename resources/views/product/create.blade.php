<x-layout-admin>
    <h1 class="mt-10 text-3xl font-bold">Create Product</h1>
    <div class="mt-10">
        <x-forms.form method="POST" action="{{route('product.add')}}" enctype="multipart/form-data">
            <x-forms.select name="type" label="Product Type">
                <option value="1">Medical</option>
                <option value="0">Beauty</option>
            </x-forms.select>
            <x-forms.input label="Product Name" name="name"/>
            <x-forms.input label="Product Slug" name="slug"/>
            <x-forms.text-area label="Product Description" name="description"/>
            <x-forms.input label="Price" name="price" type="number"/>
            <x-forms.file-upload label="Product Image" name="image"/>
            <x-forms.submit>Create</x-forms.submit>
        </x-forms.form>
    </div>
</x-layout-admin>
