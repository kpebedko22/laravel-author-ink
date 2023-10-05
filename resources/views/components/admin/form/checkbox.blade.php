<div class="flex items-center">
    <input id="{{ $name }}"
           name="{{ $name }}"
           type="checkbox"
           {{ $checked ? 'checked' : '' }}
           class="w-5 h-5 mr-2 transition-all text-primary-500 rounded-lg border border-gray-300 focus:outline-none focus:ring focus:ring-primary-500">
    {{ $slot }}
</div>
