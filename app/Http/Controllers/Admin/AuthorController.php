<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AuthorRequests\AuthorRequest;
use App\Models\Author;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
    public function index()
    {
        return view('authors.index', ['authors' => Author::all()]);
    }

    public function create()
    {
        return view('authors.create', ['author' => null]);
    }


    public function store(AuthorRequest $request)
    {
        $data = $request->toArray();
        $data['password'] = bcrypt($data['password']);
        if ($request->has('is_admin'))
            $data['is_admin'] = true;

        $author = Author::create($data);

        if ($author)
            return redirect()->route('admin.authors.index');
        else
            return redirect()->route('admin.authors.create')->withErrors([
                'error' => __('Something go wrong.'),
            ]);
    }

    public function show(int $authorId)
    {
        $author = Author::find($authorId);
        if ($author)
            return view('authors.show', ['author' => $author]);
        else
            return redirect()->route('admin.authors.index');
    }

    public function edit(int $authorId)
    {
        $author = Author::find($authorId);
        if ($author)
            return view('authors.create', ['author' => $author]);
        return redirect()->route('admin.authors.index');
    }

    public function update(AuthorRequest $request, int $authorId)
    {
        $author = Author::find($authorId);
        if ($author) {
            $data = $request->toArray();

            if ($data['password'] != $author->password)
                $data['password'] = bcrypt($data['password']);
            if ($request->has('is_admin'))
                $data['is_admin'] = true;
            else
                $data['is_admin'] = false;

            $author->update($data);
            return redirect()->route('admin.authors.index');
        } else
            return redirect()->back()->withErrors([
                'error' => __('Something go wrong.'),
            ]);
    }

    public function destroy(int $authorId)
    {
        $author = Author::find($authorId);
        if ($author && Auth::user() != $author)
            $author->delete();
        return redirect()->route('admin.authors.index');
    }
}
