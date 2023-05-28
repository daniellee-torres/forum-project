@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full pl-3 pr-4 py-2 border-l-4 border-gray-400 border-gray-600 text-left text-base font-medium text-gray-700 text-gray-300 bg-gray-50 bg-gray-300 focus:outline-none focus:text-gray-800 focus:text-gray-200 focus:bg-gray-100 focus:bg-gray-900 focus:border-gray-700 focus:border-gray-300 transition duration-150 ease-in-out'
            : 'block w-full pl-3 pr-4 py-2 border-l-4 border-transparent text-left text-base font-medium text-gray-600 text-gray-400 hover:text-gray-800 hover:text-gray-200 hover:bg-gray-50 hover:bg-gray-300 hover:border-gray-200 hover:border-gray-100 focus:outline-none focus:text-gray-800 focus:text-gray-200 focus:bg-gray-50 focus:bg-gray-700 focus:border-gray-300 focus:border-gray-600 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
