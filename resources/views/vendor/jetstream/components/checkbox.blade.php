@props(['name', 'title'])

<label class="label cursor-pointer px-0">
    <input type="checkbox" name="{{ $name }}" class="checkbox" />
    <span class="label-text ml-2">{{ $title }}</span>
</label>
