<form action="{{ $url }}" method="POST">
    @method('POST')
    @csrf
    <button type="submit"
            data-toggle="tooltip"
            title="{{ __('view/admin/datatable.action.restore') }}"
            class="btn btn-link btn-success p-2"
            data-original-title="{{ __('view/admin/datatable.action.restore') }}"
    >
        <i class="fas fa-redo-alt"></i>
    </button>
</form>
