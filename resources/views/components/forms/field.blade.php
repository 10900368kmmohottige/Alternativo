@props(['name', 'label'])
<div class="flex flex-col w-full space-y-2 mt-2">
    <label for="{{$name}}" class="w-full text-sm">{{$label}}</label>
    <div class="flex flex-col w-full h-max">
    {{$slot}}
<x-forms.error name={{$name}}/></div></div>
