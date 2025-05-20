@props(['label'=>'', 'name', 'placeholder'=>false])

@php
    $defaults = [
        'type' => 'text',
        'id' => $name,
        'name' => $name,
        'value' => old($name),
        'placeholder' =>$placeholder,
        'class'=>"bg-gray-50 border border-gray-300 outline-none text-gray-900 text-sm rounded focus:ring-black focus:border-black block w-full p-2 "
    ];

@endphp
<div class="flex flex-col  w-full max-w-[700px] items-start space-y-2 mt-2">
    <label for="{{$name}}" class="text-sm">{{$label}}</label>
    <input {{ $attributes($defaults) }}>
    <x-forms.error name={{$name}}/>
</div>
