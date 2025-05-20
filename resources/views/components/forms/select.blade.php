@props(['label'=>'', 'name'])

@php
    $defaults = [
        'id' => $name,
        'name' => $name,
        'class'=>'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-400 focus:border-red-400 block w-full p-2 outline-none appearance-none'
    ];
@endphp

<x-forms.field :$name :$label>
    <select {{$attributes($defaults)}}>
        <option value="">--Select Option--</option>
        {{$slot}}
    </select>
</x-forms.field>

