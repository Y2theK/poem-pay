@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'bg-white dark:bg-gray-800 rounded-md shadow-sm border-gray-300 dark:border-gray-800  dark:text-white text-dark']) !!}>
