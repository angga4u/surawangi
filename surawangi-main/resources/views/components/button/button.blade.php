@php
    /* Styling tombol modern untuk Surawangi Dashboard */
    $baseClasses = 'inline-flex items-center justify-center gap-2 rounded-xl font-semibold transition-all duration-300 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed select-none';

    // Variasi warna tombol
    $variantClasses = match ($variant ?? 'primary') {
        'primary' => 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white hover:from-blue-700 hover:to-indigo-700 focus-visible:ring-blue-600',
        'secondary' => 'bg-gray-100 text-gray-800 hover:bg-gray-200 focus-visible:ring-gray-400',
        'success' => 'bg-gradient-to-r from-green-500 to-emerald-600 text-white hover:from-green-600 hover:to-emerald-700 focus-visible:ring-green-500',
        'danger' => 'bg-gradient-to-r from-red-500 to-rose-600 text-white hover:from-red-600 hover:to-rose-700 focus-visible:ring-red-500',
        'outline' => 'border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 hover:border-gray-400 focus-visible:ring-gray-300',
        'ghost' => 'text-gray-700 hover:bg-gray-100 focus-visible:ring-gray-300',
        default => 'bg-blue-600 text-white hover:bg-blue-700 focus-visible:ring-blue-600',
    };

    // Ukuran tombol
    $sizeClasses = match ($size ?? 'default') {
        'sm' => 'px-3 py-1.5 text-sm',
        'lg' => 'px-6 py-3 text-base',
        'icon' => 'p-2.5 text-lg',
        default => 'px-4 py-2.5 text-sm',
    };

    // Gabungkan semua class
    $classes = "{$baseClasses} {$variantClasses} {$sizeClasses}";
@endphp

@if ($asChild ?? false)
    <x-compile-as-child :$slot :$attributes->class($classes) />
@else
    <button {{ $attributes->merge(['class' => $classes]) }}>
        @isset($icon)
            <x-dynamic-component :component="$icon" class="w-4 h-4" />
        @endisset
        {{ $slot }}
    </button>
@endif
