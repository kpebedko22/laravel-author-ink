<input type="{{ $type }}"
       name="{{ $name }}"
       id="{{ $name }}"
       value="{{ $value }}"
       {{ $required ? 'required' : '' }}
       autocomplete="{{ $autocomplete ?? '' }}"
       class="p-2 transition-all rounded-lg border border-gray-300 focus:outline-none focus:ring focus:ring-primary-500 focus:border-primary-500 w-full"
>
