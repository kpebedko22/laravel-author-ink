@props(['data'])

<table class="table">
    <tbody>
    @foreach($data as $column => $value)
        <tr>
            <td>{{ $column }}</td>
            <td>{{ $value }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
