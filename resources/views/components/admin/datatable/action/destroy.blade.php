<form action="{{ $url }}" method="POST">
    @method('DELETE')
    @csrf
    <button type="submit"
            data-toggle="tooltip"
            title="{{ __('view/admin/datatable.action.destroy') }}"
            class="btn btn-link btn-danger p-2"
            data-original-title="{{ __('view/admin/datatable.action.destroy') }}"
    >
        <i class="fas fa-trash-alt"></i>
    </button>
</form>
