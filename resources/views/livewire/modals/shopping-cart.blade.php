<div class="flex flex-col h-full divide-y divide-gray-200">
    <div class="flex-1 h-0 py-6 overflow-y-auto">
        <header class="px-4 sm:px-6">
            <div class="flex items-start justify-between">
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('My cart') }}
                </h2>
                <div class="flex items-center ml-3 h-7">
                    <button
                        type="button"
                        class="text-gray-400 bg-white rounded-md hover:text-gray-500"
                        wire:click="$dispatch('closePanel')"
                    >
                        <span class="sr-only">Close panel</span>
                        <x-untitledui-x class="size-6" stroke-width="1.5" aria-hidden="true" />
                    </button>
                </div>
            </div>
        </header>

        <div class="flex-1 px-4 mt-8 sm:px-6">
            @if ($items->isNotempty())
                <div class="flow-root">
                    <ul role="list" class="-my-6 divide-y divide-gray-200">
                        @foreach ($items as $item)
                            <x-cart.item wire:key="{{ $item->id }}" :item="$item" />
                        @endforeach
                    </ul>
                </div>
            @else
                <div class="space-y-5 text-center">
                    <div class="flex items-center justify-center shrink-0">
                        <x-phosphor-shopping-cart-duotone class="w-auto h-24 text-primary-500" aria-hidden="true" />
                    </div>
                    <div class="text-center">
                        <h1 class="text-2xl font-semibold text-gray-900 font-heading">
                            {{ __('Your cart is empty') }}
                        </h1>
                        <p class="mt-2 text-gray-500">
                            {{ __('Browse our product catalog to find your perfect match.') }}
                        </p>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="p-4 space-y-4 sm:p-6">
        <div class="text-sm text-gray-500">
            <div class="flex items-center justify-between pb-1 mb-3 border-b border-gray-200">
                <p>{{ __('Prescription fee') }}</p>
                <p class="text-right">{{ __('Calculated at the time of payment') }}</p>
            </div>
            <div class="flex items-center justify-between pt-1 pb-1 mb-3 border-b border-gray-200">
                <p>{{ __('Delivery') }}</p>
                <p class="text-right">{{ __('Calculated at the time of payment') }}</p>
            </div>
            <div class="flex items-center justify-between pt-1 pb-1 mb-3 border-b border-gray-200">
                <p>{{ __('Subtotal') }}</p>
                <p class="text-base text-right text-gray-950">
                    {{ shopper_money_format($subtotal, currency: current_currency()) }}
                </p>
            </div>
        </div>
        <x-buttons.primary :href="route('checkout')" class="w-full px-8 py-3"  wire:loading.attr="disabled">
            {{ __('Proceed to checkout') }}
        </x-buttons.primary>
    </div>
</div>
