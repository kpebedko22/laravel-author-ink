<form method="POST" action="{{ $url }}">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-danger"
    >Delete</button>
</form>
