<x-layout-admin>
    <h1 class="mt-10 text-3xl font-bold">List a Doctor</h1>
    <div class="mt-10">
        <x-forms.form method="POST" action="{{route('doctor.add')}}">
            <x-forms.input label="Name" name="name"/>
            <x-forms.input label="Sure Name" name="surname"/>
            <x-forms.input label="Contact No" name="phone"/>
            <x-forms.input type="email" label="Email" name="email"/>
            <x-forms.input label="Speciality" name="speciality"/>
            <x-forms.submit>Add</x-forms.submit>
        </x-forms.form>
    </div>
</x-layout-admin>
