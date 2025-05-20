@props(['label'=>'', 'name', 'placeholder'=>false])

@php
    $defaults = [
        'type' => 'file',
        'id' => $name,
        'name' => $name,
        'value' => old($name),
        'placeholder' =>$placeholder,
        'class'=>'bg-gray-50 border border-gray-300 outline-none text-gray-900 text-sm rounded focus:border-red-400 focus:ring-1 focus:ring-red-500 block w-full p-2'
    ];
@endphp
<x-forms.field :$name :$label>
    <input {{ $attributes($defaults) }}>
</x-forms.field>

