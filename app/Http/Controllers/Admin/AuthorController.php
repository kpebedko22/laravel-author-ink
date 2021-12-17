<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\AuthorRequests\AuthorRequest;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('authors.index', ['authors' => Author::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('authors.create', ['author' => null]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(int $authorId)
    {
        $author = Author::find($authorId);
        if ($author)
            return view('authors.show', ['author' => $author]);
        else
            return redirect()->route('admin.authors.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(int $authorId)
    {
        $author = Author::find($authorId);
        if ($author)
            return view('authors.create', ['author' => $author]);
        return redirect()->route('admin.authors.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $authorId)
    {
        $author = Author::find($authorId);
        if ($author && Auth::user() != $author)
            $author->delete();
        return redirect()->route('admin.authors.index');
    }
}
