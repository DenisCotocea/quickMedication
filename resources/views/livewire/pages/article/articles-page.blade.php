<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold mb-4">Articles</h1>

    @if($articles->count())
        <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
            @foreach ($articles as $article)
                <a href="{{ route('single-article', $article->id) }}" class="block group">
                    <div class="aspect-1 ring-1 ring-gray-100 rounded-md">
                        <img
                            src="{{ $article->featured_image_url }}"
                            alt="{{ $article->title }} thumbnail"
                            class="size-full max-w-none object-cover object-center group-hover:opacity-75 transition"
                        />
                        <h3 class="text-sm font-medium text-gray-700 p-2">
                            {{ $article->title }}
                        </h3>
                    </div>
                </a>
            @endforeach
        </div>
    @else
        <p>No products found in this category.</p>
    @endif
</div>
