@props(['name'])

@error($name)
<p class="text-red-400 text-xs">{{$message}}</p>    
@enderror