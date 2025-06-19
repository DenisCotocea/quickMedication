@props(['category'])

<a href="{{ route('category-view', $category->id) }}" class="group block relative overflow-hidden bg-white shadow-sm transition hover:shadow-lg">
    <img
        src="{{ $category->media[0]->original_url }}"
        alt="{{ $category->name }}"
        class="w-full object-cover transition duration-300 group-hover:scale-105"
        style="height: 85%"
    >
    <div class="p-4">
        <h3 class="text-lg font-semibold text-left text-gray-900">{{ $category->name }}</h3>
    </div>
</a>
