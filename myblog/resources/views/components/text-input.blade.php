@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'focus:border-indigo-500 focus:ring-indigo-500 h-10 px-2 rounded-md']) }}>
