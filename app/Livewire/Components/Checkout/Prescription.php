<?php

namespace App\Livewire\Components\Checkout;

use App\Models\UserForm;
use Darryldecode\Cart\Facades\CartFacade;
use Darryldecode\Cart\CartCollection;
use Darryldecode\Cart\CartCondition;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Livewire\Attributes\Validate;
use Spatie\LivewireWizard\Components\StepComponent;

class Prescription extends StepComponent
{
    public CartCollection $items;
    public ?string $sessionKey = null;

    public bool $hasErectilePrematureCategory = false;
    public bool $hasGeneralMedicinesCategory = false;
    public bool $hasSteroidsMedicinesCategory = false;
    public bool $hasWeightLossCategory = false;
    public bool $hasBirthControlCategory = false;

    //For Auth
    public ?string $email = null;
    public ?string $first_name = null;
    public ?string $last_name = null;
    //

    public ?string $dob = null;
    public ?string $sex = null;
    public ?int $height = null;
    public ?int $weight = null;
    public ?string $bloodPressure = null;
    public ?string $alcohol = null;
    public ?string $smoke = null;
    public ?string $allergyDetails = null;

    public array $medications = [];
    public array $conditions = [];
    public array $acknowledgements = [];

    public float $prescriptionFee = 0.0;

    public function mount(): void
    {
        $this->sessionKey = session()->getId();
        $this->items = CartFacade::session($this->sessionKey)->getContent();

        $this->hasErectilePrematureCategory = $this->items->contains(fn($item) => $item->associatedModel->product->categories->contains('id', 11) || $item->associatedModel->product->categories->contains('id', 12));
        $this->hasGeneralMedicinesCategory = $this->items->contains(fn($item) => $item->associatedModel->product->categories->contains('id', 10));
        $this->hasSteroidsMedicinesCategory = $this->items->contains(fn($item) => $item->associatedModel->product->categories->contains('id', 13));
        $this->hasWeightLossCategory = $this->items->contains(fn($item) => $item->associatedModel->product->categories->contains('id', 14));
        $this->hasBirthControlCategory = $this->items->contains(fn($item) => $item->associatedModel->product->categories->contains('id', 15));

        $this->calculatePrescriptionFee();
    }

    public function rules(): array
    {
        $rules = [
            'email' => 'required|email',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'dob' => 'required|date|before:-18 years',
            'sex' => 'required|in:Male,Female,Other',
            'height' => 'required|numeric|min:50|max:250',
            'weight' => 'required|numeric|min:20|max:300',
            'bloodPressure' => 'required|in:Low 90/60,Normal 90/60-120/80,High 140/90',
            'alcohol' => 'required|in:Never,Occasionally,Frequently',
            'smoke' => 'required|in:No,Occasionally,Daily',
            'acknowledgements' => 'required|array',
        ];

        $required = [];

        if ($this->hasErectilePrematureCategory) $required[] = 'hasErectilePrematureCategory_summary';
        if ($this->hasGeneralMedicinesCategory) $required[] = 'hasGeneralMedicinesCategory_summary';
        if ($this->hasSteroidsMedicinesCategory) $required[] = 'hasSteroidsMedicinesCategory_summary';
        if ($this->hasWeightLossCategory) $required[] = 'hasWeightLossCategory_summary';
        if ($this->hasBirthControlCategory) $required[] = 'hasBirthControlCategory_summary';

        if (!empty($required)) {
            $rules['acknowledgements.*'] = 'in:' . implode(',', $required);
        }

        return $rules;
    }

