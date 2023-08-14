<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BookType;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $bookTypes = BookType::all(); // Retrieve all book types
        return view('books.create', compact('bookTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            // Aturan validasi
        ]);

        Book::create([
            // Data buku dari input form
        ]);

        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    public function show($id)
    {
        $book = Book::find($id);
        return view('books.show', compact('book'));
    }

    public function edit($id)
    {
        $book = Book::find($id);
        $bookTypes = BookType::all(); // Mengambil semua jenis buku
        return view('books.edit', compact('book', 'bookTypes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            // Aturan validasi
        ]);

        $book = Book::find($id);
        $book->update([
            // Data buku dari input form
        ]);

        return redirect()->route('books.index')->with('success', 'Buku berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus.');
    }
}

