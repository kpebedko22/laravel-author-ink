<table class="table">
    <thead>
    <tr>
        @foreach($data as $datum)
            <th scope="col">{{ $datum['label'] }}</th>
        @endforeach
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    @foreach ($items as $item)
        <tr>
            @foreach($data as $datum)
                @php $attr = $datum['attribute']; @endphp
                @if($attr instanceof Closure)
                    <td>{{ $attr($item) }}</td>
                @else
                    <td>{{ $item->{$attr} }}</td>
                @endif
            @endforeach
            <td>
                <div class="d-flex justify-content-end gap-1">
                    @foreach($actions as $action)
                        <div class="">
                            @php $url = $action['url']($item);@endphp
                            @component($action['component'], [
                                'url' => $url,
                            ])@endcomponent
                        </div>
                    @endforeach
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
