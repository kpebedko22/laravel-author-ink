<?php

use App\Models\Book;
use App\Services\Admin\BaseService;
use Illuminate\Database\Eloquent\Model;

class BookService extends BaseService
{

    public function store()
    {

    }

    public function update(Book $model)
    {

    }

    public function delete(Book $model): Model|Book
    {
        return $this->baseDelete($model);
    }

    public function restore(Book $model): Model|Book
    {
        return $this->baseRestore($model);
    }

    public function destroy(Book $model): bool
    {
        return $this->baseDestroy($model);
    }
}
