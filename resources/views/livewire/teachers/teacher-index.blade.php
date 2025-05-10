<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('المعلمات') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('إدارة جميع المعلمات') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>
    <div>
        @session('success')
            <div class="flex items-center p-2 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-green-900 dark:text-green-300 dark:border-green-800" role="alert">
                <svg class="flex-shrink-0 w-8 h-8 mr-1 text-green-700 dark:text-green-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4"></path>
                </svg>
                <span class="font-medium"> {{ $value }} </span>
            </div>
        @endsession

        <form wire:submit="submit" class="mt-6 space-y-6">
            <table class="w-2000 text-sm text-left rtl:text-right">
                <tbody>
                        <tr>
                            <td>@can('teacher.create')
                                <a href="{{ route("teacher.create") }}" class="cursor-pointer px-3 py-2 text-xs font-medium text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                    إضافة معلمة
                                </a>
                            @endcan
                        </td>
                            <td class="px-6 py-2">
                                <flux:select wire:model="forms">
                                    @foreach ($allForms as $item)
                                        <flux:select.option value="{{ $item->id }}" wire:key="{{ $item->id }}">
                                            {{ $item->name }}
                                        </flux:select.option>
                                    @endforeach
                                </flux:select>
                            </td>
                            <td><flux:button type="submit" variant="primary" icon="plus">تقييم معلمة</flux:button></td>
                        </tr>
                </tbody>
            </table>
        </form>
        <div class="overflow-x-auto mt-4">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">ID</th>
                    <th scope="col" class="px-6 py-3">Name</th>
                    <th scope="col" class="px-6 py-3 w-80">Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                            <td class="px-6 py-2 font-medium text-gray-900 dark:text-white">{{ $item->id }}</td>
                            <td class="px-6 py-2 text-gray-600 dark:text-gray-300">{{ $item->name }}</td>
                            <td class="px-6 py-2">
                                @can('teacher.view')
                                    <a href="{{ route("teacher.show",$item->id) }}" class="mr-1 cursor-pointer px-3 py-2 text-xs font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Show
                                    </a>
                                @endcan
                                @can('teacher.edit')

                                    <flux:button
                                        href="{{ route('teacher.edit',$item->id) }}" icon="pencil" variant="primary">
                                    </flux:button>
                                @endcan
                                @can('teacher.delete')

                                    <flux:button wire:click="delete({{ $item->id }})" wire:confirm='هل انت متاكد من هذا الإجراء؟'
                                         icon="trash" variant="danger">
                                    </flux:button>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
