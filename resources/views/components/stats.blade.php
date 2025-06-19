<x-container class="py-10 sm:py-14 lg:py-16">
    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
        <div class="flex items-center">
            <x-phosphor-truck-duotone class="size-8 text-primary-500" aria-hidden="true" stroke-width="1.5" />
            <div class="ml-4">
                <h4 class="font-heading font-medium text-gray-900">{{ __('Free shipping') }}</h4>
                <p class="text-sm leading-5 text-gray-500">
                    {{ __('From :amount', ['amount' => shopper_money_format(5000, current_currency())]) }}
                </p>
            </div>
        </div>
        <div class="flex items-center">
            <x-phosphor-shield-check-duotone class="size-8 text-primary-500" aria-hidden="true" stroke-width="1.5" />
            <div class="ml-4">
                <h4 class="font-heading font-medium text-gray-900">{{ __('Secure payment') }}</h4>
                <p class="text-sm leading-5 text-gray-500">{{ __('On all orders') }}</p>
            </div>
        </div>
        <div class="flex items-center">
            <x-phosphor-headset-duotone class="size-8 text-primary-500" aria-hidden="true" stroke-width="1.5" />
            <div class="ml-4">
                <h4 class="font-heading font-medium text-gray-900">{{ __('Quality assurance') }}</h4>
                <p class="text-sm leading-5 text-gray-500">{{ __('Authentic and tested products') }}</p>
            </div>
        </div>
        <div class="flex items-center">
            <x-phosphor-arrows-clockwise-duotone class="size-8 text-primary-500" aria-hidden="true" stroke-width="1.5" />
            <div class="ml-4">
                <h4 class="font-heading font-medium text-gray-900">{{ __('Medical prescription') }}</h4>
                <p class="text-sm leading-5 text-gray-500">{{ __('Issued by licensed professionals') }}</p>
            </div>
        </div>
    </div>
</x-container>
