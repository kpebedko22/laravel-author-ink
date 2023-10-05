<form action="{{ $url }}"
      method="POST"
>
    @method('DELETE')
    @csrf
    <button type="submit"
            class="flex text-danger-500 hover:text-danger-600 transition-all"
    >
        <x-heroicon-o-trash class="w-5 h-5 mr-1"/>
        {{ $label }}
    </button>
</form>
