<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('التقييمات') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('إدارة التقييم للمعلمات') }}</flux:subheading>
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
            <table class="w-100 text-sm text-left rtl:text-right">
                <tbody>
                        <tr>
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
                    <th scope="col" class="px-6 py-3">م</th>
                    <th scope="col" class="px-6 py-3">اسم المعلمة</th>
                    <th scope="col" class="px-6 py-3">اسم التقييم</th>
                    <th scope="col" class="px-6 py-3">تاريخ التقييم</th>
                    <th scope="col" class="px-6 py-3">التواقيع</th>
                    <th scope="col" class="px-6 py-3 w-80">خيارات</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                            <td class="px-6 py-2 text-gray-600 dark:text-gray-300">{{ $item->id }}</td>
                            <td class="px-6 py-2 text-gray-600 dark:text-gray-300">{{ $item->teacherName }}</td>
                            <td class="px-6 py-2 text-gray-600 dark:text-gray-300">{{ $item->type }}</td>
                            <td class="px-6 py-2 text-gray-600 dark:text-gray-300">{{ date("Y-m-d", strtotime($item->created_at)) . "  " . $item->day }}</td>
                            <td class="px-6 py-2">
                                <flux:button href="{{ route('sign.teachercreate',$item->id) }}" icon="document-check" variant="primary">توقيع المعلمة</flux:button>
                                <flux:button href="{{ route('sign.managercreate',$item->id) }}" icon="document-check" variant="primary">توقيع المديرة</flux:button>
                                <flux:button href="{{ route('sign.directorcreate',$item->id) }}" icon="document-check" variant="primary">توقيع الموجهة</flux:button>
                            </td>
                            <td class="px-6 py-2">

                                {{-- @can('eduexp.edit') --}}
                                    {{-- @if ($item->type == App\Enums\Formtype::Field)
                                        <flux:button href="{{ route('formfield.edit',$item->id) }}" icon="pencil" variant="primary"> </flux:button>
                                    @elseif ($item->type == App\Enums\Formtype::Activity)
                                        <flux:button href="{{ route('formactivity.edit',$item->id) }}" icon="pencil" variant="primary"> </flux:button>
                                    @elseif ($item->type == App\Enums\Formtype::Competence)
                                        <flux:button href="{{ route('formcompetence.edit',$item->id) }}" icon="pencil" variant="primary"> </flux:button>
                                    @endif --}}
                                {{-- @endcan --}}
                                {{-- @can('eduexp.delete') --}}
                                    <flux:button
                                        href="{{ route('rating.pdf',$item->id) }}" icon="document" variant="primary">
                                    </flux:button>
                                    <flux:button href="{{ route('rating.show',$item->id) }}" icon="eye" variant="primary"> </flux:button>
                                    <flux:button wire:click="delete({{ $item->id }})"
                                         icon="trash" variant="danger">
                                    </flux:button>

                                {{-- @endcan --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
