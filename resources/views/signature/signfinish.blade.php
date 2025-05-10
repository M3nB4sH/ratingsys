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
<body class="bg-gray-50 min-h-screen flex items-center justify-center" style="font-size: 160%;">
  <div  class="bg-white p-10 rounded-lg shadow-lg max-w-xl w-full">

    @session('danger')
            <div class="flex items-center p-2 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-red-900 dark:text-red-300 dark:border-red-800" role="alert">
                <svg class="flex-shrink-0 w-8 h-8 mr-1 text-red-700 dark:text-red-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4"></path>
                </svg>
                <span class="font-medium"> {{ $value }} </span>
            </div>
        @endsession
        @session('success')
            <div class="flex items-center p-2 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-green-900 dark:text-green-300 dark:border-green-800" role="alert">
                <svg class="flex-shrink-0 w-8 h-8 mr-1 text-green-700 dark:text-green-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4"></path>
                </svg>
                <span class="font-medium"> {{ $value }} </span>
            </div>
        @endsession

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
    <div class="mb-4" style="font-size: 160%; text-align: center;">
      <label class="block text-lg text-gray-700 font-medium mb-2" style="text-align: center;"></label>
      شكرا لك
    </div>
  </div>
</body>
</html>
