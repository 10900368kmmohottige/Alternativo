<x-layout>
    <section>
        <div class="flex flex-col w-full items-start text-left">
            <h1 class="text-3xl font-bold w-full md:w-[70%]">Channel a Doctor</h1>
            <div class="w-full">
                <x-forms.form action="{{route('channel')}}" method="POST">
                    <x-forms.input name="f_name" label="First Name"></x-forms.input>
                    <x-forms.input name="l_name" label="Last Name"></x-forms.input>
                    <x-forms.input name="email" label="Email Address" type="email"></x-forms.input>
                    <x-forms.input name="phone" label="Phone No"></x-forms.input>
                    <x-forms.select name="doctor" id="doctor" label="Select Doctor">
                        @foreach($doctors as $doctor)
                            <option value="{{$doctor->id}}">{{$doctor->name}}</option>
                        @endforeach
                    </x-forms.select>
                    <x-forms.submit>Channel</x-forms.submit>
                </x-forms.form>
                @if(session('reply'))
                    @php
                        $message = session('reply');
                    @endphp
                    <p class="font-bold text-lg">{{$message}}</p>
                @endif
            </div>
        </div>
    </section>
</x-layout>
