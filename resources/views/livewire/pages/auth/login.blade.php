<?php

declare(strict_types=1);

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.templates.app')] class extends Component
{
    public LoginForm $form;

    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('account', absolute: false), navigate: true);
    }
}; ?>

<div class="relative">
    <div class="relative min-h-full flex flex-col justify-center py-12 divide-y divide-gray-200 lg:max-w-2xl lg:mx-auto">
        <div class="sm:mx-auto sm:w-full sm:max-w-md py-8">
            <h2 class="font-heading text-2xl font-semibold text-gray-900">
                {{ __('I already have an account') }}
            </h2>
            <div class="my-6 space-y-4">
                <!-- Session Status -->
                <x-auth-session-status :status="session('status')" />

                <form wire:submit="login" class="space-y-4">
                    <!-- Email Address -->
                    <div>
                        <x-forms.label for="email" :value="__('E-mail')" />
                        <x-forms.input wire:model="form.email" id="email" class="block mt-1 w-full" type="email" name="email" required autofocus autocomplete="email" />
                        <x-forms.errors :messages="$errors->get('form.email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-forms.label for="password" :value="__('Password')" />
                        <x-forms.input wire:model="form.password" id="password" class="block mt-1 w-full"
                                       type="password"
                                       name="password"
                                       required autocomplete="current-password" />

                        <x-forms.errors :messages="$errors->get('form.password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="block">
                        <label for="remember" class="inline-flex items-center">
                            <input wire:model="form.remember" id="remember" type="checkbox" class="border-gray-300 text-brand focus:ring-brand" name="remember">
                            <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="space-y-5">
                        <x-link class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </x-link>

                        <x-buttons.submit :title="__('Log in')" wire:loading.attr="data-loading" class="w-full px-4" />
                    </div>
                </form>
            </div>

            <x-auth-oauth />
        </div>
        <div class="sm:mx-auto sm:w-full sm:max-w-md py-8">
            <div>
                <h2 class="font-heading text-xl font-semibold text-gray-900">
                    {{ __('New customer') }}
                </h2>
                <p class="mt-3 text-sm/5 text-gray-500">
                    {{ __('Create your own space for an enhanced shopping experience.') }}
                </p>
            </div>
            <div class="mt-6">
                <x-buttons.default :href="route('register')" class="w-full px-4">
                    {{ __('Create account') }}
                </x-buttons.default>
            </div>
        </div>
    </div>
</div>
