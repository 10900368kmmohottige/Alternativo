<x-layout-admin>
    <h1 class="mt-10 text-3xl font-bold">Edit</h1>
    <div class="mt-10">
        <x-forms.form method="POST" action="{{route('doctor.edit', ['doctor'=> $doctor->id])}}">
            @method('PATCH')
            <x-forms.input label="Name" name="name" value="{{$doctor->name}}"/>
            <x-forms.input label="Sure Name" name="surname" value="{{$doctor->surname}}"/>
            <x-forms.input label="Contact No" name="phone" value="{{$doctor->phone}}"/>
            <x-forms.input type="email" label="Email" name="email" value="{{$doctor->email}}"/>
            <x-forms.input label="Speciality" name="speciality" value="{{$doctor->speciality}}"/>
            <x-forms.submit>Update</x-forms.submit>
            <input type="submit" value="Delete" form="delete" class ="text-white bg-red-700 hover:bg-black cursor-pointer rounded text-sm px-5 py-2.5 me-2 mb-2 w-full"/>

        </x-forms.form>

        <x-forms.form class="hidden" id="delete" action="{{route('doctor.delete', ['doctor' => $doctor->id])}}" method="POST">
            @method('DELETE')
        </x-forms.form>
    </div>
</x-layout-admin>
