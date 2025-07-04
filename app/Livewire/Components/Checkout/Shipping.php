<?php

declare(strict_types=1);

namespace App\Livewire\Components\Checkout;

use App\Actions\ZoneSessionManager;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Shopper\Core\Models\Address;
use Spatie\LivewireWizard\Components\StepComponent;

class Shipping extends StepComponent
{
    #[Validate('required', message: 'You need to select a delivery address')]
    public ?int $shippingAddressId = null;

    #[Validate('boolean')]
    public bool $sameAsShipping = false;

    #[Validate('required_if_declined:sameAsShipping', message: 'You must choose a billing address')]
    public ?int $billingAddressId = null;

    public function mount(): void
    {
        $checkout = session()->get('checkout');

        $this->shippingAddressId = data_get($checkout, 'shipping_address.id');
        $this->billingAddressId = data_get($checkout, 'billing_address.id');
        $this->sameAsShipping = (bool) data_get($checkout, 'same_as_shipping');
    }

    public function save(): void
    {
        $this->validate();

        $prescriptionFee = session('checkout.prescription_fee');

        if (session()->exists('checkout')) {
            session()->forget('checkout');
        }

        session()->put('checkout', [
            'shipping_address' => $shippingAddress = Address::query()->find($this->shippingAddressId)->toArray(),
            'same_as_shipping' => $this->sameAsShipping,
            'billing_address' => $this->sameAsShipping
                ? $shippingAddress
                : Address::query()->find($this->billingAddressId)->toArray(),
            'prescription_fee' => $prescriptionFee,
        ]);

        $this->nextStep();
    }

    public function stepInfo(): array
    {
        return [
            'label' => __('Address'),
            'complete' => session()->exists('checkout')
                && data_get(session()->get('checkout'), 'shipping_address') !== null,
        ];
    }

    #[On('addresses-updated')]
    public function render(): View
    {
        $countryId = ZoneSessionManager::getSession()?->countryId;
        $addresses = Auth::user()->addresses()
            ->get()
            ->groupBy('type');

        return view('livewire.components.checkout.shipping', [
            'addresses' => $addresses,
        ]);
    }
}
