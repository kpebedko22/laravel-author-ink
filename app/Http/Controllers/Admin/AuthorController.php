<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Authors\AuthorRequest;
use App\Http\Requests\Admin\Authors\AuthorUpsertRequest;
use App\Models\Author;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Benchmark;
use Illuminate\Support\Facades\Auth;

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

        return redirect()->route('admin.authors.show', $author->id)
            ->with('success', 'Author has been created!');
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

        return redirect()->route('admin.authors.show', ['author_id' => $author->id]);
    }

    public function destroy(AuthorRequest $request): RedirectResponse
    {
        $author = $request->getAuthor();

        if (Auth::id() != $author->id) {
            $author->delete();
        }

        return redirect()->route('admin.authors.index');
    }
}
