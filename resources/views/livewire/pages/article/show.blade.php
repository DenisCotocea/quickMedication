<div class="bg-white">
    <div class="pb-16 pt-10 sm:pb-24">
        <x-container class="mt-8 max-w-2xl">
            <div class="lg:grid lg:grid-cols-1 lg:gap-x-8">
                <div class="lg:col-span-8">
                    <aside class="space-y-10 lg:sticky lg:top-40" aria-labelledby="article-content">
                        <h1 class="text-3xl font-extrabold text-gray-900 leading-tight">
                            {{ $article->title }}
                        </h1>

                        <p class="text-sm text-gray-500">
                            Published on {{ $article->published_at->format('F j, Y') }}
                        </p>

                        @if($article->featured_image_url)
                            <div class="mt-6">
                                <img src="{{ $article->featured_image_url }}"
                                     alt="Article image"
                                     class="rounded-md mx-auto object-cover max-w-full sm:max-w-[640px] shadow" />
                            </div>
                        @endif

                        <div class="prose prose-lg prose-img:mx-auto prose-img:max-w-full prose-img:rounded-md prose-img:shadow mt-8 text-gray-800">
                            {!! $article->content !!}
                        </div>
                    </aside>
                </div>
            </div>
        </x-container>
    </div>
</div>
