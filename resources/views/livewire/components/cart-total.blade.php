<?php

declare(strict_types=1);

use Darryldecode\Cart\Facades\CartFacade;

use function Livewire\Volt\{on, state};

state([
    'price' => CartFacade::session(session()->getId())->getTotal() + data_get(session()->get('checkout'), 'prescription_fee', 0),
]);

on(['cart-price-update' => function () {
    $cartTotal = CartFacade::session(session()->getId())->getTotal();
    $shippingPrice = data_get(session()->get('checkout'), 'shipping_option.0.price', 0);
    $prescriptionFee = data_get(session()->get('checkout'), 'prescription_fee', 0);

    $this->price = $cartTotal + $shippingPrice + $prescriptionFee;
}]);

on(['prescription-fee-updated' => function () {
    $cartTotal = CartFacade::session(session()->getId())->getTotal();
    $shippingPrice = data_get(session()->get('checkout'), 'shipping_option.0.price', 0);
    $prescriptionFee = data_get(session()->get('checkout'), 'prescription_fee', 0);

    $this->price = $cartTotal + $shippingPrice + $prescriptionFee;
}]);
?>

<dd class="text-base">
    {{ shopper_money_format(amount: $price, currency: current_currency()) }}
</dd>
