<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $author = Author::all();
        return view('admin.author.index', compact('author'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.author.create');
    }

    public function store(Request $request)
    {
        //Validasi data
        $validated = $request->validate([
            'name' => 'required',
        ]);

        $author = new Author;
        $author->name = $request->name;
        $author->save();
        return redirect()->route('author.index');
    }

    public function show($id)
    {
        $author = Author::findOrFail($id);
        return view('admin.author.show', compact('author'));
    }

    public function edit($id)
    {
        $author = Author::findOrFail($id);
        return view('admin.author.edit', compact('author'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data
        $validated = $request->validate([
            'name' => 'required',
        ]);

        $author = Author::findOrFail($id);
        $author->name = $request->name;
        $author->save();
        return redirect()->route('author.index');
    }

    public function destroy($id)
    {
        $author = Author::findOrFail($id);
        $author->delete();
        return redirect()->route('author.index');
    }
}
