<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('تعديل تقويم نشاط') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('تعديل تقويم نشاط') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>
    <div>
        <a href="{{ route("form.index") }}" class="cursor-pointer px-3 py-2 text-xs font-medium text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
            الخلف
        </a>
        <div class="w-150">
            <form wire:submit="submit" class="mt-6 space-y-6">
                <flux:input wire:model="name" label="الاسم"/>
                <flux:checkbox.group id="activities" wire:model="activities" label="اختر النشاطات">
                    @foreach ($allActivities as $item)
                        <flux:checkbox label="{{ $item->name }}" value="{{ $item->id }}"/>
                    @endforeach
                </flux:checkbox.group>
                <flux:radio.group wire:model="dayanddate" label="هل تريد إضافة اليوم والتاريخ">
                    <div class="flex gap-4 *:gap-x-2">
                        <flux:radio label="نعم" value="1"/>
                        <flux:radio label="لا" value="0"/>
                    </div>
                </flux:radio.group>
                <flux:radio.group wire:model="teachername" label="هل تريد إضافة اسم المعلمة">
                    <div class="flex gap-4 *:gap-x-2">
                        <flux:radio label="نعم" value="1"/>
                        <flux:radio label="لا" value="0"/>
                    </div>
                </flux:radio.group>

                <flux:radio.group wire:model="level" label="هل تريد إضافة المستوى">
                    <div class="flex gap-4 *:gap-x-2">
                        <flux:radio label="نعم" value="1"/>
                        <flux:radio label="لا" value="0"/>
                    </div>
                </flux:radio.group>
                <flux:radio.group wire:model="childrencount" label="هل تريد إضافة عدد الأطفال">
                    <div class="flex gap-4 *:gap-x-2">
                        <flux:radio label="نعم" value="1"/>
                        <flux:radio label="لا" value="0"/>
                    </div>
                </flux:radio.group>
                <flux:radio.group wire:model="eduexp" label="هل تريد إضافة الخبرة التربوية">
                    <div class="flex gap-4 *:gap-x-2">
                        <flux:radio label="نعم" value="1"/>
                        <flux:radio label="لا" value="0"/>
                    </div>
                </flux:radio.group>
                <flux:radio.group wire:model="week" label="هل تريد إضافة الاسبوع">
                    <div class="flex gap-4 *:gap-x-2">
                        <flux:radio label="نعم" value="1"/>
                        <flux:radio label="لا" value="0"/>
                    </div>
                </flux:radio.group>
                <flux:radio.group wire:model="skillname" label="هل تريد إضافة اسم المهارة">
                    <div class="flex gap-4 *:gap-x-2">
                        <flux:radio label="نعم" value="1"/>
                        <flux:radio label="لا" value="0"/>
                    </div>
                </flux:radio.group>
                <flux:radio.group wire:model="note" label="هل تريد إضافة الملاحظات">
                    <div class="flex gap-4 *:gap-x-2">
                        <flux:radio label="نعم" value="1"/>
                        <flux:radio label="لا" value="0"/>
                    </div>
                </flux:radio.group>
                <flux:radio.group wire:model="recommendations" label="هل تريد إضافة التوصيات">
                    <div class="flex gap-4 *:gap-x-2">
                        <flux:radio label="نعم" value="1"/>
                        <flux:radio label="لا" value="0"/>
                    </div>
                </flux:radio.group>
                <flux:button type="submit" variant="primary">تعديل</flux:button>
            </form>
        </div>
    </div>
</div>
