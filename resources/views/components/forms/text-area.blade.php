@props(['label'=>'', 'name', 'placeholder'=>false])

@php
    $defaults = [
        'id' => $name,
        'name' => $name,
        'placeholder' =>$placeholder,
        'class'=>"bg-gray-50 border border-gray-300 outline-none text-gray-900 text-sm rounded-lg focus:ring-red-400 focus:border-red-400 block w-full p-2 "
    ];

@endphp
<x-forms.field :$name :$label>
    <textarea {{ $attributes($defaults) }}>{{$slot}}</textarea>
</x-forms.field>

