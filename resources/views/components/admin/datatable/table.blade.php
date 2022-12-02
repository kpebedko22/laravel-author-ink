<div class="table-responsive">
    <table class="display table table-striped table-hover">
        <thead>
        <tr>
            @foreach($columns as $column)
                <th style="{{ $column['style'] ?? '' }}">{{ $column['label'] }}</th>
            @endforeach
            @isset($actions)
                <th style="width: 10%">Действия</th>
            @endisset
        </tr>
        <tr>
            <form method="GET" action="" id="form-filter">
                @foreach($columns as $column)
                    @isset($column['filter'])
                        <th>
                            <div style="padding-bottom: 10px">
                                {!! (new $column['filter']['class']($column['filter']['params']))->render()  !!}
                            </div>
                        </th>
                    @endisset
                @endforeach
            </form>
        </tr>
        </thead>
        <tfoot>
        <tr>
            @foreach($columns as $column)
                <th style="{{ $column['style'] ?? '' }}">{{ $column['label'] }}</th>
            @endforeach
            @isset($actions)
                <th style="width: 10%">Действия</th>
            @endisset
        </tr>
        </tfoot>
        <tbody>
        @forelse($items as $item)
            <tr>
                <td>{{ $item->title }}</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td class="d-flex justify-content-start align-items-center">

                    @php
                        /**
                         * @var Closure|array $actions
                         * @var \Illuminate\Database\Eloquent\Model $item
                         */

                        $actionItems = $actions instanceof Closure ? $actions($item) : $actions;
                    @endphp

                    @foreach($actionItems as $actionName => $actionRoute)
                        {!!
                            (new \App\View\Components\Admin\Datatable\Action\BaseAction(
                                $actionName,
                                $actionRoute instanceof Closure ? $actionRoute($item) : $actionRoute
                            ))->render()
                        !!}
                    @endforeach
                </td>
            </tr>
        @empty
            <tr class="odd">
                <td valign="top" colspan="4">No matching records found</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    {{ $items->onEachSide(1)->links('components.admin.datatable.pagination') }}
</div>
