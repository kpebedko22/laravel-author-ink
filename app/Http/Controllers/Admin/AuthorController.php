<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Authors\AuthorRequest;
use App\Http\Requests\Admin\Authors\AuthorUpsertRequest;
use App\Managers\Admin\NotificationSessionManager;
use App\Models\Author;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RuntimeException;

class AuthorController extends Controller
{
    public function index(Request $request): View
    {
        return view('admin.authors.index', [
            'authors' => Author::withCount('books')
                ->when($request->input('q'), fn($q) => $q->where('name', 'like', '%' . $request->input('q') . '%'))
                ->paginate(10)
        ]);
    }

    public function create(): View
    {
        return view('admin.authors.create', ['model' => new Author()]);
    }

    public function store(AuthorUpsertRequest $request): RedirectResponse
    {
        $author = Author::create($request->getData());

        NotificationSessionManager::success(__('admin/notification/author.store'));

        return redirect()->route('admin.authors.show', $author->id);
    }

    public function show(AuthorRequest $request): View
    {
        return view('admin.authors.show', ['model' => $request->getAuthor()]);
    }

    public function edit(AuthorRequest $request): View
    {
        return view('admin.authors.create', ['model' => $request->getAuthor()]);
    }

    public function update(AuthorUpsertRequest $request): RedirectResponse
    {
        $author = $request->getAuthor();
        $author->update($request->getData());

        NotificationSessionManager::success(__('admin/notification/author.update'));

        return redirect()->route('admin.authors.show', ['author_id' => $author->id]);
    }

    public function destroy(AuthorRequest $request): RedirectResponse
    {
        $author = $request->getAuthor();

        if (Auth::id() === $author->id) {
            throw new RuntimeException('Нельзя удалить самого себя...');
        }

        $author->delete();

        NotificationSessionManager::success(__('admin/notification/author.destroy'));

        return redirect()->route('admin.authors.index');
    }
}
