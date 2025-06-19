<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold mb-4">{{ $category->name }}</h1>

    @if($products->count())
        <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
            @foreach ($products as $product)
                <x-product.card :product="$product" />
            @endforeach
        </div>
    @else
        <p>No products found in this category.</p>
    @endif
</div>
