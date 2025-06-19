<?php

declare(strict_types=1);

use function Livewire\Volt\{on, state};

state(['price' => data_get(session()->get('checkout'), 'prescription_fee', 0)]);

on(['prescription-fee-updated' => function () {
    $this->price = data_get(session()->get('checkout'), 'prescription_fee', 0);
}]);

?>

<dd class="text-base">
    {{ shopper_money_format(amount: $price, currency: current_currency()) }}
</dd>
