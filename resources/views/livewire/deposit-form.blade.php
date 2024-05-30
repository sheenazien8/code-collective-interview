<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Deposit') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form wire:submit.prevent="submit">
                        <div class="mb-4">
                            <x-input-label for="order_id" :value="__('Order ID')" />
                            <x-text-input wire:model="form.order_id" id="order_id" class="block mt-1 w-full" type="text" name="order_id" required :placeholder="__('Order ID')" />
                            <x-input-error :messages="$errors->get('form.order_id')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="amount" :value="__('Amount')" />
                            <x-text-input wire:model="form.amount" id="amount" class="block mt-1 w-full" type="text" name="amount" required :placeholder="__('Amount')" />
                            <x-input-error :messages="$errors->get('form.amount')" class="mt-2" />
                        </div>

                        <x-primary-button>
                            {{ __('Submit') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
