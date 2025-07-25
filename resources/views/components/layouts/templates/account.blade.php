<x-layouts.templates.app :title="$title ?? null">
    <x-container class="relative py-8 sm:py-12 lg:py-16">
        <div class="grid grid-cols-1 lg:grid-cols-5 lg:gap-x-12">
            <div class="lg:col-span-1">
                <h2 class="hidden text-xl font-medium leading-6 text-gray-900 font-heading lg:block">
                    {{ __('My account') }}
                </h2>
                <div class="hidden mt-10 space-y-8 lg:block">
                    <nav role="navigation" class="flex flex-col space-y-4 lg:pr-12">
                        <x-nav.account-link
                            :href="route('account')"
                            :title="__('Overview')"
                            :active="request()->routeIs('account')"
                        />
                        <x-nav.account-link
                            :href="route('account.profile')"
                            :title="__('Profile')"
                            :active="request()->routeIs('account.profile')"
                        />
                        <x-nav.account-link
                            :href="route('account.addresses')"
                            :title="__('Addresses')"
                            :active="request()->routeIs('account.addresses')"
                        />
                        <x-nav.account-link
                            :href="route('account.orders')"
                            :title="__('Orders')"
                            :active="request()->routeIs('account.orders*')"
                        />
                        @hasrole('administrator')
                            <x-nav.account-link
                                :href="route('articles.index')"
                                :title="__('Articles')"
                                :active="request()->routeIs('articles.index*')"
                            />
                        @endhasrole
                    </nav>
                </div>
            </div>
            <div class="lg:col-span-4">{{ $slot }}</div>
        </div>
    </x-container>
</x-layouts.templates.app>
