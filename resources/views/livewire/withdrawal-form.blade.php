<div>
    <div class="p-6">
        <form wire:submit.prevent="submit">
            <div class="mb-4">
                <x-input-label for="amount" :value="__('Amount')" />
                <x-text-input wire:model="form.amount" id="amount" class="block mt-1 w-full" type="text" name="amount" required :placeholder="__('Amount')" />
                <x-input-error :messages="$errors->get('form.amount')" class="mt-2" />
            </div>

            <x-primary-button>
                {{ __('Withdrawal') }}
            </x-primary-button>
        </form>
    </div>
</div>
