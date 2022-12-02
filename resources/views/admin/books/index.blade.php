@extends('layouts.admin')

@section('title')
    {{ __('admin/model/book.title') }}
@endsection

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Add Row</h4>
                    <button class="btn btn-primary btn-round ml-auto">
                        <i class="fa fa-plus"></i>
                        Add Row
                    </button>
                </div>
            </div>
            <div class="card-body">
                @component('components.admin.datatable.table', [
                    'items' => $items,
                    'columns' => [
                        [
                            'attribute' => 'title',
                            'label' => __('admin/model/book.title'),
                            'filter' => [
                                'class' => \App\View\Components\Admin\Datatable\Filter\Text::class,
                                'params' => [
                                    'name' => 'title',
                                    'value' => request()->input('title', ''),
                                    'htmlAttributes' => 'placeholder=Поиск...',
                                ],
                            ],
                        ],
                    ],
                    'actions' => function(\App\Models\Book $item) {
                        return array_merge([
                            'show' => route('admin.books.show', $item->id),
                            'edit' => route('admin.books.edit', $item->id),
                        ], $item->deleted_at
                            ? [
                                'restore' => route('admin.books.restore', $item->id),
                                'destroy' => route('admin.books.destroy', $item->id),
                              ]
                            : ['delete' => route('admin.books.delete', $item->id)]
                        );
                    },
                ])@endcomponent
            </div>
        </div>
    </div>

@endsection
