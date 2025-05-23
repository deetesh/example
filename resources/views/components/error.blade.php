@props(['input_name'])
<div class="mt-2">
    @error($input_name)
        <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror
</div>