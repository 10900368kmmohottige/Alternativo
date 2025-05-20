<form {{$attributes->merge(['class'=>'space-y-2'])}}>
    @csrf
    {{$slot}}
</form>
