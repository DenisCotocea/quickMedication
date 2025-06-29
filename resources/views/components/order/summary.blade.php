@props([
    'order',
])

<div class="border border-gray-200 py-4 divide-y divide-gray-200 divide-dashed">
    <dl class="space-y-4 px-4 pb-4">
        <div class="flex items-center justify-between border-t border-gray-200 pt-4">
            <dt class="font-heading font-medium text-primary-950">{{ __('Total') }}</dt>
            <dd class="text-base font-bold text-gray-900">
                {{ shopper_money_format($order->total(), $order->currency_code) }}
            </dd>
        </div>
    </dl>
    <dl class="grid grid-cols-2 gap-x-6 p-4 text-sm">
        <div>
            <dt class="font-medium text-gray-900">
                {{ __('Shipping Address') }}
            </dt>
            <dd class="mt-2 text-gray-500">
                <span class="block">
                    {{ $order->shippingAddress->first_name }} {{ $order->shippingAddress->last_name }}
                </span>
                <span class="block">{{ $order->shippingAddress->street_address }}</span>
                <span class="block">
                    {{ $order->shippingAddress->city }}, {{ $order->shippingAddress->postal_code }}
                </span>
                <span class="block">{{ $order->shippingAddress->country_name }}</span>
            </dd>
        </div>
        <div>
            <dt class="font-medium text-gray-900">
                {{ __('Billing address') }}
            </dt>
            <dd class="mt-2 text-gray-500">
                <span class="block">
                    {{ $order->billingAddress->first_name }} {{ $order->billingAddress->last_name }}
                </span>
                <span class="block">{{ $order->billingAddress->street_address }}</span>
                <span class="block">
                    {{ $order->billingAddress->city }}, {{ $order->billingAddress->postal_code }}
                </span>
                <span class="block">{{ $order->billingAddress->country_name }}</span>
            </dd>
        </div>
    </dl>
    <dl class="space-y-3 p-4">
        <dt class="text-sm leading-6 font-medium text-gray-900">
            {{ __('Payment method') }}
        </dt>
        <dd class="text-sm flex items-center gap-2 text-gray-500">
            <span class="font-medium text-base leading-6">{{ $order->paymentMethod->title }}</span>
        </dd>
    </dl>
</div>
