<?php

declare(strict_types=1);

namespace App\Actions;

use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Support\Facades\Auth;
use Shopper\Core\Models\Country;
use Shopper\Core\Models\Order;
use Illuminate\Support\Facades\Cookie;
use Shopper\Core\Models\OrderAddress;
use Shopper\Core\Models\OrderItem;

class CreateOrder
{
    public function handle(): Order
    {
        $checkout = session()->get('checkout');
        $sessionId = session()->getId();
        $customer = Auth::user();

        $totalprice = data_get($checkout, 'totalPrice');

        /** @var OrderAddress $shippingAddress */
        $shippingAddress = OrderAddress::query()->create([
            'customer_id' => data_get($checkout, 'shipping_address.user_id'),
            'last_name' => data_get($checkout, 'shipping_address.last_name'),
            'first_name' => data_get($checkout, 'shipping_address.first_name'),
            'street_address' => data_get($checkout, 'shipping_address.street_address'),
            'street_address_plus' => data_get($checkout, 'shipping_address.street_address_plus'),
            'city' => data_get($checkout, 'shipping_address.city'),
            'postal_code' => data_get($checkout, 'shipping_address.postal_code'),
            'phone' => data_get($checkout, 'shipping_address.phone_number'),
            // @phpstan-ignore-next-line
            'country_name' => Country::query()
                ->find(data_get($checkout, 'shipping_address.country_id'))
                ->name,
        ]);
        /** @var OrderAddress $billingAddress */
        $billingAddress = ! data_get($checkout, 'same_as_shipping')
            ? OrderAddress::query()->create([
                'customer_id' => data_get($checkout, 'billing_address.user_id'),
                'last_name' => data_get($checkout, 'billing_address.last_name'),
                'first_name' => data_get($checkout, 'billing_address.first_name'),
                'street_address' => data_get($checkout, 'billing_address.street_address'),
                'street_address_plus' => data_get($checkout, 'billing_address.street_address_plus'),
                'city' => data_get($checkout, 'billing_address.city'),
                'postal_code' => data_get($checkout, 'billing_address.postal_code'),
                'phone' => data_get($checkout, 'billing_address.phone_number'),
                // @phpstan-ignore-next-line
                'country_name' => Country::query()
                    ->find(data_get($checkout, 'billing_address.country_id'))
                    ->name,
            ])
            : $shippingAddress;

        /** @var Order $order */
        $order = Order::query()->create([
            'number' => generate_number(),
            'customer_id' => $customer->id,
            'zone_id' => 1,
            'currency_code' => current_currency(),
            'shipping_address_id' => $shippingAddress->id,
            'price_amount' => $totalprice,
            'billing_address_id' => $billingAddress->id,
            'shipping_option_id' => data_get($checkout, 'shipping_option')[0]['id'],
            'payment_method_id' => data_get($checkout, 'payment')[0]['id'],
            'clickid' => Cookie::get('clickid'),
        ]);

        // @phpstan-ignore-next-line
        foreach (CartFacade::session($sessionId)->getContent() as $item) {
            OrderItem::query()->create([
                'order_id' => $order->id,
                'quantity' => $item->quantity,
                'unit_price_amount' => $item->price,
                'name' => $item->name,
                'sku' => $item->associatedModel->sku,
                'product_id' => $item->associatedModel->id,
                'product_type' => $item->associatedModel->getMorphClass(),
            ]);
        }

        CartFacade::session($sessionId)->clear();

        return $order;
    }
}
