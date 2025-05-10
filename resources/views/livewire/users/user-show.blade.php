<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Show User') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Show User') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>
    <div>
        <a href="{{ route("user.index") }}" class="cursor-pointer px-3 py-2 text-xs font-medium text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
            Back
        </a>
        <div class="w-150">
            <p class="mt-2"><strong>Name: </strong>{{ $user->name }}</p>
            <p class="mt-2"><strong>Email: </strong>{{ $user->email }}</p>
            <h2 class="mt-4 mb-2 text-lg font-medium">Signature</h2>
        @if ($user->signature)
            <img src="{{ asset('storage/' . $user->signature->filename) }}" alt="User Signature" class="w-full h-auto">
        @else
            <p>No signature available.</p>
        @endif
        </div>
    </div>
</div>
