<style>
    .sign-pad-button-submit {
      margin-top: 5px;
      background-color: #3b82f6;
      color: white;
      font-weight: bold;
      padding: 0.5rem 1rem;
      border-radius: 0.5rem;
      transition: background-color 0.3s ease;
    }
    .sign-pad-button-submit:hover {
      background-color: #2563eb;
    }
    .sign-pad-button-clear {
      margin-top: 5px;
      background-color: #ef4444;
      color: white;
      font-weight: bold;
      padding: 0.5rem 1rem;
      border-radius: 0.5rem;
      transition: background-color 0.3s ease;
    }
    .sign-pad-button-clear:hover {
      background-color: #dc2626;
    }
  </style>
<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('التوقيع الرقمي') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('اضافة التوقيع الرقمي الخاص بك') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>
    <div>
        <a href="{{ route("user.index") }}" class="cursor-pointer px-3 py-2 text-xs font-medium text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
            الخلف
        </a>
        <div class="w-150">
            <form wire:submit="submit" class="mt-6 space-y-6">
                    <div class="mb-4">
                        <label class="block text-lg text-gray-700 font-medium mb-2">Signature</label>
                        <x-creagia-signature-pad wire:model="sign" name='sign' />
                    </div>
                <flux:button type="submit" variant="primary">اضافة</flux:button>
            </form>
        </div>
    </div>
</div>
<script src="{{ asset('vendor/sign-pad/sign-pad.min.js') }}"></script>
