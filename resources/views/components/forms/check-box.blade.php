@props(['label'=>'', 'name'])

@php
    $defaults = [
        'type' => 'checkbox',
        'id' => $name,
        'name' => $name,
        'class'=>"w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-red-500 focus:ring-2"
    ];
@endphp
<x-forms.field :$name :$label>
    <input {{ $attributes($defaults) }}>
</x-forms.field>
