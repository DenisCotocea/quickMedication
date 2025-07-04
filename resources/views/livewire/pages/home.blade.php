<div class="relative isolate overflow-hidden">
    <x-container class="relative py-16 lg:flex lg:items-center lg:gap-x-10">
        <div class="sm:max-w-xl">
            <div>
                <h1 class="font font-heading text-4xl font-extrabold tracking-tight text-black sm:text-6xl">
                    {{ __('Trusted Health Products, Just Arrived') }}
                </h1>
                <p class="mt-4 text-xl text-gray-500">
                    {{ __('Explore our latest range of medications, supplements, and wellness products. Fresh stock, expert-approved, and ready to support your health journey.') }}
                </p>
            </div>
            <div class="py-10">
                <x-buttons.primary href="#" class="group px-8 py-3 text-center text-base font-medium">
                    {{ __('Browse Products') }}
                    <span class="ml-2 translate-x-0 transform transition duration-200 ease-in-out group-hover:translate-x-1">
                        <x-untitledui-arrow-narrow-right class="size-6" stroke-width="1.5" aria-hidden="true" />
                    </span>
                </x-buttons.primary>
            </div>
        </div>
        <div class="mt-16 sm:mt-24 lg:mt-0 lg:shrink-0 lg:grow">
            <img class="h-auto object-cover lg:max-w-3xl mx-auto" src="{{ asset('images/pills.jpeg') }}" alt="Assorted medications and supplements"/>
        </div>
    </x-container>

    <x-stats />

    <div class="bg-gray-50">
        <x-container class="py-16 lg:py-24">
            @if($collections->isNotEmpty())
                <section aria-labelledby="collection-heading" class="mx-auto max-w-xl lg:max-w-none">
                    <h2 id="collection-heading" class="font-heading text-2xl font-extrabold tracking-tight text-gray-950 sm:text-3xl">
                        {{ __('Shop by Collection') }}
                    </h2>
                    <p class="mt-2 text-base/6 max-w-3xl text-gray-500">
                        {{ __('Explore our curated furniture collections, designed to elevate every space. From modern minimalism to classic elegance, find timeless pieces that blend style, comfort, and functionality for your home.') }}
                    </p>

                    <div class="mt-10 space-y-12 lg:grid lg:grid-cols-3 lg:gap-x-8 lg:space-y-0">
                        @foreach($collections as $collection)
                            <x-link href="#" class="group block">
                                <img
                                    src="{{ $collection->getFirstMediaUrl(config('shopper.media.storage.thumbnail_collection')) }}"
                                    alt="{{ $collection->name }}"
                                    class="aspect-[3/2] w-full object-cover group-hover:opacity-75 lg:aspect-[3/2]"
                                />
                                <h3 class="mt-2 text-base font-semibold text-gray-900">
                                    {{ $collection->name }}
                                </h3>
                            </x-link>
                        @endforeach
                    </div>
                </section>
            @endif

                <section aria-labelledby="category-list" class="mt-4 max-w-3xl lg:mt-12 lg:max-w-none">
                    <h2 class="font-heading text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl mb-6 text-center">
                        {{ __('Our Categories') }}
                    </h2>

                    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3">
                        @foreach ($categories as $category)
                            <x-category.card :category="$category" />
                        @endforeach
                    </div>
                </section>

            <section aria-labelledby="products-list" class="mt-4 max-w-3xl lg:mt-12 lg:max-w-none">
                <h2 class="font-heading text-2xl font-semibold tracking-tight text-gray-950 sm:text-3xl">
                    {{ __('Trending products') }}
                </h2>

                <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                    @foreach ($products as $product)
                        <x-product.card :product="$product" />
                    @endforeach
                </div>
            </section>
        </x-container>
    </div>
</div>
