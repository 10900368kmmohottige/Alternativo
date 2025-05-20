<x-layout>
    <section class="min-h-screen">
        <div class="flex flex-col w-full items-start text-left">
            <h1 class="text-3xl font-bold w-full md:w-[70%]">Channel a Doctor</h1>
            <div class="w-full mt-3">
                    @foreach($doctors as $doctor)
                        <div class="border rounded-lg overflow-hidden">
                            <div class="w-full p-4 bg-green-700">
                                <h3 class="mb-3 text-white">{{$doctor->name . " --" .$doctor->speciality}}</h3>
                            </div>
                            <div class="p-4">
                                <p>
                                <br class="mb-2 text-black">
                                    Contact Info<br/>
                                    {{$doctor->phone}}</br>
                                    {{$doctor->email}}
                                </p>
                            </div>
                        </div>
                    @endforeach
            </div>
        </div>
    </section>
</x-layout>


