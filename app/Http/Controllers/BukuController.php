<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Buku::latest()->paginate(10);
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        $books = Buku::create($request->validated());
        return redirect()
            ->route('books.index')
            ->with('success', "Buku \"{$books->title}\" berhasil ditambahkan.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $book)
    {
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Buku $book)
    {
        $book->update($request->validated());
        return redirect()
            ->route('books.index')
            ->with('success', "Buku berhasil diperbarui.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $book)
    {
        $title = $book->title;
        $book->delete();

        return redirect()
            ->route('books.index')
            ->with('warning', "Buku \"{$title}\" berhasil dihapus.");
    }
}