    public function save()
    {
        $this->validate();

        $required = [];

        if ($this->hasErectilePrematureCategory) $required[] = 'hasErectilePrematureCategory_summary';
        if ($this->hasGeneralMedicinesCategory) $required[] = 'hasGeneralMedicinesCategory_summary';
        if ($this->hasSteroidsMedicinesCategory) $required[] = 'hasSteroidsMedicinesCategory_summary';
        if ($this->hasWeightLossCategory) $required[] = 'hasWeightLossCategory_summary';
        if ($this->hasBirthControlCategory) $required[] = 'hasBirthControlCategory_summary';

        $missing = array_diff($required, $this->acknowledgements);

        if (!empty($missing)) {
            foreach ($missing as $missed) {
                $this->addError('acknowledgements', "You must accept the acknowledgement: {$missed}.");
            }
            return;
        }

        // Store prescription data
        session()->put('checkout.prescription', [
            'general' => [
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'email' => $this->email,
                'dob' => $this->dob,
                'sex' => $this->sex,
                'height' => $this->height,
                'weight' => $this->weight,
                'blood_pressure' => $this->bloodPressure,
                'alcohol' => $this->alcohol,
                'smoke' => $this->smoke,
            ],
            'hasErectilePrematureCategory_acknowledged' => in_array('hasErectilePrematureCategory_summary', $this->acknowledgements),
            'hasGeneralMedicinesCategory_acknowledged' => in_array('hasGeneralMedicinesCategory_summary', $this->acknowledgements),
            'hasSteroidsMedicinesCategory_acknowledged' => in_array('hasSteroidsMedicinesCategory_summary', $this->acknowledgements),
            'hasWeightLossCategory_acknowledged' => in_array('hasWeightLossCategory_summary', $this->acknowledgements),
            'hasBirthControlCategory_acknowledged' => in_array('hasBirthControlCategory_summary', $this->acknowledgements),
        ]);

        if (!Auth::check()) {
            $password = Str::random(12);

            $user = User::create([
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'email' => $this->email,
                'password' => Hash::make($password),
            ]);

            Auth::login($user);
        }

        UserForm::create([
            'user_id' => Auth::id(),
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'dob' => $this->dob,
            'sex' => $this->sex,
            'height' => $this->height,
            'weight' => $this->weight,
            'blood_pressure' => $this->bloodPressure,
            'alcohol' => $this->alcohol,
            'smoke' => $this->smoke,
            'allergy_details' => $this->allergyDetails,
            'has_erectile_premature_ack' => in_array('hasErectilePrematureCategory_summary', $this->acknowledgements),
            'has_general_medicines_ack' => in_array('hasGeneralMedicinesCategory_summary', $this->acknowledgements),
            'has_steroids_medicines_ack' => in_array('hasSteroidsMedicinesCategory_summary', $this->acknowledgements),
            'has_weight_loss_ack' => in_array('hasWeightLossCategory_summary', $this->acknowledgements),
            'has_birth_control_ack' => in_array('hasBirthControlCategory_summary', $this->acknowledgements),
            'medications' => $this->medications,
            'conditions' => $this->conditions,
        ]);

        $this->nextStep();
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Email is required.',
            'email.email' => 'Email is invalid.',
            'first_name.required' => 'First name is required.',
            'last_name.required' => 'Last name is required.',
            'dob.required' => 'Date of birth is required.',
            'dob.before' => 'You must be at least 18 years old.',
            'sex.required' => 'Biological sex is required.',
            'height.required' => 'Height is required.',
            'weight.required' => 'Weight is required.',
            'blood_pressure.required' => 'Blood pressure is required.',
            'alcohol.required' => 'Please indicate alcohol consumption.',
            'smoke.required' => 'Please indicate smoking habits.',
            'acknowledgements.size' => 'You must confirm all acknowledgements to continue.',
        ];
    }

    public function calculatePrescriptionFee(): void
    {
        $this->prescriptionFee = 0;

        $sessionKey = session()->getId();
        $items = CartFacade::session($sessionKey)->getContent();

        $categoryFees = [
            10 => 14.99,
            11 => 14.99,
            12 => 14.99,
            13 => 14.99,
            14 => 14.99,
            15 => 14.99,
        ];

        foreach ($categoryFees as $categoryId => $fee) {
            if ($items->contains(function ($item) use ($categoryId) {
                return $item->associatedModel->product->categories->contains('id', $categoryId);
            })) {
                $this->prescriptionFee += $fee;
            }
        }

        session()->put('checkout.prescription_fee', $this->prescriptionFee);

        $this->dispatch('prescription-fee-updated', $this->prescriptionFee);
    }

    public function stepInfo(): array
    {
        return [
            'label' => __('Prescription'),
            'complete' => session()->has('checkout.prescription_fee'),
        ];
    }

    public function render(): View
    {
        return view('livewire.components.checkout.prescription');
    }
}
