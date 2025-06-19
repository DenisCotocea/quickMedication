<footer aria-labelledby="footer-heading" class="bg-white border-t border-gray-100">
    <h2 id="footer-heading" class="sr-only">{{ __('Footer') }}</h2>
    <x-container>
        <div class="grid grid-cols-1 gap-8 py-10 lg:grid-cols-3 lg:py-20">
            <div class="lg:max-w-sm">
                <h3 class="text-sm font-medium text-gray-900">
                    <x-brand
                        class="w-auto h-12 lg:h-14 text-gray-500"
                        aria-hidden="true"
                    />
                </h3>
                <p class="mt-10 text-gray-500 text-sm/6">
                    {{ __('Your trusted online pharmacy for safe and reliable medication. Browse a wide selection of pills for common health needs, order securely, and have them delivered to your door.') }}
                </p>
            </div>
            <div class="space-y-12 lg:grid lg:grid-cols-2 lg:gap-8 lg:space-y-0 lg:col-span-2">
                <div class="grid grid-cols-2 gap-8 lg:gap-12">
                    <div>
                        <h3 class="font-heading text-sm font-medium uppercase tracking-wider text-gray-500">
                            {{ __('About') }}
                        </h3>
                        <ul role="list" class="mt-10 space-y-5">
                            <li>
                                <x-footer-link href="#">{{ __('About us') }}</x-footer-link>
                            </li>
                            <li>
                                <x-footer-link href="#">{{ __('Secure payment') }}</x-footer-link>
                            </li>
                            <li>
                                <x-footer-link href="/">{{ __('Contact') }}</x-footer-link>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="font-heading text-sm font-medium uppercase tracking-wider text-gray-500">
                            {{ __('Shop') }}
                        </h3>
                        <ul role="list" class="mt-10 space-y-5">
                            <li>
                                <x-footer-link href="#">{{ __('New arrivals') }}</x-footer-link>
                            </li>
                            <li>
                                <x-footer-link href="#">{{ __('Best sales') }}</x-footer-link>
                            </li>
                            <li>
                                <x-footer-link href="#">{{ __('Shipping') }}</x-footer-link>
                            </li>
                            <li>
                                <x-footer-link href="#">{{ __('Refunds') }}</x-footer-link>
                            </li>
                        </ul>
                    </div>
                </div>
                <div>
                    <h3 class="font-heading text-sm font-medium uppercase tracking-wider text-gray-500">
                        {{ __('Subscribe to our newsletter') }}
                    </h3>
                    <div class="mt-10 space-y-6">
                        <div>
                            <p class="text-sm leading-6 text-gray-500">
                                {{ __('Subscribe to our newsletter and get VIP access to all our exclusive offers, promotions and much more!') }}
                            </p>
                            <form class="mt-5 sm:flex" target="_blank" novalidate>
                                <label for="email" class="sr-only">Email</label>
                                <input
                                    type="email"
                                    name="EMAIL"
                                    id="email"
                                    class="block w-full border-gray-300 py-2 text-sm placeholder-gray-500 focus:border-transparent focus:ring-2 focus:ring-primary-500 sm:flex-1"
                                    placeholder="{{ __('Enter your email') }}"
                                    required
                                />
                                <x-buttons.primary
                                    type="submit"
                                    whiteBorder
                                    class="mt-3 px-4 py-2 uppercase tracking-wider sm:ml-3 sm:mt-0 sm:inline-flex sm:w-auto sm:flex-shrink-0 sm:items-center"
                                >
                                    <x-untitledui-arrow-narrow-right class="size-5" />
                                </x-buttons.primary>
                            </form>
                            <!--End mc_embed_signup-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col items-center border-t border-gray-200 py-8 sm:flex-row sm:justify-between lg:py-10">
            <div class="mt-5 divide-x divide-gray-200 sm:mt-0">
                <x-link href="#" class="inline-flex px-3 text-sm leading-5 text-gray-700 hover:underline">
                    {{ __('Privacy') }}
                </x-link>
                <x-link href="#" class="inline-flex px-3 text-sm leading-5 text-gray-700 hover:underline">
                    {{ __('Terms of use') }}
                </x-link>
            </div>
        </div>
    </x-container>
</footer>
