<?php

namespace App\Policies;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Author  $author
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Author $author, Book $book)
    {
        return
            $author->is_admin ||
            $author->id === $book->author_id;
    }

    /**
     * Determine whether the $author can delete the $book.
     *
     * @param  \App\Models\Author  $author
     * @param  \App\Models\Book  $book
     * @return bool
     */
    public function delete(Author $author, Book $book)
    {
        return
            $author->is_admin ||
            $author->id === $book->author_id;
    }
}
