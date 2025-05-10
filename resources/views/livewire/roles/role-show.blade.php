<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Show Role') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Show role') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>
    <div>
        <a href="{{ route("role.index") }}" class="cursor-pointer px-3 py-2 text-xs font-medium text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
            Back
        </a>
        <div class="w-150">
            <p class="mt-2"><strong>Name: </strong>{{ $role->name }}</p>
            <p class="mt-2"><strong>Permissions: </strong>
                @if ($role->permissions)
                    @foreach ($role->permissions as $itm)
                        <flux:badge>{{ $itm->name }}</flux:badge>
                    @endforeach

                @endif
            </p>
        </div>
    </div>
</div>
