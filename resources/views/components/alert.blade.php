@php
// Map tipe → class Tailwind CSS
$styles = match($type) {
    'success' => 'bg-green-50  border-green-400  text-green-800',
    'error'   => 'bg-red-50    border-red-400    text-red-800',
    'warning' => 'bg-yellow-50 border-yellow-400 text-yellow-800',
    'info'    => 'bg-blue-50   border-blue-400   text-blue-800',
    default   => 'bg-gray-50   border-gray-400   text-gray-800',
};

$icons = match($type) {
    'success' => '✅',
    'error'   => '❌',
    'warning' => '⚠️',
    'info'    => 'ℹ️',
    default   => '💬',
};
@endphp

<div class="flex items-start gap-3 border-l-4 px-4 py-3
          rounded-r-lg mb-4 {{ $styles }}"
     role="alert">
  <span class="text-lg">{{ $icons }}</span>
  <p class="text-sm font-medium">{{ $message }}</p>
</div>