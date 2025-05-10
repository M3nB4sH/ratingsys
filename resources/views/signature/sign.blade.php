<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>التوقيع الرقمي</title>
  <script src="https://cdn.tailwindcss.com"></script>
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
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center">
  <form action="signature/confirm" method="POST" class="bg-white p-10 rounded-lg shadow-lg max-w-xl w-full">
    @csrf
    {{-- <h1 class="text-2xl font-bold text-center mb-4">Code Shotcut - Employment Agreement</h1>
    <p class="mb-4 text-justify text-gray-600">
      Please fill in your details and sign below to confirm your acceptance of the employment terms.
    </p> --}}
    <!-- Display Success Message -->
    @if (session('success'))
    <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
      {{ session('success') }}
    </div>
    @endif
    <!-- Display Error Messages -->
    @if ($errors->any())
    <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
    <!-- Signature Pad -->
    <div class="mb-4">
      <label class="block text-lg text-gray-700 font-medium mb-2">Signature</label>
      <x-creagia-signature-pad name='sign' />
    </div>
  </form>
  <!-- Sign-pad js -->
  <script src="{{ asset('vendor/sign-pad/sign-pad.min.js') }}"></script>
</body>
</html>
