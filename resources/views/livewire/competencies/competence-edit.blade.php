<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('تعديل كفاية') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('تعديل الكفاية ') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>
    <div>
        <a href="{{ route("competence.index") }}" class="cursor-pointer px-3 py-2 text-xs font-medium text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
            الخلف
        </a>
        <div class="w-150">
            <form wire:submit="submit" class="mt-6 space-y-6">
                <flux:input wire:model="name" label="الاسم"/>
                <flux:radio.group wire:model="is_graded" label="اختر النوع">
                    <flux:radio value="0" label="مجال" checked />
                    <flux:radio value="1" label="نشاط"/>
                </flux:radio.group>

                <flux:button type="submit" variant="primary">تعديل</flux:button>
            </form>
        </div>
    </div>
</div>
