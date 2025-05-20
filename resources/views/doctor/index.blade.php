<x-layout-admin>
    <div class="flex flex-col md:flex-row justify-between md:items-center gap-[14px]">
        <h1 class="text-3xl font-bold ">Doctors</h1>
        <x-button class="w-max h-max" href="{{route('doctor.add')}}">List a Doctor</x-button>
    </div>
    <div class="mt-10">
        @foreach($doctors as $doctor)
            <div class="flex flex-col w-full p-4 rounded-lg shadow-md mb-3 gap-1">
                <h3 class="font-semibold">{{$doctor->name}}</h3>
                <p>{{$doctor->speciality}}</p>
                <p>{{$doctor->phone}}</p>
                <p>{{$doctor->email}}</p>
                <x-button class="w-max" href="{{route('doctor.edit', ['doctor' => $doctor->id])}}">Edit</x-button>
            </div>
        @endforeach
        <div>
            {{$doctors->links()}}
        </div>
    </div>
</x-layout-admin>
