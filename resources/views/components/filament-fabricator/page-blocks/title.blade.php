@aware(['page'])
@props([
    'title',
    'subtitle'
])
<div class="px-4 py-4 md:py-8">
    <div class="mx-auto max-w-7xl">
        <h1> {{ $title }} </h1>
        <h3> {{ $subtitle }} </h3>
    </div>
</div>
