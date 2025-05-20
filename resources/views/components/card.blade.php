@props(['heading'])
<div class="w-full bg-white border border-gray-200 rounded-lg shadow-sm ">
    <div class="p-5 text-left">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{$heading}}</h5>
        <p class="mb-3 font-normal text-gray-700">{{$slot}}</p>
    </div>
</div>
