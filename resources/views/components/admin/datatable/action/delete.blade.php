<form action="{{ $url }}" method="POST">
    @method('DELETE')
    @csrf
    <button type="submit"
            data-toggle="tooltip"
            title="{{ __('view/admin/datatable.action.delete') }}"
            class="btn btn-link btn-danger p-2"
            data-original-title="{{ __('view/admin/datatable.action.delete') }}"
    >
        <i class="fas fa-trash-alt"></i>
    </button>
</form>
